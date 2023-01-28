<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status')  ) {
			redirect('login');
		}
    }

	public function index()
	{
        $data['page']="";
        $table_name = "tc_certificate_template";
        $data['certificate_data'] = $this->CM->get($table_name);
		$this->load->admin_temp('certificate',$data);
	}
    public function view()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table_name = "tc_certificate_template";
            $where = array("cer_temp_id"=>$id);
            $data['certificate_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['certificate_data'] = $data['certificate_data'][0];
            $this->load->view("pages/certificate_view",$data);
        }
    }
    public function edit(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $table_name = "tc_certificate_template";
            $where = array("cer_temp_id"=>$id);
            $data['certificate_data'] = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['certificate_data'] = $data['certificate_data'][0];
        }
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $line1 = $_POST['line1'];
            $line2 = $_POST['line2'];
            $line3 = $_POST['line3'];
            if($_FILES['image']['size']>0)
			{
				$config['upload_path'] = './assets/images/certificate/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('image'))
				{
				$uploaddata=$this->upload->data();
				$image =  $uploaddata['file_name'];
				}
		    }else{
                $image = $_POST['h_image'];
            }
            $data = array(
                "line1"=>$line1,
                "line2"=>$line2,
                "line3"=>$line3,
                "certificate_image"=>$image
            );
            $table_name="tc_certificate_template";
            $where = array("cer_temp_id"=>$id);
            $redirect = "Certificate";
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        $this->load->admin_temp("certificate_edit",$data);
    }
    public function student_certificate(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $course_id = $_GET['course_id'];
            $batch_id = $_GET['batch_id'];
            $sql = "SELECT s.student_name,c.course_name,b.batch_start_date,b.batch_end_date,ct.*,ce.created_at,ce.certificate_number FROM tc_certificate AS ce, tc_certificate_template AS ct, tc_student AS s,
            tc_course AS c, tc_batch AS b WHERE s.student_id = $id AND c.course_id = $course_id AND ce.cer_temp_id = ct.cer_temp_id AND ce.student_id
            = $id AND ce.course_id = $course_id AND ce.batch_id = $batch_id AND b.batch_id = $batch_id AND ce.batch_id = b.batch_id AND 
            ce.course_id = c.course_id ";
            $data['certificate_data'] = $this->CM->get_join($sql);
            $data['certificate_data'] = $data['certificate_data'][0];
            $this->load->view("pages/certificate_student_view",$data);
        }
    }
}
