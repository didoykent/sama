<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

  function __construct(){

    parent::__construct();

    $this->load->model('tutor_model', 'tutor');
    $this->load->model('jwt_model', 'jwt');
    $this->load->model('Evaluation_model', 'evaluation');
  }



public function getClasses(){

  if($this->jwt->getToken() &&  $this->jwt->getToken()[0]->position === 'Student'){

      $user = $this->jwt->getToken()[0];

      $tutors = $this->tutor->showAll();


      $studentTutors = array();
      foreach($tutors as $tutor){

        $tutorSchedules = json_decode($tutor->class_schedule);
        if($tutorSchedules){
        foreach($tutorSchedules as $schedule){

          if($schedule->schedule->conn_id === $user->conn_id && $schedule->active === true){

          $newArray = array(

            'tutor' => $tutor,
            'schedule' => $schedule->schedule
          );
          $studentTutors[] = $newArray;


        }
      }
    }

  }

    if( $studentTutors){

  echo json_encode(array('tutors' => $studentTutors));
    }




}
}

}
