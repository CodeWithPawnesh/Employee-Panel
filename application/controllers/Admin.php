<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
        $data['course_data']=$this->CM->get($table_name,$limit,$offset,$order_by);
		if(isset($_GET['delete_id'])){
			$course_id = $_GET['delete_id'];
			$this->CM->delete_course($course_id);
		}
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
			$no_of_lessons = $_POST['no_of_lessons'];
			$price = $_POST['price'];
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
				"price"=>$price,
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
			$no_of_lessons = $_POST['no_of_lessons'];
			$price = $_POST['price'];
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
				"price"=>$price,
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
		if(isset($_POST['course_data'])){
			$course_data = $_POST['course_data'];
			$course_data = explode(',',$course_data);
			$course_id = $course_data[0];
			$sql = "SELECT emp_id,emp_name FROM tc_employee WHERE course_id Like '%$course_id%' AND role = 1 ";
			$data['trainer_data'] = $this->CM->get_join($sql);
		} 
		if(isset($_POST['submit'])){
			$class_ts = $_POST['class_ts'];
			$class_ts = strtotime($class_ts);
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$course_data = $_POST['course'];
			$course_data = explode(',',$course_data);
			$course_id = $course_data[0];
			$course_abber = $course_data[1];
			$course_name = $course_data[2];
			$slots = $_POST['slots'];
			$table_name = "tc_batch";
			$where = array(
				"course_id"=>$course_id
			);
		    $course_batch_row=$this->CM->get_row($table_name,$where);
			$course_batch_id = $course_batch_row +1;
		    $batch_number = $course_abber."-BATCH-".$course_batch_id;
			$live_class_name = $course_name."-Live-Class-Batch-".$course_batch_id;
			$doubt_class_name_b = $course_name."-Boys-Doubt-Class-Batch-".$course_batch_id;
			$doubt_class_name_g = $course_name."-Girls-Doubt-Class-Batch-".$course_batch_id;
		    $batch_name = $course_name."-BATCH-". date('M')."-". $course_batch_id;
			$trainer = $_POST['trainer'];
			$created_at = time();
			$created_by = $user_info->id;
            $table_name = "tc_batch";
			$data = array(
                "course_id" => $course_id,
				"batch_name" => $batch_name,
				"emp_id"=>$trainer,
				"batch_number" => $batch_number,
				"batch_start_date"=>$start_date,
				"batch_end_date"=>$end_date,
				"created_at"=>$created_at,
				"created_by"=>$created_by,
				"status"=>'1',
				"slots"=>$slots
			);
			$this->CM->save($data,$table_name);
			$sql = "SELECT batch_id FROM tc_batch ORDER BY batch_id DESC LIMIT 1";
			$batch_id= $this->CM->get_join($sql);
			$batch_id = $batch_id[0]['batch_id'];
			$class_table_name = "tc_classes";
			$live_class_data = array(
				"class_name"=>$live_class_name,
				"type"=>"1",
				"batch_id"=> $batch_id,
				"teacher_id"=>$trainer,
				"class_ts"=>$class_ts,
				"added_ts"=>$created_at,
				"status"=>"1"
			);
			$doubt_class_data_b = array(
				"class_name"=>$doubt_class_name_b,
				"type"=>"2",
				"batch_id"=> $batch_id,
				"teacher_id"=>$trainer,
				"added_ts"=>$created_at,
				"status"=>"0"
			);
			$doubt_class_data_g = array(
				"class_name"=>$doubt_class_name_g,
				"type"=>"3",
				"batch_id"=> $batch_id,
				"teacher_id"=>$trainer,
				"added_ts"=>$created_at,
				"status"=>"0"
			);
			$redirect = "Batch-List";
			$this->CM->save($live_class_data,$class_table_name);
			$this->CM->save($doubt_class_data_b,$class_table_name);
			$this->CM->save($doubt_class_data_g,$class_table_name,$redirect);
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
		$table_name="tc_batch";
		$limit = 10;
		$offset = ($page_no-1) * $limit; 
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
		$sql = "SELECT b.*,e.emp_name, c.course_name FROM tc_batch as b, tc_course as c, tc_employee as e WHERE b.emp_id = e.emp_id AND b.course_id = c.course_id ORDER BY b.batch_id DESC LIMIT $offset,$limit ";
        $data['batch_data']=$this->CM->get_join($sql);
		if(isset($_GET['delete_id'])){
			$batch_id = $_GET['delete_id'];
			$table_name = "tc_batch";
			$where = array(
				"batch_id"=>$batch_id
			);
			$redirect = "Batch-List";
			$this->CM->delete($table_name,$where,$redirect);
		}
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
				$slots = $_POST['slots'];
				$batch_name = $_POST['batch_name'];
				$start_date = $_POST['start_date'];
				$start_date = strtotime($start_date);
				$end_date = $_POST['end_date'];
			    $end_date = strtotime($end_date);
				$id = $_POST['id'];
				$updated_at = time(); 
				$table_name = "tc_batch";
				$redirect = "Batch-List";
				$data =array(
					"batch_name"=>$batch_name,
					"slots"=>$slots,
					"batch_start_date"=>$start_date,
					"batch_end_date"=>$end_date,
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
				$table_name="tc_batch_group";
				$where= array(
					"batch_id"=> $batch_id,
					"status"=>1
				);
				$row = $this->CM->get_row($table_name,$where);
				$data['total_pages'] = ceil($row/$limit);
				$sql = "SELECT e.emp_name, e.email, g.group_name FROM tc_employee AS e, tc_batch_group AS g WHERE g.emp_id = e.emp_id AND g.status = '1' AND g.batch_id = $batch_id  LIMIT $offset,$limit";
				$data['batch_inst_data']=$this->CM->get_join($sql);
			}
			$data['page_name']="batch instructor";
		    $this->load->admin_temp('batch_instructor_list',$data);
           }
        public function group_create(){
			if(isset($_POST['course_id'])){
				$course_id = $_POST['course_id'];
				$table_name = "tc_batch";
				$select = "batch_id, batch_name, batch_number";
				$where = " status = 1 AND course_id =".$course_id;
				$data['batch_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
				$sql = "SELECT emp_id,emp_name FROM tc_employee WHERE course_id Like '%$course_id%' AND role = 2 AND status = 1 ";
			    $data['instructor_data'] = $this->CM->get_join($sql);
			}
			if(isset($_POST['submit'])){
				$class_ts = $_POST['class_ts'];
			    $class_ts = strtotime($class_ts);
				$emp_id = $_POST['emp_id'];
				$table_name = "tc_course";
				$course_id = $_POST['course_id'];
				$batch_id = $_POST['batch_id'];
				$select = "course_name,course_abber";
				$where = " status = 1 AND course_id =".$course_id;
				$course_data = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
				$course_name = $course_data[0]['course_name'];
				$course_abber = $course_data[0]['course_abber'];
				$table_name = "tc_batch_group";
				$where = array(
				"batch_id"=>$batch_id
				);
				$group_row=$this->CM->get_row($table_name,$where);
			    $group_nu = $group_row +1;
		        $group_number = $course_abber."-GROUP-".$group_nu;
				$group_name = $course_name."-GROUP-".date('M')."-".$group_nu;
				$table_name = "tc_batch_group";
				$created_at = time();
				$data = array(
					"group_name"=>$group_name,
					"group_number"=>$group_number,
					"emp_id"=>$emp_id,
					"batch_id"=>$batch_id,
					"created_at"=>$created_at,
					"status"=>"1"
				);
			$this->CM->save($data,$table_name);
			$table_name = "tc_classes";
			$sql = "SELECT group_id FROM tc_batch_group ORDER BY group_id DESC LIMIT 1";
			$group_id= $this->CM->get_join($sql);
			$group_id = $group_id[0]['group_id'];
			$class_table_name = "tc_classes";
			$live_class_name = "Live-Coding-"."$course_name"."-Group-".$group_nu;
			$doubt_class_name_b = "Boys-Doubt-Coding-"."$course_name"."-Group-".$group_nu;
			$doubt_class_name_g = "GirlsDoubt-Coding-"."$course_name"."-Group-".$group_nu;
			$doubt_class_name = "Doubt-Coding-"."$course_name"."-Group-".$group_nu;
			$live_class_data = array(
				"class_name"=>$live_class_name,
				"type"=>"1",
				"group_id"=>$group_id,
				"batch_id"=> $batch_id,
				"teacher_id"=>$emp_id,
				"class_ts"=>$class_ts,
				"added_ts"=>$created_at,
				"status"=>"1"
			);
			$doubt_class_data_b = array(
				"class_name"=>$doubt_class_name_b,
				"type"=>"2",
				"group_id"=>$group_id,
				"batch_id"=> $batch_id,
				"teacher_id"=>$emp_id,
				"added_ts"=>$created_at,
				"status"=>"0"
			);
			$doubt_class_data_g = array(
				"class_name"=>$doubt_class_name_g,
				"type"=>"3",
				"group_id"=>$group_id,
				"batch_id"=> $batch_id,
				"teacher_id"=>$emp_id,
				"added_ts"=>$created_at,
				"status"=>"0"
			);
			$redirect = "Group-List";
			$this->CM->save($live_class_data,$class_table_name);
			$this->CM->save($doubt_class_data_b,$class_table_name);
			$this->CM->save($doubt_class_data_g,$class_table_name,$redirect);
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
	$table_name="tc_batch_group";
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$row = $this->CM->get_row($table_name);
	$data['total_pages'] = ceil($row/$limit);
	$sql = "SELECT g.*, c.course_name, b.batch_name, b.batch_number,e.emp_name FROM tc_employee AS e, tc_batch_group AS g, tc_batch AS b, tc_course AS c WHERE 
	c.course_id = b.course_id AND b.batch_id = g.batch_id AND e.emp_id = g.emp_id ORDER BY g.group_id DESC LIMIT $offset,$limit";
    $data['group_data']=$this->CM->get_join($sql);
	if(isset($_GET['delete_id'])){
		$group_id = $_GET['delete_id'];
		$table_name = "tc_batch_group";
		$where = array(
			"group_id"=>$group_id
		);
		$redirect = "Group-List";
		$this->CM->delete($table_name,$where,$redirect);
	}
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
  public function student_leave(){
	if(isset($_GET['id']) && isset($_GET['status']) ){
		$id = $_GET['id'];
		$status =$_GET['status'];
		$table_name = "tc_leave";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"id"=>$id
		);
		$this->CM->update($data,$table_name,$where);
	}	
	if(isset($_GET['page'])){
		$page_no = $_GET['page']; 
	}else{
		$page_no = 1;
	}
	$table_name="tc_leave";
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$where = array(
		"user"=>"2"
	);
	$row = $this->CM->get_row($table_name,$where);
	$data['total_pages'] = ceil($row/$limit);
	$sql = "SELECT l.*, s.student_name FROM tc_leave AS l, tc_student as s WHERE l.user_id = s.student_id AND l.user = '2' ORDER BY id DESC";
	$data['leave_data'] = $this->CM->get_join($sql);
	$this->load->admin_temp('student_leave',$data);
  }
  public function employee_leave(){
	if(isset($_GET['id']) && isset($_GET['status']) ){
		$id = $_GET['id'];
		$status =$_GET['status'];
		$table_name = "tc_leave";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"id"=>$id
		);
		$this->CM->update($data,$table_name,$where);
	}	
	if(isset($_GET['page'])){
		$page_no = $_GET['page']; 
	}else{
		$page_no = 1;
	}
	$table_name="tc_leave";
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$where = array(
		"user"=>"1"
	);
	$row = $this->CM->get_row($table_name,$where);
	$data['total_pages'] = ceil($row/$limit);
	$sql = "SELECT l.*, e.emp_name FROM tc_leave AS l, tc_employee as e WHERE l.user_id = e.user_id AND l.user = '1' ORDER BY id DESC";
	$data['leave_data'] = $this->CM->get_join($sql);
	$this->load->admin_temp('employee_leave',$data);
}
public function student_course_list(){
	if(isset($_GET['id'])){
		$student_id = $_GET['id'];

	if(isset($_GET['page'])){
		$page_no = $_GET['page']; 
	}else{
		$page_no = 1;
	}
	$table_name="tc_enrollment";
	$where = array(
		"student_id"=> $student_id
	);
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$row = $this->CM->get_row($table_name,$where);
	$data['total_pages'] = ceil($row/$limit);
		$sql = "SELECT en.*,c.course_name, b.batch_name, g.group_name FROM tc_course AS c, tc_batch AS b, tc_batch_group AS g, tc_enrollment AS en
				WHERE en.student_id = $student_id AND en.course_id = c.course_id AND en.batch_id = b.batch_id AND en.group_id = g.group_id ";
		$data['course_data'] = $this->CM->get_join($sql);
		if(isset($_GET['course_delete']) ){
			$enroll_id = $_GET['course_delete'];
			$where = array(
				"en_id"=>$enroll_id
			);
			$table_name = "tc_enrollment";
			$redirect = "Student-Course-List?id=".$_GET['id'];
			$this->CM->delete($table_name,$where,$redirect);
		}
		  $this->load->admin_temp('student_course_list',$data);
}
}
public function add_student_course(){
	$curr_date = date('y-m-d');
	$curr_ts = strtotime($curr_date);
	$data['page'] = "add";
	if(isset($_GET['id'])){
	$student_id = $_GET['id'];
	$sql = "SELECT c.course_name, c.course_id FROM tc_course AS c , tc_enrollment AS er WHERE c.course_id != er.course_id
	AND er.student_id = $student_id";
	$data['course_data'] = $this->CM->get_join($sql);
	}
	if(isset($_POST['course_id'])){
		$course_id = $_POST['course_id'];
		$sql = "SELECT batch_name,batch_id FROM tc_batch WHERE course_id = $course_id AND  batch_end_date >= $curr_ts ";
		$data['batch_data'] = $this->CM->get_join($sql);
	}
	if(isset($_POST['batch_id']) && !isset($_GET['group_id'])){
		$batch_id = $_POST['batch_id'];
		$sql = "SELECT group_name, group_id FROM tc_batch_group WHERE batch_id = $batch_id ";
		$data['group_data'] = $this->CM->get_join($sql);
	}
	if(isset($_POST['submit'])){
		$course_id = $_POST['course_id'];
		$batch_id = $_POST['batch_id'];
		$group_id = $_POST['group_id'];
		$student_id = $_POST['s_id'];
		$student_data = $this->CM->get_student($student_id);
		$course_data = $this->CM->get_course($course_id);
		$data = array(
			"student_id"=> $student_id,
			"course_id"=> $course_id,
			"batch_id"=> $batch_id,
			"group_id"=> $group_id,
			"enroll_date"=>$curr_ts
		);
		$this->CM->en_existing_std($data,$course_data,$student_data);
	}
	$this->load->admin_temp('add_student_course',$data);
}
public function edit_student(){
	$data['page']="";
	if(isset($_GET['id'])){
		$student_id = $_GET['id'];
	$sql ="SELECT s.*, u.password,u.id FROM tc_student as s, tc_login as u WHERE s.student_id = $student_id AND u.id = s.user_id";
	$data['student_data'] = $this->CM->get_join($sql);
	$data['student_data'] = $data['student_data'][0];
	}
	if(isset($_POST['submit'])){
		$address = $_POST['address'];
		$collage = $_POST['collage'];
		$year = $_POST['year'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$u_id = $_POST['u_id'];
		$std_data = array(
			"student_name"=>$name,
			"email"=>$email,
			"phone"=>$phone,
			"address"=>$address,
			"collage"=>$collage,
			"year"=>$year
		);
		$user_data = array(
			"email"=>$email,
			"password"=>$password
		);
		$where = array(
			"user_id"=>$u_id
		);
		$u_where = array(
			"id"=>$u_id
		);
		$this->CM->update_student($std_data,$user_data,$where,$u_where);

	}
	$this->load->admin_temp('edit_student',$data); 
}
public function edit_employee(){
	$data['page']="";
	if(isset($_GET['id'])){
		$emp_id = $_GET['id'];
	$sql ="SELECT e.*, u.password,u.id FROM tc_employee as e, tc_login as u WHERE e.emp_id = $emp_id AND u.id = e.user_id";
	$data['employee_data'] = $this->CM->get_join($sql);
	$data['employee_data'] = $data['employee_data'][0];
	}
	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$designation = $_POST['desg'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$education =$_POST['education'];
		$u_id = $_POST['u_id'];
		$emp_data = array(
			"emp_name"=>$name,
			"email"=>$email,
			"phone"=>$phone,
			"education"=>$education,
			"designation"=>$designation
		);
		$user_data = array(
			"email"=>$email,
			"password"=>$password
		);
		$where = array(
			"user_id"=>$u_id
		);
		$u_where = array(
			"id"=>$u_id
		);
		$this->CM->update_teacher($emp_data,$user_data,$where,$u_where);

	}
	$this->load->admin_temp('edit_employee',$data); 
}
public function add_employee(){
	$table = "tc_course";
	$data['course_data'] = $this->CM->get($table);
	if(isset($_POST['submit'])){
		$role = $_POST['role'];
		if($role == 0){
			$designation = "Admin";
			$access_level = 0;
		}
		if($role == 1){
			$designation = "Trainer";
			$access_level = 1;
		}
		if($role == 2){
			$designation = "Instructor";
			$access_level = 2;
		}
		$course_id = $_POST['course_id'];
		$course_ids =  implode(",",$course_id);
		$emp_name = $_POST['emp_name'];
		$emp_phone = $_POST['emp_phone'];
		$email = $_POST['email'];
		$education = $_POST['education'];
		$password = $_POST['password'];
		$pass_o = md5($password);
		$created_at = date('y-m-d');
		$created_ts = strtotime($created_at);
		$status = 1;
		$user_login = array(
			"email"=>$email,
			"access_level"=>$access_level,
			"password"=>$password,
			"password_o"=>$pass_o,
			"created_ts"=>$created_ts,
			"status"=>1
		);
		$employee = array(
			"emp_name"=>$emp_name,
			"email"=>$email,
			"phone"=>$emp_phone,
			"course_id"=>$course_ids,
			"education"=>$education,
			"role"=>$role,
			"designation"=>$designation,
			"status"=>1,
			"created_by"=>$created_ts
		);
		$this->CM->insert_teacher($user_login,$employee);
	}
	$this->load->admin_temp('add_employee',$data); 
}
public function employee_course(){
	if(isset($_GET['id'])){
		$emp_id = $_GET['id'];
		$sql = "SELECT course_id FROM tc_employee WHERE emp_id = $emp_id ";
		$course_ids = $this->CM->get_join($sql);
		$course_ids = $course_ids[0]['course_id'];
		$sql = "SELECT course_id, course_name FROM tc_course WHERE course_id IN($course_ids) ";
		$data['course_data'] = $this->CM->get_join($sql);
	}
	$this->load->admin_temp('employee_course',$data);
}
public function add_employee_course(){
	$data['page'] = "page";
	if(isset($_GET['id'])){
		$employee_id = $_GET['id'];
		$sql = "SELECT c.course_name, c.course_id FROM tc_course AS c, tc_employee AS e  WHERE c.course_id  NOT IN (e.course_id)
		AND e.emp_id = $employee_id";
		$data['course_data'] = $this->CM->get_join($sql);
	}
	if(isset($_POST['submit'])){
		$course_id = $_POST['course_id'];
		$employee_id = $_POST['emp_id'];
		$sql = "SELECT course_id FROM tc_employee  WHERE emp_id = $employee_id";
		$course_ids = $this->CM->get_join($sql);
		$course_ids = $course_ids[0]['course_id'];
		$newCourseIds = $course_ids.",".$course_id;
		echo $newCourseIds;
		$data = array("course_id"=>$newCourseIds);
		$table_name="tc_employee";
		$where = array("emp_id"=>$employee_id);
		$redirect = "Employee-Course?id=".$employee_id;
		$this->CM->update($data,$table_name,$where,$redirect);
	}

	$this->load->admin_temp('add_employee_course',$data);
}
public function employee_list(){
	if(isset($_GET['delete_emp'])){
		$emp_id = $_GET['delete_emp'];
		$sql = "SELECT user_id FROM tc_employee WHERE emp_id = $emp_id";
            $user_id = $this->CM->get_join($sql);
            $user_id = $user_id[0]['user_id'];
		$this->CM->delete_employee($emp_id,$user_id);
	}
	if(isset($_GET['page'])){
		$page_no = $_GET['page']; 
	}else{
		$page_no = 1;
	}
	$table_name="tc_employee";
	$limit = 10;
	$offset = ($page_no-1) * $limit; 
	$row = $this->CM->get_row($table_name);
	$data['total_pages'] = ceil($row/$limit);
	$sql ="SELECT e.*, u.password FROM tc_employee as e, tc_login as u WHERE  u.id = e.user_id LIMIT $limit OFFSET $offset";
	$data['emp_data'] = $this->CM->get_join($sql);
	$this->load->admin_temp('employee_list',$data);
}
public function add_student(){
	$data['page']="";
	$table_name = "tc_course";
	$select = 'course_id,course_name';
	$data['course_data'] = $this->CM->get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where=Null,$select); 
	if(isset($_POST['course_data'])){
			$course_id = $_POST['course_data'];
			$table_name = "tc_batch";
			$select = "batch_id, batch_name";
			$where = " status = 1 AND course_id =".$course_id;
			$data['batch_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
	}
	if(isset($_POST['batch_data'])){
		$batch_id = $_POST['batch_data'];
		$table_name = "tc_batch_group";
			$select = "group_id, group_name";
			$where = " status = 1 AND batch_id =".$batch_id;
			$data['group_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select);
	}
	if(isset($_POST['submit'])){
		$course_id = $_POST['course_id'];
		$batch_id = $_POST['batch_id'];
		$group_id = $_POST['group_id'];
		$student_name = $_POST['student_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$str = date('ymd');
		$current_date  = date('y-m-d');
		$date_ts = strtotime($current_date);
		$pass = rand();
		$pass_o = md5($pass);
		$login_data = array(
			"email"=>$email,
			"password"=>$pass,
			"password_o"=>$pass_o,
			"access_level"=>3,
			"created_ts"=>$date_ts,
			"status"=>1
		);
		$student_data = array(
			"student_name"=>$student_name,
			"email"=>$email,
			"phone"=>$phone,
			"status"=>1   
		);
		$enroll_data = array(
			"course_id"=>$course_id,
			"batch_id"=>$batch_id,
			"group_id"=>$group_id,
			"enroll_date"=>$date_ts
		);
		$table_name= "tc_course";
		$select ="course_name";
		$where =array("course_id"=>$course_id);
		$course_name = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
		$this->CM->add_student($login_data,$student_data,$course_name,$enroll_data);
	}
	$this->load->admin_temp('add_student',$data);
}
public function internship_list(){
	if(isset($_GET['in_id']) && isset($_GET['status']) && isset($_GET['stu_id']) ){
		$id = $_GET['in_id'];
		$s_id = $_GET['stu_id'];
		$status =$_GET['status'];
		$table_name = "tc_internship";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"internship_id"=>$id
		);
		$redirect = "Internship-List?id=".$s_id;
		$this->CM->update($data,$table_name,$where,$redirect);
	}
	if(isset($_GET['id'])){
		$student_id = $_GET['id'];
		$sql = "SELECT * FROM tc_internship WHERE student_id = $student_id ";
		$data['internship_data'] = $this->CM->get_join($sql);
	}
	if(isset($_GET['delete_id'])){
		$id = $_GET['delete_id'];
		$where = array(
			"internship_id"=>$id
		);
		$table_name = "tc_internship";
		$redirect = "Internship-List?id=".$id;
		$this->CM->delete($table_name,$where,$redirect);
	}
	$this->load->admin_temp('internship_list',$data);
}
public function create_internship(){
	$data['page'] = "page";
	$emp_info = $this->session->userdata('emp_data');
	$emp_id = $emp_info->emp_id;
	if(isset($_POST['submit'])){
		$type = $_POST['type'];
		$stipend = $_POST['stipend'];
		$internship_desc = $_POST['internship_desc'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$student_id = $_POST['student_id'];
		$status = 1;
		$created_by = $emp_id;
		$data = array(
			"student_id"=>$student_id,
			"start_date"=>$start_date,
			"end_date"=>$end_date,
			"paid_or_unpaid"=>$type,
			"stipend"=>$stipend,
			"description"=>$internship_desc,
			"status"=>$status,
			"created_by"=>$created_by
		);
		$redirect = "Internship-List?id=".$student_id;
		$table_name = "tc_internship";
		$this->CM->save($data,$table_name,$redirect);
	}
	$this->load->admin_temp('create_internship',$data);
}
public function edit_internship(){
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$table_name = "tc_internship";
		$where = array(
			"internship_id"=>$id
		);
		$data['internship_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		$data['internship_data'] = $data['internship_data'][0];
	}
	if(isset($_POST['submit'])){
		$stu_id = $_POST['stu_id'];
		$type = $_POST['type'];
		$stipend = $_POST['stipend'];
		$internship_desc = $_POST['internship_desc'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$internship_id = $_POST['internship_id'];
		$date = date('y-m-d');
		$where = array("internship_id"=>$internship_id);
		$data = array(
			"start_date"=>$start_date,
			"end_date"=>$end_date,
			"paid_or_unpaid"=>$type,
			"stipend"=>$stipend,
			"description"=>$internship_desc,
			"updated_at"=>$date
		);
		$redirect = "Internship-List?id=".$stu_id;
		$table_name = "tc_internship";
		$this->CM->update($data,$table_name,$where,$redirect);
	}
	$this->load->admin_temp('edit_internship',$data);
}
public function job_list(){
	if(isset($_GET['job_id']) && isset($_GET['status']) && isset($_GET['batch_id']) ){
		$job_id = $_GET['job_id'];
		$batch_id = $_GET['batch_id'];
		$status =$_GET['status'];
		$table_name = "tc_job_updates";
		$data = array(
			"status"=>$status
		);
		$where = array(
			"job_id"=>$job_id
		);
		$redirect = "Job-Updates-List?id=".$batch_id;
		$this->CM->update($data,$table_name,$where,$redirect);
	}
	if(isset($_GET['delete_id']) && isset($_GET['batch_id'])){
		$id = $_GET['delete_id'];
		$b_id = $_GET['batch_id'];
		$where = array(
			"job_id"=>$id
		);
		$table_name = "tc_job_updates";
		$redirect = "Job-Updates-List?id=".$b_id;
		$this->CM->delete($table_name,$where,$redirect);
	}

	if(isset($_GET['id'])){
	$batch_id = $_GET['id'];
	$sql = "SELECT J.*, b.batch_name FROM tc_job_updates AS j, tc_batch AS b WHERE j.batch_id = $batch_id AND b.batch_id = j.batch_id";
	$data['job_data'] = $this->CM->get_join($sql);
	$this->load->admin_temp('job_list',$data);
	}
}
public function job_create(){
	$data['page']="page";
	$emp_info = $this->session->userdata('emp_data');
	$emp_id = $emp_info->emp_id;
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$job_desc = $_POST['job_desc'];
		$batch_id = $_POST['batch_id'];
		$data = array(
			"job_title"=>$title,
			"job_description"=>$job_desc,
			"batch_id"=>$batch_id,
			"created_by"=>$emp_id,
			"status"=>1
		);
		$table_name = "tc_job_updates";
		$redirect = "Job-Updates-List?id=".$batch_id;
		$this->CM->save($data,$table_name,$redirect);
	}
	$this->load->admin_temp('job_create',$data);
}
public function job_edit(){
	if(isset($_GET['id'])){
		$job_id = $_GET['id'];
		$table_name = "tc_job_updates";
		$where = array(
			"job_id"=>$job_id
		);
		$data['job_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		$data['job_data'] = $data['job_data'][0];
	}
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$job_desc = $_POST['job_desc'];
		$batch_id = $_POST['batch_id'];
		$job_id = $_POST['job_id'];
		$data = array(
			"job_title"=>$title,
			"job_description"=>$job_desc,
		);
		$table_name = "tc_job_updates";
		$redirect = "Job-Updates-List?id=".$batch_id;
		$where = array(
			"job_id"=>$job_id
		);
		$this->CM->update($data,$table_name,$where,$redirect);
	}
	$this->load->admin_temp('job_edit',$data);
}
}