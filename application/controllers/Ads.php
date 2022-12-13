<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

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
			$table_name = "tc_popup_ads";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"ads_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
        if(isset($_GET['delete_id'])){
			$ads_id = $_GET['delete_id'];
            $where = array("ads_id"=>$ads_id);
            $table_name = "tc_popup_ads";
            $redirect = "Ads-List";
			$this->CM->delete($table_name,$where,$redirect);
		}
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "ads_id";
		$table_name="tc_popup_ads";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        $row = $this->CM->get_row($table_name,$where=Null);
		$data['total_pages'] = ceil($row/$limit); 
        
        $data['ads_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by,$where=Null,$select=Null,$join=Null);
        $this->load->admin_temp('ads_list',$data);
    }
    public function create(){
        $data['page']="";
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $button_text = $_POST['button_text'];
            $button_link = $_POST['button_link'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/ads/';
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
                "ads_name"=>$name,
                "ads_title"=>$title,
                "description"=>"$description",
                "image"=>$file,
                "button_text"=>$button_text,
                "button_link"=>$button_link,
                "status"=>0,
            );
            $table_name = "tc_popup_ads";
            $redirect = "Ads-List";
            $this->CM->save($data,$table_name,$redirect);
        }
        $this->load->admin_temp('ads_create',$data);
    }
    public function edit(){
        $data['page']="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $where =array(
                "ads_id"=>$id
            );
            $table_name = "tc_popup_ads";
            $data['edit_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['edit_data'] = $data['edit_data'][0];
        }
        if(isset($_POST['submit'])){
            $ads_id = $_POST['ads_id'];
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $button_text = $_POST['button_text'];
            $button_link = $_POST['button_link'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/ads/';
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
                "ads_name"=>$name,
                "ads_title"=>$title,
                "description"=>"$description",
                "image"=>$file,
                "button_text"=>$button_text,
                "button_link"=>$button_link
            );
            $where = array("ads_id"=>$ads_id);
            $table_name = "tc_popup_ads";
            $redirect = "Ads-List";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp('ads_edit',$data);
    }
}