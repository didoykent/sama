<?php
require APPPATH . '/libraries/ImplementJwt.php';

class Uedu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->objOfJwt = new ImplementJwt();
        header('Content-Type: application/json');

          $this->load->model('tutor_model', 'tutor');
          $this->load->model('regularclass_model', 'regularclass');
          $this->load->library('session');
    }

    /////////// Generating Token and put user data into  token ///////////

    public function LoginToken()
    {
            $tokenData['uniqueId'] = '55555';
            $tokenData['role'] = 'admin';
            $tokenData['timeStamp'] = Date('Y-m-d h:i:s');
            $jwtToken = $this->objOfJwt->GenerateToken($tokenData);
            echo json_encode(array('Token'=>$jwtToken));
         }


         public function getToken(){


           $received_Token = $this->input->request_headers('Authorization');


           $token = str_replace("Bearer", "", $received_Token['Authorization']);

           $token = str_replace(" ", "", $token);




           try
               {
               $jwtData = $this->objOfJwt->DecodeToken($token);

               return $jwtData;
               }
               catch (Exception $e)
               {
               http_response_code('401');
               echo json_encode(array( "status" => false, "message" => $e->getMessage()));exit;
               }



         }





         public function signIn(){


           $config = array(


array(
'field' => 'id',
'label' => 'Id',
'rules' => 'trim|required'

),

array(
'field' => 'pw',
'label' => 'Password',
'rules' => 'trim|required'

)

           );



           $this->form_validation->set_rules($config);

           if($this->form_validation->run() === FALSE){

             $result['error'] = true;
             $result['msg'] = array(

             'id' => form_error('id'),
             'pw' => form_error('pw')

           );

           }

           else{

             $data = array(
               'id' => $this->input->post('id'),
               'pw' => $this->input->post('pw')


             );

            $result  = $this->tutor->signIn($data);
            $result2 = $this->regularclass->signIn($data);

            if($result === false && $result2 === false){



                           $result['error'] = true;
                           $result['msg'] = 'Credentials failed';
            }

            else{

              if($result2){

                $result = $result2;
              }

              $jwtToken = $this->objOfJwt->GenerateToken($result);

               $user = $this->objOfJwt->DecodeToken($jwtToken)[0];



                echo json_encode( array('token'=> $jwtToken, 'user' => $user));

                return;
            }




           }

           echo json_encode($result);

     }

    //////// get data from token ////////////

    public function GetTokenData()
    {
    $received_Token = $this->input->request_headers('Authorization');
        try
            {
            $jwtData = $this->objOfJwt->DecodeToken($received_Token['token']);
            echo json_encode($jwtData);
            }
            catch (Exception $e)
            {
            http_response_code('401');
            echo json_encode(array( "status" => false, "message" => $e->getMessage()));exit;
            }
    }
}
