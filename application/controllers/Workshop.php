<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends CI_Controller {

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
        if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_workshop";
			$data = array(
				"workshop_status"=>$status
			);
			$where = array(
				"workshop_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
        if(isset($_GET['delete_id'])){
			$workshop_id = $_GET['delete_id'];
            $where = array("workshop_id"=>$workshop_id);
            $table_name = "tc_workshop";
            $redirect = "Workshop-List";
			$this->CM->delete($table_name,$where,$redirect);
		}
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "workshop_id";
		$table_name="tc_workshop";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        $row = $this->CM->get_row($table_name,$where=Null);
		$data['total_pages'] = ceil($row/$limit); 
        
        $data['workshop_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by,$where=Null,$select=Null,$join=Null);
        $this->load->admin_temp('workshop_list',$data);
    }
    public function create(){
        $data['page']="";
        if(isset($_POST['submit'])){
            $type = $_POST['type'];
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description =$_POST['description'];
            $s_date = $_POST['s_date'];
            $s_time = $_POST['s_time'];
            $start_date_time = $s_date.",".$s_time;
            $e_date = $_POST['e_date'];
            $e_time = $_POST['e_time'];
            $end_date_time = $e_date.",".$e_time;
            $trainer_email = $_POST['trainer_email'];
            $workshop_address = $_POST['workshop_address'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/workshop/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('file'))
				{
				$uploaddata=$this->upload->data();
				$file =  $uploaddata['file_name'];
				}
		    }
            $data = array(
                "workshop_name"=>$name,
                "workshop_title"=>$title,
                "workshop_description"=>"$description",
                "image"=>$file,
                "start_date_time"=>$start_date_time,
                "end_date_time"=>$end_date_time,
                "workshop_type"=>$type,
                "workshop_address"=>$workshop_address,
                "trianer_email"=>$trainer_email,
                "workshop_status"=>0,
            );
            $table_name = "tc_workshop";
            $redirect = "Workshop-List";
            $this->CM->save($data,$table_name,$redirect);
        }
        $this->load->admin_temp('workshop_create',$data);
    }
    public function edit(){
        $data['page']="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $where =array(
                "workshop_id"=>$id
            );
            $table_name = "tc_workshop";
            $data['edit_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['edit_data'] = $data['edit_data'][0];
        }
        if(isset($_POST['submit'])){
            $workshop_id = $_POST['workshop_id'];
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $s_date = $_POST['s_date'];
            $s_time = $_POST['s_time'];
            $start_date_time = $s_date.",".$s_time;
            $e_date = $_POST['e_date'];
            $e_time = $_POST['e_time'];
            $end_date_time = $e_date.",".$e_time;
            $trainer_email = $_POST['trainer_email'];
            $workshop_address = $_POST['workshop_address'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/workshop/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('file'))
				{
				$uploaddata=$this->upload->data();
				$file =  $uploaddata['file_name'];
				}
		    }else{
            $file = $_POST['h_file'];
        }
            $data = array(
                "workshop_name"=>$name,
                "workshop_title"=>$title,
                "workshop_description"=>"$description",
                "image"=>$file,
                "start_date_time"=>$start_date_time,
                "end_date_time"=>$end_date_time,
                "workshop_address"=>$workshop_address,
                "trianer_email"=>$trainer_email,
            );
            $where = array("workshop_id"=>$workshop_id);
            $table_name = "tc_workshop";
            $redirect = "Workshop-List";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp('workshop_edit',$data);
    }
    public function response(){
        
    }
}