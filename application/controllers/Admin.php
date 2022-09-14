<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if($user_info->access_level!='0'){
            echo "Access Denied";
        }
        if (!$this->session->userdata('login_status')) {
			redirect('login');
		}
    }
	public function index()
	{
		$this->load->admin_temp('dashboard');
	}
	public function course_list(){
		$this->load->admin_temp('course_list');
	}
	public function course_create(){
		if(isset($_POST['submit']))
		{
			$course_name = $_POST['course_name'];
			$course_title = $_POST['course_title'];
			$course_abber = $_POST['course_abber'];
			$course_level = $_POST['course_level'];
			$no_of_seats = $_POST['no_of_seats'];
			$no_of_lessons = $_POST['no_of_lessons'];
			$language = $_POST['language'];
			$overview_heading = $_POST['overview_heading'];
			$overview_desc = $_POST['overview_desc'];
			$keyoutcome_heading = $_POST['keyoutcome_heading'];
			$keyoutcome_desc = $_POST['keyoutcome_desc'];
			$benifits_heading = $_POST['benifits_heading'];
			$benifits_desc = $_POST['benifits_desc'];
			$sec_1_heading = $_POST['sec_1_heading'];
			$sec_1_desc = $_POST['sec_1_desc'];
			$sec_2_heading = $_POST['sec_2_heading'];
			$sec_2_sub_heading = $_POST['sec_2_sub_heading'];
			$sec_2_desc = $_POST['sec_2_desc'];
			$created_at = time() ;
			if($_FILES['overview_img']['size']>0)
			{
				$config['upload_path'] = './assets/images/course/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('overview_img'))
				{
				$uploaddata=$this->upload->data();
				$overview_img =  $uploaddata['file_name'];
				}
		    }
			if($_FILES['keyoutcome_img']['size']>0)
			{
				$config['upload_path'] = './assets/images/course/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('keyoutcome_img'))
				{
				$uploaddata=$this->upload->data();
				$keyoutcome_img =  $uploaddata['file_name'];
				}
		    }
			if($_FILES['benifits_img']['size']>0)
			{
				$config['upload_path'] = './assets/images/course/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('benifits_img'))
				{
				$uploaddata=$this->upload->data();
				$benifits_img =  $uploaddata['file_name'];
				}
		    }
			if($_FILES['sec_1_img']['size']>0)
			{
				$config['upload_path'] = './assets/images/course/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('sec_1_img'))
				{
				$uploaddata=$this->upload->data();
				$sec_1_img =  $uploaddata['file_name'];
				}
		    }
			if($_FILES['sec_2_img']['size']>0)
			{
				$config['upload_path'] = './assets/images/course/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('sec_2_img'))
				{
				$uploaddata=$this->upload->data();
				$sec_2_img =  $uploaddata['file_name'];
				}
		    }
			$table_name = "tc_course";
			$data =array(
				"course_name"=>$course_name,
				"course_title"=>$course_title,
				"course_abber"=>$course_abber,
				"course_level"=>$course_level,
				"no_of_seats"=>$no_of_seats,
				"no_of_lessons"=>$no_of_lessons,
				"language"=>$language,
				"overview_heading"=>$overview_heading,
				"overview_desc"=>$overview_desc,
				"overview_img"=>$overview_img,
				"keyoutcome_heading"=>$keyoutcome_heading,
				"keyoutcome_desc"=>$keyoutcome_desc,
				"keyoutcome_img"=>$keyoutcome_img,
				"benifits_heading"=>$benifits_heading,
				"benifits_desc"=>$benifits_desc,
				"benifits_img"=>$benifits_img,
				"sec_1_heading"=>$sec_1_heading,
				"sec_1_desc"=>$sec_1_desc,
				"sec_1_img"=>$sec_1_img,
				"sec_2_heading"=>$sec_2_heading,
				"sec_2_sub_heading"=>$sec_2_sub_heading,
				"sec_2_desc"=>$sec_2_desc,
				"sec_2_img"=>$sec_2_img,
				"created_at"=>$created_at,
				"status"=>"1"
			);
			$this->CM->save($data,$table_name);
	    }  
		$this->load->admin_temp('course_create');
	}
	public function course_edit(){
		$this->load->admin_temp('course_edit');
	}
	public function testimonial_create(){

		$this->load->admin_temp('testimonial_create');
		
	}
}
