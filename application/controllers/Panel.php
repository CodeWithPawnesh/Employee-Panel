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
}