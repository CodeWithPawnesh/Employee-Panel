<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status') && $user_info->access_level!='0') {
			redirect('');
		}
    }
    public function index(){
        $data['page']="";
        if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_notification";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"notification_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
        if(isset($_GET['delete_id'])){
			$notification_id = $_GET['delete_id'];
            $where = array("notification_id"=>$notification_id);
            $table_name = "tc_notification";
            $redirect = "Notification-List";
			$this->CM->delete($table_name,$where,$redirect);
		}
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "notification_id";
		$table_name="tc_notification";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        $row = $this->CM->get_row($table_name,$where=Null);
		$data['total_pages'] = ceil($row/$limit); 
        
        $data['notification_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by,$where=Null,$select=Null,$join=Null);
        $this->load->admin_temp('notification_list',$data);
    }
    public function create(){
        $data['page']="";
        if(isset($_POST['type'])){
        if($_POST['type']==4){
            $table_name = "tc_batch";
            $data['batch_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=NULL,$where=Null,$select=Null,$join=Null);
        }
        if($_POST['type']==5){
            $table_name = "tc_batch_group";
            $data['group_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=NULL,$where=Null,$select=Null,$join=Null);
        }
        if($_POST['type']==6){
            $table_name = "tc_employee";
            $data['teacher_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=NULL,$where=Null,$select=Null,$join=Null);
        }
    }
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $bathc_id = 0;
            $teacher_id=0;
            $group_id=0;
            if($type == 4){
                $bathc_id = $_POST['batch_id'];
            }
            if($type == 5){
                $group_id = $_POST['group_id'];
            }
            if($type == 4){
                $teacher_id =$_POST['teacher_id'];
            }
            $data = array(
                "notification_name"=>$name,
                "notification_title"=>$title,
                "description"=>"$description",
                "batch_id"=>$bathc_id,
                "group_id"=>$group_id,
                "teacher_id"=>$teacher_id,
                "type"=>$type,
                "status"=>0
            );
            $table_name = "tc_notification";
            $redirect = "Notification-List";
            $this->CM->save($data,$table_name,$redirect);
        }
        $this->load->admin_temp('notification_create',$data);
    }
    public function edit(){
        $data['page']="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $where =array(
                "notification_id"=>$id
            );
            $table_name = "tc_notification";
            $data['edit_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['edit_data'] = $data['edit_data'][0];
        }
        if(isset($_POST['submit'])){
            $notification_id = $_POST['id'];
            $name = $_POST['name'];
            $title = $_POST['title'];
            $type = $_POST['type'];
            $description = $_POST['description'];
            $data = array(
                "notification_name"=>$name,
                "notification_title"=>$title,
                "type"=>$type,
                "description"=>"$description",
            );
            $where = array("notification_id"=>$notification_id);
            $table_name = "tc_notification";
            $redirect = "Notification-List";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp('notification_edit',$data);
    }
}