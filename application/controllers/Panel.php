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
        $sql = "SELECT student_name, email, phone, student_id, status FROM tc_student WHERE  student_id  ORDER BY student_id DESC";
        }
        if(isset($_GET['batch_id'])){
            $batch_id =$_GET["batch_id"];
            $sql = "SELECT s.*, c.course_name,b.batch_name,g.group_name FROM tc_student as s, tc_batch as b, tc_batch_group as g,
             tc_course as c, tc_enrollment as en WHERE en.batch_id = $batch_id AND en.batch_id = b.batch_id AND c.course_id = en.course_id AND g.group_id = en.group_id  ORDER BY student_id DESC";
            }
            if(isset($_GET['group_id'])){
                $group_id = $_GET['group_id'];
                $sql = "SELECT s.*, c.course_name,b.batch_name,g.group_name FROM tc_student as s, tc_batch as b, tc_batch_group as g,
                 tc_course as c, tc_enrollment as en WHERE en.batch_id = b.batch_id AND en.group_id= $group_id AND g.group_id = en.group_id AND c.course_id = en.course_id ORDER BY student_id DESC";
                }
        $data['student_data'] = $this->CM->get_join($sql);
        if(isset($_GET['delete_student'])){
            $student_id = $_GET['delete_student'];
            $sql = "SELECT user_id FROM tc_student WHERE student_id = $student_id";
            $user_id = $this->CM->get_join($sql);
            $user_id = $user_id[0]['user_id'];
            $redirect = "Student-List";
            $this->CM->delete_all_student($student_id,$user_id,$redirect);
        }

        $this->load->admin_temp('student_list',$data);
    }
    public function class_history(){
        $emp_info = $this->session->userdata('emp_data');
        $emp_id = $emp_info->emp_id;
        $emp_role = $emp_info->role;
        if(isset($_GET['class_id'])){
            $class_id = $_GET['class_id'];
            $data['class_data']= $this->CM->get_class_data($class_id,$emp_role);
        }
        $this->load->admin_temp('class_history',$data); 
    }
}