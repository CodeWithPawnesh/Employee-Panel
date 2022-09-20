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
		$data['page_name']="Dashboard";
		$this->load->admin_temp('dashboard',$data);
	}
	public function course_list(){
		if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_course";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"course_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "course_id";
		$table_name="tc_course";
		$limit = 1;
		$offset = ($page_no-1) * $limit; 
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
        $data['course_data']=$this->CM->get($table_name,$limit,$offset,$order_by);
		$this->load->admin_temp('course_list',$data);
	}
	public function course_create(){
		$data['page_name']="Course Create";
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
			$overview_points = $_POST['course_overview_points'];
			$overview_points =json_encode($overview_points);
			$keyoutcome_heading = $_POST['keyoutcome_heading'];
			$keyoutcome_desc = $_POST['keyoutcome_desc'];
			$keyoutcome_points = $_POST['course_keyoutcome_points'];
			$keyoutcome_points = json_encode($keyoutcome_points);
			$benifits_heading = $_POST['benifits_heading'];
			$benifits_desc = $_POST['benifits_desc'];
			$benifits_points = $_POST['course_Benifits_points'];
			$benifits_points = json_encode($benifits_points);
			$sec_1_heading = $_POST['sec_1_heading'];
			$sec_1_desc = $_POST['sec_1_desc'];
			$sec_2_heading = $_POST['sec_2_heading'];
			$sec_2_sub_heading = $_POST['sec_2_sub_heading'];
			$sec_2_desc = $_POST['sec_2_desc'];
			$sec_2_desc = json_encode($sec_2_desc);
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
			$redirect = "Course-List";
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
				"overview_points"=>$overview_points,
				"keyoutcome_points"=>$keyoutcome_points,
				"benifits_points"=>$benifits_points,
				"created_at"=>$created_at,
				"status"=>"1"
			);
			$this->CM->save($data,$table_name,$redirect);
	    }  
		$this->load->admin_temp('course_create',$data);
	}
	public function course_edit(){
		if(isset($_GET['id'])){
		$data['page_name']="Course Edit";
		$table_name="tc_course";
		$id = $_GET['id'];
		$where=array(
			"course_id"=>$id
		);
        $data['course_data']=$this->CM->get($table_name,$where);
		$data['course_data']=$data['course_data'][0]; 
		}
		$this->load->admin_temp('course_edit',$data);
	}
	public function testimonial_create(){

		if(isset($_POST['submit']))
		{
			$student_id = $_POST['student_id'];
			$testimonial_desc = $_POST['testimonial_desc'];
			$star_rating = $_POST['star_rating'];
			$status = "1";
			$created_at = time(); 

		$table_name = "tc_testimonial";
			$data =array(
				"student_id"=>$student_id,
				"testimonial_desc"=>$testimonial_desc,
				"star_rating"=>$star_rating,
				"status"=>$status,
				"created_at"=>$created_at
			);
			$redirect = "Testimonial-List";
			$this->CM->save($data,$table_name,$redirect);
		}
		$data['page_name']="Testimonial Create";
		$this->load->admin_temp('testimonial_create',$data);
	}


	public function testimonial_list(){
		$table_name="tc_testimonial";
        $data['testimonial_data']=$this->CM->get($table_name);
		$this->load->admin_temp('testimonial_list',$data);
		
	}
	public function testimonial_edit(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where =array(
				"testimonial_id"=>$id
			);
			$table_name="tc_testimonial";
			$data['testimonial_edit_data']=$this->CM->get($table_name,$where);
			$data['testimonial_edit_data']=$data['testimonial_edit_data'][0];
		}
			if(isset($_POST['submit'])){
				$student_id = $_POST['student_id'];
				$testimonial_desc = $_POST['testimonial_desc'];
				$star_rating = $_POST['star_rating'];
				$id = $_POST['id'];
				$updated_at = time(); 
				$table_name = "tc_testimonial";
				$redirect = "Testimonial-List";
				$data =array(
					"student_id"=>$student_id,
					"testimonial_desc"=>$testimonial_desc,
					"star_rating"=>$star_rating,
					"updated_at"=>$updated_at
				);
				$where = array(
					"testimonial_id"=>$id
				);
				$this->CM->update($data,$table_name,$where,$redirect);
			}
		$data['page_name']="Testimonial Edit";
		$this->load->admin_temp('testimonial_edit',$data);
		
	}
}
