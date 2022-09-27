<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status')) {
			redirect('login');
		}
    }

	public function index()
	{
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "assignment_id";
		$table_name="tc_assignment";
		$limit = 1;
		$offset = ($page_no-1) * $limit; 
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
		$sql = "SELECT a.*, c.course_name, b.batch_name, b.batch_number, g.group_name, g.group_number FROM tc_assignment AS a, tc_batch AS b,
		tc_batch_group AS g, tc_course AS c WHERE a.batch_id = b.batch_id AND a.course_id = c.course_id AND a.group_id = g.group_id";
		$data['assignment_data'] = $this->CM->get_join($sql);
		$this->load->admin_temp('Assignment_list',$data);
	}
    public function assignment_create()
	{
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info->id;
		if(isset($_POST['submit'])){
			$course = $_POST['course'];
			$batch = $_POST['batch'];
			$group = $_POST['group'];
			$assignment = $_POST['assignment'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$created_at = time();

			$data = array(
				"course_id"=>$course,
				"batch_id"=>$batch,
				"group_id"=>$group,
				"start_date"=>$start_date,
				"end_date"=>$end_date,
				"assignment"=>$assignment,
				"created_at"=>$created_at,
				"created_by"=>$user_id,
				"status"=>'1'
			);
			$table_name = "tc_assignment";
			$redirect = "Assignment";
			$this->CM->save($data,$table_name,$redirect);
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
}
