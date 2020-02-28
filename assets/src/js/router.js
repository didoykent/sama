import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)


const router = new VueRouter({


  routes: [

{path: '/dashboard',  name: 'admin', component:require('./components/Dashboard.vue').default},
{path: '/Member',   name: 'admin', component:require('./components/Member.vue').default},
{path: '/MemberTutor',   name: 'admin', component:require('./components/MemberTutor.vue').default},
{path: '/MemberTutorUEducation',   name: 'admin', component:require('./components/MemberTutorUEducation.vue').default},
{path: '/MemberAddTutor',   name: 'admin', component:require('./components/MemberAddTutor.vue').default},
{path: '/MemberAddTutor2',   name: 'admin', component:require('./components/MemberAddTutor2.vue').default},
{path: '/MemberAddStudent',  name: 'admin', component:require('./components/MemberAddStudent.vue').default},
{path: '/MemberAddStudent2',   name: 'admin', component:require('./components/MemberAddStudent2.vue').default},
{path: '/ClassesMyClass',    name: 'admin', component:require('./components/ClassesMyClass.vue').default},

{path: '/MemberStudentEvaluation/:classid',  name: 'tutorpage', component:require('./components/MemberStudentEvaluation.vue').default},
{path: '/LevelTestStudentEvaluation/:classid',  name: 'tutorpage', component:require('./components/MemberLeveltestEvaluation.vue').default},
{path: '/MemberClass',   name: 'admin', component:require('./components/MemberClass.vue').default},
{path: '/MemberBoards',   name: 'admin', component:require('./components/MemberBoards.vue').default},
{path: '/PriceTable', component:require('./components/PriceTable.vue').default},
{path: '/tutor_page', name: 'tutorpage', component: require('./schedule/TutorPage.vue').default},
{path: '/login',  component: require('./authentication/SignIn.vue').default},
{path: '/TeamMember', name: 'team_leader', component:require('./components/TeamMember.vue').default},
{path: '/MemberViewClasses/:idx', name: 'team_leader', component:require('./components/SelectedMemberClasses.vue').default},
{path: '/StudentDashboard', name: 'student', component:require('./Student/StudentDashboard.vue').default},
{path: '/StudentWritingCorrection', name: 'student', component:require('./Student/StudentWritingCorrection').default},


  { path: '*', redirect: '/dashboard' }


  ]
})


const ph_teachers = ['tl', 'atl', 'aht', 'ht', 'tro', 'operations manager', 'marketing_manager', 'tutor']
const tl = ['tl', 'atl']
const admin = ['tl', 'atl', 'aht', 'ht', 'tro', 'operations manager', 'kr_admin', 'marketing_manager']
const ph_admin = ['tl', 'atl', 'aht', 'ht', 'tro', 'operations manager', 'marketing_manager']
const kr_admin = ['kr_admin']

export default router
