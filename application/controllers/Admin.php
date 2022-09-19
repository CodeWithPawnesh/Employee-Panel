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
		$data['page_name']="Course List";
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
		$this->load->admin_temp('course_create',$data);
	}
	public function course_edit(){
		$this->load->admin_temp('course_edit');
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

     public function batch_create(){
		if(isset($_POST['submit'])){
			$course_id = $_POST['course_id'];
			$batch_name = $_POST['batch_name'];
			$created_at = time();

            $table_name = "tc_batch";
			$data = array(
                "course_id" => $course_id,
				"batch_name" => $batch_name,
				"created_at"=>$created_at
			);

			$redirect = "";
			$this->CM->save($data,$table_name,$redirect);

		}
        $data['page_name']="batch create";
		$this->load->admin_temp('batch_create',$data);
	 }

	 public function batch_list(){
		$table_name="tc_batch";
        $data['batch_data']=$this->CM->get($table_name);
		$this->load->admin_temp('batch_list',$data);
	 }

	 public function batch_edit(){

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where =array(
				"batch_id"=>$id
			);
			$table_name="tc_batch";
			$data['batch_edit_data']=$this->CM->get($table_name,$where);
			$data['batch_edit_data']=$data['batch_edit_data'][0];
		}
			if(isset($_POST['submit'])){
				$course_id = $_POST['course_id'];
			    $batch_name = $_POST['batch_name'];
				$id = $_POST['id'];
				$updated_at = time(); 
				$table_name = "tc_batch";
				$redirect = "batch-List";
				$data =array(
					"course_id" => $course_id,
				    "batch_name" => $batch_name,
					"updated_at"=>$updated_at
				);
				$where = array(
					"batch_id"=>$id
				);
				$this->CM->update($data,$table_name,$where,$redirect);
			}
        $data['page_name']="batch edit";
		$this->load->admin_temp('batch_edit',$data);
}

        public function group_create(){

	if(isset($_POST['submit'])){
		$group_name = $_POST['group_name'];
		$course_id = $_POST['course_id'];
		$batch_id = $_POST['batch_id'];
		$created_at = time();

		$table_name = "tc_batch_group";
		$data = array(
			"group_name" => $group_name,
			"course_id" => $course_id,
			"batch_id" => $batch_id,
			"created_at"=>$created_at
		);

		$redirect = "group_list";
		$this->CM->save($data,$table_name,$redirect);

	}

	$data['page_name']="Group Create";
	$this->load->admin_temp('group_create',$data);
}

  public function group_list(){
	    $table_name="tc_batch_group";
        $data['group_data']=$this->CM->get($table_name);
		$this->load->admin_temp('group_list',$data);
  }

  public function group_edit(){

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$where =array(
			"group_id"=>$id
		);
		$table_name="tc_batch_group";
		$data['group_edit_data']=$this->CM->get($table_name,$where);
		$data['group_edit_data']=$data['group_edit_data'][0];
	}
		if(isset($_POST['submit'])){
			$group_name = $_POST['group_name'];
		    $course_id = $_POST['course_id'];
		    $batch_id = $_POST['batch_id'];
		    $created_at = time();
			$id = $_POST['id']; 
			$table_name = "tc_batch_group";
			$redirect = "group_list";
			$data =array(
				"group_name" => $group_name,
			    "course_id" => $course_id,
			    "batch_id" => $batch_id,
			    "created_at"=>$created_at   
			);
			$where = array(
				"group_id"=>$id
			);
			$this->CM->update($data,$table_name,$where,$redirect);
		}

	$data['page_name']="Group Create";
	$this->load->admin_temp('group_create',$data);
  }

}