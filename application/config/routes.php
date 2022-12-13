<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
// ADMIN ROUTES
$route['Admin-Dashboard'] = 'Admin';
$route['Course-List'] = 'Admin/course_list';
$route['Course-Create'] = 'Admin/course_create';
$route['Course-Edit'] = 'Admin/course_edit';
$route['Testimonial-Create']='Admin/testimonial_create';
$route['Testimonial-List']='Admin/testimonial_list';
$route['Testimonial-Edit']='Admin/testimonial_Edit';
$route['Batch-Create']='Admin/batch_create';
$route['Batch-List']='Admin/batch_list';
$route['Batch-Edit']='Admin/batch_edit';
$route['Batch-Instructor-List'] = 'Admin/batch_instructor_list';
$route['Add-Instructor'] = 'Admin/add_instructor';
$route['Group-Create']='Admin/group_create';
$route['Group-List']='Admin/group_list';
$route['Group-Edit']='Admin/group_edit';
$route['Group-Instructor-List']='Admin/group_inst_list';
$route['Employee-List']='Admin/employee_list';
$route['Add-Student']='Admin/add_student';
$route['Add-Employee']='Admin/add_employee';
$route['Employee-Course']='Admin/employee_course';
$route['Employee-Edit']='Admin/edit_employee';
$route['Student-Edit']='Admin/edit_student';
$route['Student-Course-List']='Admin/student_course_list';
$route['Add-Student-Course']='Admin/add_student_course';
$route['Student-Leave']='admin/student_leave';
$route['Employee-Leave']='admin/employee_leave';
$route['Internship-Create']='admin/create_internship';
$route['Internship-List']='admin/internship_list';
$route['Internship-Edit']='admin/edit_internship';
$route['Job-Updates-List']='admin/job_list';
$route['Job-Updates-Create']='admin/job_create';
$route['Job-Updates-Edit']='admin/job_edit';
$route['Workshop-List']="Workshop";
$route['Workshop-Create']="Workshop/create";
$route['Workshop-Edit']="Workshop/edit";
$route['Blog-List']="Blog";
$route['Blog-Create']="Blog/create";
$route['Blog-Edit']="Blog/edit";
$route['News-List']="News";
$route['News-Create']="News/create";
$route['News-Edit']="News/edit";
$route['Ads-List']="Ads";
$route['Ads-Create']="Ads/create";
$route['Ads-Edit']="Ads/edit";
//END ADMIN ROUTES
$route['Teacher-Dashboard']= 'Teacher/teacher_dashboard';
$route['Teacher-Batch']='Teacher/teacher_batch';
$route['Teacher-Group']='Teacher/teacher_group';
$route['Assignment-Create']='Assignment/assignment_create';
$route['Assignment-Edit']='Assignment/assignment_edit';
$route['Check-Assignment']='Assignment/check_assignment';
$route['Quiz-Create']='Quiz/quiz_create';
$route['Quiz-Edit']='Quiz/quiz_edit';
$route['Quiz-Questions-List']='Quiz/quiz_question_list';
$route['Quiz-Questions-Create']='Quiz/quiz_question_create';
$route['Quiz-Questions-Edit']='Quiz/quiz_question_edit';
$route['Profile']='Panel/profile';
$route['Profile-Edit']='Panel/profile_edit';
$route['Leave']='Panel/leave_list';
$route['Leave-Create']='Panel/create_leave';
$route['Class-Create']='Classes/class_create';
$route['Class-Edit']='Classes/class_edit';
$route['Student-List']='panel/student_list';
$route['Class-History']='Classes/class_history';
$route['Mark-Attendance']='Classes/mark_attendance';
$route['login']="Auth/login";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
