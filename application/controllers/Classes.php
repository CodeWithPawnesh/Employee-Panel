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
		$order_by = "class_id";
		$table_name="tc_classes";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		if($emp_info->role == 1){
			$sql = "SELECT c.class_id,c.class_name,c.type,c.class_ts,c.status,c.class_date,b.batch_name,b.batch_number FROM tc_classes AS c,
			tc_batch AS b WHERE c.teacher_id = $emp_id AND c.batch_id = b.batch_id AND c.group_id = '0' ORDER BY class_id DESC ";
		    $data['classes_data']= $this->CM->get_join($sql);
			$row = $this->CM->get_join_row($sql);
		    $data['total_pages'] = ceil($row/$limit);
		}
		if($emp_info->role == 2){
			$sql = "SELECT c.class_id,c.class_name,c.type,c.class_ts,c.status,c.class_date,b.batch_name,b.batch_number,g.group_name,g.group_number,g.group_id FROM tc_classes AS c,
			tc_batch AS b, tc_batch_group AS g WHERE c.teacher_id = $emp_id AND c.batch_id = b.batch_id AND c.group_id = g.group_id ORDER BY class_id DESC";
		    $data['classes_data']= $this->CM->get_join($sql);
			$row = $this->CM->get_join_row($sql);
		    $data['total_pages'] = ceil($row/$limit);
		}
		$this->load->admin_temp("classes",$data);
    }
	public function class_create(){
		$user_info = $this->session->userdata('user_data');
		$access_level = $user_info->access_level;
		$emp_info = $this->session->userdata('emp_data');
		$emp_id = $emp_info->emp_id;
		if($access_level == 1){
		$table_name = "tc_batch";
			$select = "batch_id,batch_name,batch_number";
			$where = array(
				"emp_id"=> $emp_id
			);
			$data['batch_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
		}
		if($access_level == 2){
			$table_name = "tc_batch_group";
				$select = "group_id,group_name,group_number";
				$where = array(
					"emp_id"=> $emp_id
				);
				$data['group_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
			}
		if(isset($_POST['submit'])){
			$type = $_POST['type'];
			if(isset($_POST['batch'])){
			$batch = $_POST['batch'];
			$batch = explode(",",$batch);
			$batch_id = $batch[0];
			$batch_number = $batch[1];
			if($type == 1){
			$class_name = "Live-Class-".$batch_number;
			}
			if($type == 2){
				$class_name = "Doubt-Class-".$batch_number;
			}
		    }
			if(isset($_POST['group'])){
				$group= $_POST['group'];
				$group = explode(",",$batch);
				$group_id = $group[0];
				$group_number = $group[1];
				$batch_id= $group[2];
				if($type == 1){
				$class_name = "Live-Class-".$group_number;
				}
				if($type == 2){
					$class_name = "Doubt-Class-".$group_number;
				}
			}else{
				$group_id = "0";
			}
			if(isset($_POST['doubt_class_date'])){
				$class_date = $_POST['doubt_class_date'];
			}else{
				$class_date = "";
			}
			$class_time = $_POST['class_time'];
			$class_time = strtotime($class_time);
		}
		$this->load->admin_temp("classes_create",$data);
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
}