<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
    }
    public function teacher_dashboard(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        if(isset($_GET['id']) && isset($_GET['cl_l'])){
            $class_id=$_GET['id'];
            $class_link = $_GET['cl_l'];
            $sql = "SELECT class_id FROM tc_live_classes WHERE class_id = $class_id";
            $total_class = $this->CM->get_join_row($sql);
            $count = $this->CM->get_today_class_data($class_id);
            $count = $count[0]['cc'];
            if($count == 0){
            $this->CM->insert_class_history($class_id,$class_link,$emp_id,$total_class);
            }else{
                redirect($class_link);
            }
        }
        $date = date('y-m-d',strtotime("1 day"));
        $d_tc = strtotime($date);
        $sql = "SELECT live_link FROM tc_employee WHERE emp_id = $emp_id ";
        $class_link = $this->CM->get_join($sql);
        $data['cl_link'] = $class_link[0];
        $sql = "SELECT c.*, b.batch_name FROM tc_classes AS c, tc_batch AS b WHERE c.teacher_id = $emp_id AND b.batch_id = c.batch_id AND
        c.status = 1 AND b.batch_start_date <=$d_tc AND b.batch_end_date >= $d_tc ";

        $data['class_data']= $this->CM->get_join($sql);
        $sql = "SELECT s.student_name, b.batch_name FROM tc_student AS s, tc_enrollment AS er, tc_leave AS l, tc_batch AS b WHERE l.user_id = s.user_id AND l.leave_start_date = $d_tc
        AND b.batch_id = er.batch_id AND l.status = 1 AND er.student_id = s.student_id";
        $data['student_leave']= $this->CM->get_join($sql);
		$this->load->admin_temp('teacher_dashboard',$data);
    }
    public function teacher_batch(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        $data['page'] = "page";
        $date = date('y-m-d');
        $d_tc = strtotime($date);
        $emp_info = $this->session->userdata('emp_data');
		$sql = "SELECT b.*,e.emp_name, c.course_name FROM tc_batch as b, tc_course as c, tc_employee as e WHERE b.emp_id = $emp_id AND b.emp_id = e.emp_id AND b.course_id = c.course_id ORDER BY b.batch_id DESC  ";
        $data['batch_data']=$this->CM->get_join($sql); 
        $this->load->admin_temp('teacher_batch',$data);
    }
    public function teacher_group(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        $data['page'] = "page";
        $date = date('y-m-d');
        $d_tc = strtotime($date);
        $emp_info = $this->session->userdata('emp_data');
		$sql = "SELECT g.*,e.emp_name, c.course_name,b.batch_name FROM tc_batch_group as g, tc_course as c, tc_employee as e, tc_batch as b WHERE g.emp_id = $emp_id AND g.emp_id = e.emp_id AND b.course_id = c.course_id AND g.batch_id = b.batch_id ORDER BY g.group_id DESC  ";
        $data['group_data']=$this->CM->get_join($sql); 
        $this->load->admin_temp('teacher_group',$data);
    }
    public function update_link(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        if(isset($_POST['submit_link'])){
            $live_link = $_POST['class_link'];
            $data = array("live_link"=>$live_link);
            $table_name = "tc_employee";
            $where = array("emp_id"=>$emp_id);
            $redirect = "Teacher-Dashboard";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
    }
}