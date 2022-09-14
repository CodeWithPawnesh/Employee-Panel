<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
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
		$this->load->admin_temp('course_create');
	}
	public function course_edit(){
		$this->load->admin_temp('course_edit');
	}
	public function testimonial_create(){

		$this->load->admin_temp('testimonial_create');
		
	}
}
