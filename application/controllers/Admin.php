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
        $data['course_data']=$this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where);
		$data['course_data']=$data['course_data'][0]; 
		}
		if(isset($_POST['submit']))
		{
			$course_id = $_POST['id'];
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
		    }else{
				$overview_img = $_POST['h_overview_img'];
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
		    }else{
				$keyoutcome_img = $_POST['h_keyoutcome_img'];
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
		    }else{
				$benifits_img = $_POST['h_benifits_img'];
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
		    }else{
				$sec_1_img = $_POST['h_sec_1_img'];
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
		    }else{
				$sec_2_img = $_POST['h_sec_2_img'];
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
			$table_name = "tc_course";
			$redirect="Course-List";
			$where = array(
				"course_id"=>$course_id
			);
			$this->CM->update($data,$table_name,$where,$redirect);
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
		if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_testimonial";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"testimonial_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "testimonial_id";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		$table_name="tc_testimonial";
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
        $data['testimonial_data']=$this->CM->get($table_name,$limit,$offset,$order_by);
		$this->load->admin_temp('testimonial_list',$data);
		
	}
	public function testimonial_edit(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where =array(
				"testimonial_id"=>$id
			);
			$table_name="tc_testimonial";
			$data['testimonial_edit_data']=$this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where);
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
		$user_info = $this->session->userdata('user_data');
		$table_name = "tc_course";
		$select = 'course_id,course_name,course_abber';
		$data['course_data'] = $this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where=Null,$select); 
		if(isset($_POST['submit'])){
			$course_data = $_POST['course_data'];
			$course_data = explode(',',$course_data);
			$course_id = $course_data[0];
			$course_abber = $course_data[1];
			$table_name = "tc_batch";
			$where = array(
				"course_id"=>$course_id
			);
		    $batch_row=$this->CM->get_row($table_name,$where=Null);
			$batch_id = $batch_row +1;
		    $batch_number = $course_abber."-BATCH-".$batch_id;
		    $batch_name = $_POST['batch_name'];
			$created_at = time();
			$created_by = $user_info->id;
            $table_name = "tc_batch";
			$data = array(
                "course_id" => $course_id,
				"batch_name" => $batch_name,
				"batch_number" => $batch_number,
				"created_at"=>$created_at,
				"created_by"=>$created_by,
				"status"=>'1'
			);

			$redirect = "Batch-List";
			$this->CM->save($data,$table_name,$redirect);

		}
        $data['page_name']="batch create";
		$this->load->admin_temp('batch_create',$data);
	 }

	 public function batch_list(){
		if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_batch";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"batch_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}	
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "batch_id";
		$table_name="tc_batch";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
		$sql = "SELECT b.*, c.course_name FROM tc_batch as b, tc_course as c WHERE b.course_id = c.course_id";
        $data['batch_data']=$this->CM->get_join($sql); 
		$this->load->admin_temp('batch_list',$data);
	 }

	 public function batch_edit(){

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$where =array(
				"batch_id"=>$id
			);
			$table_name="tc_batch";
			$data['batch_edit_data']=$this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where);
			$data['batch_edit_data']=$data['batch_edit_data'][0];
		}
			if(isset($_POST['submit'])){
				$course_id = $_POST['course_id'];
			    $batch_name = $_POST['batch_name'];
				$id = $_POST['id'];
				$updated_at = time(); 
				$table_name = "tc_batch";
				$redirect = "Batch-List";
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
         public function batch_instructor_list()
		   {
			if(isset($_GET['id']) && isset($_GET['status']) ){
				$id = $_GET['id'];
				$status =$_GET['status'];
				$table_name = "tc_batch";
				$data = array(
					"status"=>$status
				);
				$where = array(
					"batch_id"=>$id
				);
				$this->CM->update($data,$table_name,$where);
			}	
			if(isset($_GET['batch_id'])){
				$batch_id = $_GET['batch_id'];
				if(isset($_GET['page'])){
					$page_no = $_GET['page']; 
				}else{
					$page_no = 1;
				}
				$order_by = "emp_id";
				$limit = 10;
				$offset = ($page_no-1) * $limit; 
				$table_name="tc_employee";
				$where= array(
					"batch_id"=> $batch_id
				);
				$row = $this->CM->get_row($table_name,$where);
				$data['total_pages'] = ceil($row/$limit);

				$data['batch_inst_data']=$this->CM->get($table_name,$limit,$offset,$order_by,$where);
			}
			$data['page_name']="batch instructor";
		    $this->load->admin_temp('batch_instructor_list',$data);
           }
		   public function add_instructor(){
			$data['page_name']="batch instructor";
			if(isset($_GET['id']) && isset($_GET['status']) ){
				$id = $_GET['id'];
				$status =$_GET['status'];
				$table_name = "tc_";
				$data = array(
					"status"=>$status
				);
				$where = array(
					"batch_id"=>$id
				);
				$this->CM->update($data,$table_name,$where);
			}	
			if(isset($_GET['batch_id'])){
				$sql = "SELECT em.emp_id AS emp_id, co.course_name AS course_name, co.course_level AS levels, co.no_of_seats AS seats,
				 em.emp_name AS emp_name, em.role AS role, em.group_id AS group_id, em.designation AS designation FROM tc_employee AS 
				 em, tc_course AS co, tc_batch AS b WHERE em.status = 1 AND co.status = 1 AND b.status = 1 AND co.course_id = em.course_id 
				 AND b.course_id = co.course_id AND b.batch_id = ".$_GET['batch_id']."";
				$data['batch_inst_data']=$this->CM->get_join($sql);
			}
			if(isset($_POST['submit'])){
				$instructor_id = $_POST['instructor_id'];
				$batch_id = $_POST['batch_id'];
				$data= array(
					"batch_id"=>$batch_id,
				);
				$where =$instructor_id;
			$table_name = "tc_employee";
			$redirect = "Batch-Instructor-List?page=1&batch_id=".$batch_id;
			$where_in_column = "emp_id";
			$this->CM->update_in($data,$table_name,$where,$redirect,$where_in_column);
			}
			if(isset($_GET['group_id'])){
				$sql = "SELECT em.emp_id AS emp_id, co.course_name AS course_name, co.course_level AS levels, co.no_of_seats AS seats,
				 em.emp_name AS emp_name, em.role AS role, em.group_id AS group_id, em.designation AS designation FROM tc_employee AS 
				 em, tc_course AS co, tc_batch_group AS g WHERE em.status = 1 AND co.status = 1 AND g.status = 1 AND co.course_id = em.course_id 
				 AND g.course_id = co.course_id AND g.group_id = ".$_GET['group_id']." AND g.batch_id = em.batch_id";
				$data['group_inst_data']=$this->CM->get_join($sql);
			}
			if(isset($_POST['inst_add_submit'])){
				$instructor_id = $_POST['instructor_id'];
				$group_id = $_POST['group_id'];
				$data= array(
					"group_id"=>$group_id,
				);
				$where =$instructor_id;
			$table_name = "tc_employee";
			$redirect = "Group-Instructor-List?page=1&group_id=".$group_id;
			$where_in_column = "emp_id";
			$this->CM->update_in($data,$table_name,$where,$redirect,$where_in_column);
			}
		    $this->load->admin_temp('add_instructor',$data);
		   }

        public function group_create(){
			if(isset($_POST['course_id'])){
				$course_id = $_POST['course_id'];
				$table_name = "tc_batch";
				$select = "batch_id, batch_name, batch_number";
				$where = " status = 1 AND course_id =".$course_id;
				$data['batch_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
			}
			if(isset($_POST['submit'])){
				$course_id = $_POST['course_id'];
				$batch_id = $_POST['batch_id'];
				$group_name = $_POST['group_name'];
				$table_name = "tc_course";
				$select = "course_abber";
				$where = " status = 1 AND course_id =".$course_id;
				$course_abber = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
				$course_abber = $course_abber[0]['course_abber'];
				$table_name = "tc_batch_group";
				$group_row=$this->CM->get_row($table_name,);
			    $group_id = $group_row +1;
		        $group_number = $course_abber."-GROUP-".$group_id;
				$table_name = "tc_batch_group";
				$created_at = time();
				$data = array(
					"group_name"=>$group_name,
					"group_number"=>$group_number,
					"course_id"=>$course_id,
					"batch_id"=>$batch_id,
					"created_at"=>$created_at,
					"status"=>"1"
				);
				$redirect = "Group-List";
				$this->CM->save($data,$table_name,$redirect);
			}
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
			"status"=>'1',
			"created_at"=>$created_at
		);

		$redirect = "Group-List";
		$this->CM->save($data,$table_name,$redirect);

	}
	$table_name = "tc_course";
	$select = "course_id, course_name";
	$where = "status = 1";
	$data['course_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
	$data['page_name']="Group Create";
	$this->load->admin_temp('group_create',$data);
}

  public function group_list(){
	if(isset($_GET['id']) && isset($_GET['status']) ){
		$id = $_GET['id'];
		$status =$_GET['status'];
		$table_name = "tc_batch_group";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"group_id"=>$id
		);
		$this->CM->update($data,$table_name,$where);
	}	
	if(isset($_GET['page'])){
		$page_no = $_GET['page']; 
	}else{
		$page_no = 1;
	}
	$order_by = "group_id";
	$table_name="tc_batch_group";
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$row = $this->CM->get_row($table_name);
	$data['total_pages'] = ceil($row/$limit);
	$sql = "SELECT g.*, c.course_name, b.batch_name, b.batch_number FROM tc_batch_group AS g, tc_batch AS b, tc_course AS c WHERE 
	c.course_id = g.course_id AND b.batch_id = g.batch_id";
    $data['group_data']=$this->CM->get_join($sql);
	$this->load->admin_temp('group_list',$data);
  }

  public function group_edit(){

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$where =array(
			"group_id"=>$id
		);
		$table_name="tc_batch_group";
		$data['group_edit_data']=$this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where);
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
  public function group_inst_list(){
	
	if(isset($_GET['id']) && isset($_GET['status']) ){
		$id = $_GET['id'];
		$status =$_GET['status'];
		$table_name = "tc_batch";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"batch_id"=>$id
		);
		$this->CM->update($data,$table_name,$where);
	}	
	if(isset($_GET['group_id'])){
		$group_id = $_GET['group_id'];
		if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "emp_id";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		$table_name="tc_employee";
		$where= array(
			"group_id"=> $group_id
		);
		$row = $this->CM->get_row($table_name,$where);
		$data['total_pages'] = ceil($row/$limit);

		$data['group_inst_data']=$this->CM->get($table_name,$limit,$offset,$order_by,$where);
	}
	$data['page_name']="Group Create";
	$this->load->admin_temp('group_instructor_list',$data);
  }

}