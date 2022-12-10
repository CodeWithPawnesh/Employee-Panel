<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
			$table_name = "tc_blog";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"blog_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
        if(isset($_GET['delete_id'])){
			$blog_id = $_GET['delete_id'];
            $where = array("blog_id"=>$blog_id);
            $table_name = "tc_blog";
            $redirect = "Blog-List";
			$this->CM->delete($table_name,$where,$redirect);
		}
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "blog_id";
		$table_name="tc_blog";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        $row = $this->CM->get_row($table_name,$where=Null);
		$data['total_pages'] = ceil($row/$limit); 
        
        $data['blog_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by,$where=Null,$select=Null,$join=Null);
        $this->load->admin_temp('blog_list',$data);
    }
    public function create(){
        $data['page']="";
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/blog/';
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
                "blog_name"=>$name,
                "blog_title"=>$title,
                "blog_description"=>"$description",
                "image"=>$file,
                "status"=>0,
            );
            $table_name = "tc_blog";
            $redirect = "Blog-List";
            $this->CM->save($data,$table_name,$redirect);
        }
        $this->load->admin_temp('blog_create',$data);
    }
    public function edit(){
        $data['page']="";
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $where =array(
                "blog_id"=>$id
            );
            $table_name = "tc_blog";
            $data['edit_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['edit_data'] = $data['edit_data'][0];
        }
        if(isset($_POST['submit'])){
            $blog_id = $_POST['blog_id'];
            $name = $_POST['name'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            if($_FILES['file']['size']>0)
			{
				$config['upload_path'] = './assets/images/blog/';
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
                "blog_name"=>$name,
                "blog_title"=>$title,
                "blog_description"=>"$description",
                "image"=>$file,
            );
            $where = array("blog_id"=>$blog_id);
            $table_name = "tc_blog";
            $redirect = "Blog-List";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp('blog_edit',$data);
    }
}