<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status') && $user_info->access_level!='0') {
			redirect('');
		}
    }
	public function index()
	{
		$emp_info = $this->session->userdata('emp_data');
		$emp_id = $emp_info->emp_id;
		$data['page']="classes";
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_classes";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"class_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
		$order_by = "class_id";
		$table_name="tc_classes";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		if($emp_info->role == 1){
			$sql = "SELECT c.class_id,c.class_name,c.type,c.class_ts,c.status,c.class_date,b.batch_name,b.batch_number FROM tc_classes AS c,
			tc_batch AS b WHERE c.teacher_id = $emp_id AND c.batch_id = b.batch_id AND c.group_id = '0' ";
		    $data['classes_data']= $this->CM->get_join($sql);
			$row = $this->CM->get_join_row($sql);
		    $data['total_pages'] = ceil($row/$limit);
		}
		if($emp_info->role == 2){
			$sql = "SELECT c.class_id,c.class_name,c.type,c.class_ts,c.status,c.class_date,b.batch_name,b.batch_number,g.group_name,g.group_number,g.group_id FROM tc_classes AS c,
			tc_batch AS b, tc_batch_group AS g WHERE c.teacher_id = $emp_id AND c.batch_id = b.batch_id AND c.group_id = g.group_id ";
		    $data['classes_data']= $this->CM->get_join($sql);
			$row = $this->CM->get_join_row($sql);
		    $data['total_pages'] = ceil($row/$limit);
		}
		$this->load->admin_temp("classes",$data);
    }
	public function class_edit(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$table_name ="tc_classes";
			$where = array(
				"class_id"=>$id
		);
		$data['class_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		$data['class_data'] = $data['class_data'][0];
		}
		if(isset($_POST['submit'])){
			$class_ts = $_POST['class_ts'];
			$class_id = $_POST['id'];
			$class_ts = strtotime($class_ts);
			if(isset($_POST['class_date'])){
				$class_date = $_POST['class_date'];
				$class_date = strtotime($class_date);
			}else{
				$class_date = "";
			}
			$data = array(
				"class_ts"=>$class_ts,
				"class_date"=>$class_date
			);
			$where =array(
				"class_id"=>$class_id
			);
			$redirect="Classes";
			$table_name = "tc_classes";
			$this->CM->update($data,$table_name,$where,$redirect);
		}
		$this->load->admin_temp("classes_edit",$data);
	}
	public function mark_attendance(){
		if(isset($_GET['id']) && isset($_GET['class_id'])){
			$live_id = $_GET['id'];
			$class_id = $_GET['class_id'];
			$sql = "SELECT s.student_id, s.student_name FROM tc_student as s, tc_classes as c, tc_enrollment as en WHERE en.student_id = s.student_id AND  en.batch_id = c.batch_id AND c.class_id = $class_id";
			$data['student_data'] = $this->CM->get_join($sql);
		}
		if(isset($_POST['submit'])){
			$live_id =$_POST['live_class_id'];
			$class_id = $_POST['class_id'];
			$student_ids = $_POST['Student_id'];
			$no_of_std = sizeof($student_ids);
			$std_ids =  implode(",",$student_ids);
			$data = array(
				"student_ids"=>$std_ids,
				"student_n"=>$no_of_std,
				"status"=>"1"
			);
			$table_name ="tc_live_classes";
			$where = array(
				"live_id"=>$live_id
			);
			$redirect = "Class-History?class_id=".$class_id;
			$this->CM->update($data,$table_name,$where,$redirect);
		}
		$this->load->admin_temp("mark_attendance",$data);
	}
	public function class_history(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        if(isset($_GET['class_id'])){
            $class_id = $_GET['class_id'];
			if($emp_info->role == 1){
            $data['class_data']= $this->CM->get_batch_class_data($class_id);
			}
			if($emp_info->role == 2){
				$data['class_data']= $this->CM->get_group_class_data($class_id);
			}

        }
		if(isset($_GET['student_id'])){
			$student_id = $_GET['student_id'];
			if($emp_info->role == 1){
			$data['class_data'] = $this->CM->get_student_batch_class_data($student_id);
			}
			if($emp_info->role == 0){
				$data['class_data'] = $this->CM->get_student_group_class_data($student_id);
				}
		}
        $this->load->admin_temp('class_history',$data); 
    }
	public function requested_class_video(){
		$data["page"]="";
		if(isset($_GET['batch_id'])){
			$bach_id = $_GET['batch_id'];
			$sql = "SELECT v.class_video_id,l.class_no,l.class_date,v.requested_at,v.requested_by,v.status,c.class_name FROM tc_live_classes AS l, tc_class_video AS
			 v, tc_classes AS c WHERE v.batch_id = $bach_id AND l.live_id = v.live_id AND l.class_id = c.class_id  ";
			 $data['requested_data'] = $this->CM->get_join($sql);
		}
        $this->load->admin_temp('requested_class_video',$data);
    }
	public function manual_class_video_list(){
		$batch_id = $_GET['batch_id'];
		if(isset($_GET['g_id'])){
			$group_id = $_GET['g_id'];
		}else{
			$group_id = 0;
		}
		$sql = "SELECT video_title,type,video_link,video_access,std_ids,given_at,status FROM tc_manual_video 
		        WHERE batch_id = $batch_id AND group_id = $group_id ORDER BY m_video_id DESC 
		       ";
		$data['manual_video'] = $this->CM->get_join($sql);
		$this->load->admin_temp('manual_video_list',$data);
	}
	public function manual_class_video(){
		$data['page'] = "";
		if(isset($_GET['id'])){
			$batch_id = $_GET['id'];
			$sql = "SELECT s.student_name,s.student_id FROM tc_student AS s, tc_enrollment AS e WHERE s.student_id = e.student_id AND e.batch_id = $batch_id";
			$data['student_list'] = $this->CM->get_join($sql);
		}
		if(isset($_POST['submit'])){
			$video_title = $_POST['video_title'];
			$video_access = $_POST['video_access'];
			$video_link = $_POST['video_link'];
			$batch_id = $_POST['batch_id'];
			if(isset($_POST['group_id'])){
				$group_id =$_POST['group_id'];
				$type = 2;
			}else{
				$group_id = "";
				$type = 1;
			}
			if($video_access==2){
				$std_ids = implode(",",$_POST['std_ids']);
			}else{
				$std_ids = "";
			}
			$data = array(
				"video_title"=>$video_title,
				"batch_id"=>$batch_id,
				"group_id"=>$group_id,
				"type"=>$type,
				"video_link"=>$video_link,
				"video_access"=>$video_access,
				"std_ids"=>$std_ids,
				"status"=>1
			);
			$table_name = "tc_manual_video";
			if(isset($_GET['group_id'])){
				$redirect = "Class-Video-Requests?batch_id=".$batch_id."&group_id=".$group_id;
			}else{
			$redirect = "Class-Video-Requests?batch_id=".$batch_id;
			}
			$this->CM->save($data,$table_name,$redirect);
		}
		$this->load->admin_temp('add_manual_class_video',$data);
	}
	public function give_class_video(){
		if(isset($_POST['submit'])){
		$currDate = date('y-m-d');
		$batch_id = $_POST['batch_id'];
		$you_tube_url = $_POST['you_tube_url'];
		$class_video_id = $_POST['class_video_id'];
		$where = array("class_video_id"=>$class_video_id);
		$data = array(
			"given_at"=>$currDate,
			"video_link"=>$you_tube_url,
			"status"=>1
		);
		$table_name = "tc_class_video";
		$redirect = "Class-Video-Requests?batch_id=".$batch_id;
		$this->CM->update($data,$table_name,$where,$redirect);
		}
	}
}