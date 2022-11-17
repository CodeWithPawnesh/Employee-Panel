<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status')) {
			redirect('');
		}
    }
    public function profile(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        $table_name = "tc_employee";
        $where=array(
            "emp_id"=>$emp_id
        );
        $data['employee_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
        $data['employee_data'] = $data['employee_data'][0];
        $data['page']="profile";
        $this->load->admin_temp('profile',$data);
    }
    public function profile_edit(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        $table_name = "tc_employee";
        $where=array(
            "emp_id"=>$emp_id
        );
        $data['employee_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
        $data['employee_data'] = $data['employee_data'][0];
        if(isset($_POST['submit'])){
        $live_link = $_POST['live_link'];
        
        $name = $_POST['name'];
        $education = $_POST['education'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $emp_id = $_POST['emp_id'];
        $data = array(
            "live_link"=>$live_link,
            "emp_name"=>$name,
            "email"=>$email,
            "phone"=>$number,
            "education"=>$education,
            "address"=>$address
        );
        $where = array(
            "emp_id"=>$emp_id
        );
        $table_name="tc_employee";
        $redirect="Profile";
        $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp('profile_edit',$data);
    }
    public function leave_list(){
        $user_info = $this->session->userdata('user_data');
        $user_id = $user_info->id;
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$table_name="tc_leave";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        $where = array(
            "user_id"=>$user_id
        );
		$row = $this->CM->get_row($table_name,$where);
        $data['total_pages'] = ceil($row/$limit);
        $order_by= "id";
        $data['leave_data']=$this->CM->get($table_name,$limit,$offset,$order_by);
        $this->load->admin_temp('leave_list',$data);
    }
    public function create_leave(){
        $user_info = $this->session->userdata('user_data');
        $user_id = $user_info->id;
        $data['page']="leave";
        if(isset($_POST['submit'])){
            $start_date = $_POST['start_date'];
            $start_date = strtotime($start_date);
            $reason = $_POST['reason'];
            if(isset($_POST['end_date'])){
                $end_date = $_POST['end_date'];
                $end_date = strtotime($_POST['end_date']);
            }
            else{
                $end_date="";
            }
            $data = array(
                "leave_start_date"=>$start_date,
                "leave_end_date"=>$end_date,
                "reason"=>$reason,
                "status"=>'0',
                "user_id"=>$user_id,
                "user"=>'1'
            );
            $table_name="tc_leave";
            $redirect ="Leave";
            $this->CM->save($data,$table_name,$redirect);
        }
        $this->load->admin_temp('leave',$data);
    }
    public function student_list(){
        if(isset($_GET['page'])){
            $page_no = $_GET['page']; 
        }else{
            $page_no = 1;
        }
        $table_name="tc_student";
        $limit = 10;
        $offset = ($page_no-1) * $limit; 
        $row = $this->CM->get_row($table_name);
        $data['total_pages'] = ceil($row/$limit);
        if(!isset($_GET['batch_id']) && !isset($_GET['group_id']) ){
        $sql = "SELECT s.*, c.course_name,b.batch_name,g.group_name FROM tc_student as s, tc_batch as b, tc_batch_group as g,
         tc_course as c WHERE s.batch_id = b.batch_id AND g.group_id = s.group_id AND c.course_id = s.course_id ORDER BY student_id DESC";
        }
        if(isset($_GET['batch_id'])){
            $batch_id =$_GET["batch_id"];
            $sql = "SELECT s.*, c.course_name,b.batch_name,g.group_name FROM tc_student as s, tc_batch as b, tc_batch_group as g,
             tc_course as c WHERE s.batch_id = $batch_id AND s.batch_id = b.batch_id AND c.course_id = s.course_id AND g.group_id = s.group_id  ORDER BY student_id DESC";
            }
            if(isset($_GET['group_id'])){
                $group_id = $_GET['group_id'];
                $sql = "SELECT s.*, c.course_name,b.batch_name,g.group_name FROM tc_student as s, tc_batch as b, tc_batch_group as g,
                 tc_course as c WHERE s.batch_id = b.batch_id AND s.group_id= $group_id AND g.group_id = s.group_id AND c.course_id = s.course_id ORDER BY student_id DESC";
                }
        $data['student_data'] = $this->CM->get_join($sql);

        $this->load->admin_temp('student_list',$data);
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
            $pass = $student_name.$str;
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
                "course_id"=>$course_id,
                "batch_id"=>$batch_id,
                "group_id"=>$group_id,  
                "status"=>1   
            );
            $this->CM->add_student($login_data,$student_data);
        }
        $this->load->admin_temp('add_student',$data);
    }
    public function employee_list(){
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
        $sql ="SELECT e.*, u.password, c.course_name FROM tc_employee as e, tc_course as c, tc_login as u WHERE c.course_id = e.course_id AND u.id = e.user_id LIMIT $limit OFFSET $offset";
        $data['emp_data'] = $this->CM->get_join($sql);
        $this->load->admin_temp('employee_list',$data);
    }
    public function add_employee(){
        $data['page']="";
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
            $course_id = $_POST['course'];
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
                "course_id"=>$course_id,
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
    public function class_history(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        if(isset($_GET['class_id'])){
            $class_id = $_GET['class_id'];
            $data['class_data']= $this->CM->get_class_data($class_id);

        }
        $this->load->admin_temp('class_history',$data); 
    }
}