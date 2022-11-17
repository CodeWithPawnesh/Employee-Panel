<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status')  ) {
			redirect('login');
		}
    }

	public function index()
	{
		$user_info = $this->session->userdata('user_data');
		$emp_info = $this->session->userdata('emp_data');
		$emp_id = $emp_info->emp_id;
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "assignment_id";
		$table_name="tc_assignment";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		if($user_info->access_level == 1 )
		{
			$sql = "SELECT a.*, c.course_name, b.batch_name, b.batch_number FROM tc_assignment AS a, tc_batch AS b, tc_course
			AS c WHERE a.batch_id = b.batch_id AND b.course_id = c.course_id AND a.group_id = '0' AND b.emp_id = $emp_id ORDER BY a.assignment_id DESC";
			$batch_data = $this->CM->get_join($sql);
			$row = $this->CM->get_join_row($sql);
		    $data['total_pages'] = ceil($row/$limit);
			$data['assignment_data'] = $batch_data;
		}
		if($user_info->access_level == 2)
		{
			$row = $this->CM->get_row($table_name);
		    $data['total_pages'] = ceil($row/$limit);
			$sql = "SELECT a.*, c.course_name, b.batch_name, b.batch_number, g.group_name, g.group_number FROM tc_assignment 
		    AS a, tc_batch AS b, tc_batch_group AS g, tc_course AS c WHERE a.batch_id = b.batch_id AND b.course_id = c.course_id 
		    AND a.group_id = g.group_id ANd  g.emp_id = $emp_id ORDER BY a.assignment_id DESC ";
		    $group_data = $this->CM->get_join($sql);
		    $data['assignment_data'] = $group_data;
		}
		if($user_info->access_level == 0)
		{
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
		$sql = "SELECT a.*, c.course_name, b.batch_name, b.batch_number, g.group_name, g.group_number FROM tc_assignment AS a, tc_batch AS b,
		tc_batch_group AS g, tc_course AS c WHERE a.batch_id = b.batch_id AND b.course_id = c.course_id AND a.group_id = g.group_id ORDER BY a.assignment_id DESC ";
		$group_data = $this->CM->get_join($sql);
		if(empty($group_data)){
			$group_data =array();
		}
		$sql = "SELECT a.*, c.course_name, b.batch_name, b.batch_number FROM tc_assignment AS a, tc_batch AS b, tc_course
		 AS c WHERE a.batch_id = b.batch_id AND b.course_id = c.course_id AND a.group_id = '0' ORDER BY a.assignment_id DESC";
		$batch_data = $this->CM->get_join($sql);
		if(empty($batch_data)){
			$batch_data =array();
		}
		$assignment_data = array_merge($group_data,$batch_data);
		$data['assignment_data'] = $assignment_data;
		}
		$this->load->admin_temp('Assignment_list',$data);
	}
    public function assignment_create()
	{
		$user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
		if($user_info->access_level == 0){
		if(isset($_POST['submit'])){
			$batch = $_POST['batch'];
			$group = $_POST['group'];
			$assignment = $_POST['assignment'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$created_at = time();

			$data = array(
				"batch_id"=>$batch,
				"group_id"=>$group,
				"start_date"=>$start_date,
				"end_date"=>$end_date,
				"assignment"=>$assignment,
				"created_at"=>$created_at,
				"created_by"=>$emp_id,
				"status"=>'1'
			);
			$table_name = "tc_assignment";
			$redirect = "Assignment";
			$this->CM->save($data,$table_name,$redirect);
		}
	}
		if($user_info->access_level == 1 ){
			$table_name = "tc_batch";
			$select = "batch_id,batch_name,batch_number";
			$where = array(
				"emp_id"=> $emp_id
			);
			$data['batch_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
			if(isset($_POST['submit'])){
				$batch = $_POST['batch'];
				$assignment = $_POST['assignment'];
				$start_date = $_POST['start_date'];
			    $start_date = strtotime($start_date);
			    $end_date = $_POST['end_date'];
			    $end_date = strtotime($end_date);
				$created_at = time();
				$data = array(
					"batch_id"=>$batch,
					"start_date"=>$start_date,
					"end_date"=>$end_date,
					"assignment"=>$assignment,
					"created_at"=>$created_at,
					"created_by"=>$emp_id,
					"status"=>'1'
				);
				$table_name = "tc_assignment";
				$redirect = "Assignment";
				$this->CM->save($data,$table_name,$redirect);

			}
		}
		if($user_info->access_level == 2){
			$table_name = "tc_batch_group";
			$select = "group_id,batch_id,group_name,group_number";
			$where = array(
				"emp_id"=> $emp_id
			);
			$data['group_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
			if(isset($_POST['submit'])){
				$group_batch = $_POST['group_batch'];
				$group_batch = explode(",",$group_batch);
				$group = $group_batch[0];
				$batch = $group_batch[1];
				$assignment = $_POST['assignment'];
				$start_date = $_POST['start_date'];
			    $start_date = strtotime($start_date);
			    $end_date = $_POST['end_date'];
			    $end_date = strtotime($end_date);
				$created_at = time();
				$data = array(
					"group_id"=>$group,
					"batch_id"=>$batch,
					"start_date"=>$start_date,
					"end_date"=>$end_date,
					"assignment"=>$assignment,
					"created_at"=>$created_at,
					"created_by"=>$emp_id,
					"status"=>'1'
				);
				$table_name = "tc_assignment";
				$redirect = "Assignment";
				$this->CM->save($data,$table_name,$redirect);

			}
		}
		if(isset($_POST['course_id']))
		{
			$course_id = $_POST['course_id'];
			
			$table_name = "tc_batch";
			$where = "course_id =".$course_id;	
			$data['batch_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		}
		if(isset($_POST['batch_id']))
		{
			$course_id = $_POST['course'];
			$batch_id = $_POST['batch_id'];
			
			$table_name = "tc_batch_group";
			$where = "batch_id =".$batch_id;	
			$data['group_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		}
		$table_name = "tc_course";
		$data['course_data']=$this->CM->get($table_name);
        $data['page'] = "assignment";
		$this->load->admin_temp('Assignment_create',$data);
	}
    public function assignment_edit()
	{
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info->id;
        if(isset($_GET['id'])){
			$id = $_GET['id'];
			$table_name = "tc_assignment";
			$where = "assignment_id =".$id;
			$assignment_data = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
			$data['assignment_data'] = $assignment_data[0];
		}
		if(isset($_POST['submit'])){
			$assignment = $_POST['assignment'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$assignment_id = $_POST['assignment_id'];
			$updated_at = time();
			$data = array(
				"start_date"=>$start_date,
				"end_date"=>$end_date,
				"assignment"=>$assignment,
				"updated_at"=>$updated_at
			);

			$table_name = "tc_assignment";
			$redirect = "Assignment";
			$where = "assignment_id = ".$assignment_id ;
			$this->CM->update($data,$table_name,$where,$redirect);
		}
		$this->load->admin_temp('Assignment_edit',$data);
	}
	public function check_assignment(){
		if(isset($_GET['id'])){
		$assignment_id = $_GET['id'];
		$sql = "SELECT ac.*, s.student_name FROM tc_as_submit as ac, tc_student as s WHERE ac.assignment_id = $assignment_id AND ac.student_id = s.student_id ";
		$data['assignment_check_data'] = $this->CM->get_join($sql);
		}
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$ass_id = $_POST['ass_id'];
			$marks = $_POST['marks'];
			$time = date("h:i a");
			$checked_at = strtotime($time);
			$data = array(
				"marks"=>$marks,
				"checked_at"=>$checked_at,
				"status"=>2
			);
			$where = array("id"=>$id);
			$redirect = "Check-Assignment?id=".$ass_id;
			$table_name = "tc_as_submit";
			$this->CM->update($data,$table_name,$where,$redirect);
		}
		$this->load->admin_temp('check_assignment',$data);
	}
}
