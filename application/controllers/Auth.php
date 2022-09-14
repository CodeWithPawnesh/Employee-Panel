<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
		function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('cookie');
        $this->load->model('Auth_model', 'AM');
    }
    public function login()
	{
        $data['tcn'] = '';
        $data['tcp'] = '';
        if(get_cookie('_tc') != null){
            $temp = explode("######", base64_decode(get_cookie('_tc')));
            $data['tcn'] = $temp[0];
            $data['tcp'] = $temp[1];
        }
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $o_pass = md5($password);
            $data = array(
                "email"=>$email,
                "password"=>$password,
                "password_o"=>$o_pass
            );
            $result = $this->AM->auth_login($data);
            if ($result !== false) {
                set_cookie('_hnp', base64_encode($data['email'] .'######' . $this->input->post('password')), time()+24*3600*30);
                $this->session->set_userdata('user_data', $result);
                $this->session->set_userdata('login_status', 1);
                redirect('admin');
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('pages/erp_login', $data);
            }
        }
	}
}