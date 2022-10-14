<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
    }
    public function teacher_dashboard(){
        $data['page_name']="Dashboard";
		$this->load->admin_temp('teacher_dashboard',$data);
    }
}