<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programing_module extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('crud_model','CM');
        $user_info = $this->session->userdata('user_data');
        if (!$this->session->userdata('login_status')) {
			redirect('login');
		}
    }
	public function index()
	{
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        if(isset($_GET['id']) && isset($_GET['status']) ){
			$id = $_GET['id'];
			$status =$_GET['status'];
			$table_name = "tc_programing_quiz";
			$data = array(
				"status"=>$status
			);
			$where = array(
				"pq_id"=>$id
			);
			$this->CM->update($data,$table_name,$where);
		}
        if($user_info->access_level == 0){
        $sql = "SELECT qq.*, c.course_name, c.course_id, b.batch_name, b.batch_number, g.group_name, g.group_number FROM
                 tc_programing_quiz AS qq 
                 LEFT JOIN tc_course AS c ON qq.course_id = c.course_id
                 LEFT JOIN tc_batch AS b ON qq.batch_id = b.batch_id
                 LEFT JOIN tc_batch_group AS g ON g.group_id = qq.group_id ORDER BY qq.pq_id DESC";
        $p_quiz_data = $this->CM->get_join($sql);
        // $sql = "SELECT q.*, c.course_name, b.batch_name, b.batch_number FROM tc_quiz as q, tc_batch as b,
        //      tc_course AS c WHERE b.course_id = c.course_id AND q.quiz_batch_id = b.batch_id AND q.quiz_group_id= '0'";
        // $batch_p_quiz = $this->CM->get_join($sql);
        // $p_quiz_data = "";
		// if(!empty($batch_p_quiz) && !empty($group_p_quiz)){
		// $quiz_data = array_merge($batch_p_quiz,$group_p_quiz);
		// }
		// if(empty($batch_p_quiz) && !empty($group_p_quiz)){
		// 	$quiz_data = $group_p_quiz;
		// }
		// if(!empty($batch_p_quiz) && empty($group_p_quiz)){
		// 	$p_quiz_data = $batch_p_quiz;
		// }
		// if(!empty($p_quiz_data)){
		// function date_compare($element1, $element2) {
		// 	$datetime1 = $element1['created_at'];
		// 	$datetime2 = $element2['created_at'];
		// 	   return $datetime1 - $datetime2;
		// 	   } 
	  
		// 	// Sort the array 
		//    usort($quiz_data, 'date_compare');
		// 	}

		   $data['p_quiz_data'] = $p_quiz_data;
        }
        if($user_info->access_level == 1){
            $sql = "SELECT qq.*, c.course_name, c.course_id, b.batch_name, b.batch_number FROM
            tc_programing_quiz AS qq 
            LEFT JOIN tc_course AS c ON qq.course_id = c.course_id
            LEFT JOIN tc_batch AS b ON qq.batch_id = b.batch_id
            WHERE qq.group_id =0 AND b.emp_id = $emp_id ORDER BY qq.pq_id DESC";
            $data['p_quiz_data'] = $this->CM->get_join($sql);
            }
            if($user_info->access_level == 2){
                $sql = "SELECT qq.*, c.course_name, c.course_id, b.batch_name, b.batch_number, g.group_name, g.group_number FROM
                tc_programing_quiz AS qq 
                LEFT JOIN tc_course AS c ON qq.course_id = c.course_id
                LEFT JOIN tc_batch AS b ON qq.batch_id = b.batch_id
                LEFT JOIN tc_batch_group AS g ON g.group_id = qq.group_id
                WHERE qq.group_id !=0 AND g.emp_id = $emp_id ORDER BY qq.pq_id DESC";
                 $data['p_quiz_data'] = $this->CM->get_join($sql);
                }
		$this->load->admin_temp('programing_quiz_list',$data);
	}
    public function create(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        if($user_info->access_level == 0){
		if(isset($_POST['submit'])){
            $type = $_POST['type'];
			$course = $_POST['course_id'];
			$batch = $_POST['batch_id'];
            if($_POST['type']==1){
			$group = $_POST['group'];
            }else{
                $group = 0;
            }
			$pq_name = $_POST['pq_name'];
			$data = array(
                "type"=>$type,
                "course_id"=>$course,
                "group_id"=>$group,
                "batch_id"=>$batch,
                "pq_name"=>$pq_name,
				"status"=>'1'
			);
			$table_name = "tc_programing_quiz";
			$redirect = "Programing-Quiz";
			$this->CM->save($data,$table_name,$redirect);
		}
    }
    if($user_info->access_level==1){
        $table_name = "tc_batch";
        $select = "batch_id,batch_name,batch_number";
        $where = array(
            "emp_id"=> $emp_id
        );
        $sql = "SELECT b.batch_id, b.batch_name,c.course_id, c.course_name
                FROM tc_batch AS b, tc_course AS c WHERE b.emp_id = $emp_id AND b.course_id = c.course_id";
        $data['batch_data']= $this->CM->get_join($sql);
            if(isset($_POST['submit'])){
                $batch_data = explode(",",$_POST['batch']);
                $batch_id = $batch_data[0];
                $course_id = $batch_data[1];
                $pq_name = $_POST['pq_name'];
                $type = "1";
                $data = array(
                    "type"=>$type,
                    "course_id"=>$course_id,
                    "group_id"=>"0",
                    "batch_id"=>$batch_id,
                    "pq_name"=>$pq_name,
                    "status"=>'1'
                );
                $table_name = "tc_programing_quiz";
                $redirect = "Programing-Quiz";
                $this->CM->save($data,$table_name,$redirect);
            }
    }
    if($user_info->access_level==2){
        $table_name = "tc_batch_group";
        $sql = "SELECT g.group_id,g.batch_id,g.group_name,b.batch_name,b.batch_id,c.course_name,c.course_id
                FROM tc_batch_group AS g, tc_batch AS b, tc_course AS c
                WHERE g.emp_id = $emp_id AND g.batch_id = b.batch_id AND b.course_id = c.course_id ";
        $data['group_data']= $this->CM->get_join($sql);
        if(isset($_POST['submit'])){
			$group_data = explode(",",$_POST['group_batch']);
                $group_id = $group_data[0];
                $batch_id = $group_data[1];
                $course_id = $group_data[2];
                $pq_name = $_POST['pq_name'];
                $type = "2";
                $data = array(
                    "type"=>$type,
                    "course_id"=>$course_id,
                    "group_id"=>$group_id,
                    "batch_id"=>$batch_id,
                    "pq_name"=>$pq_name,
                    "status"=>'1'
                );
                $table_name = "tc_programing_quiz";
                $redirect = "Programing-Quiz";
                $this->CM->save($data,$table_name,$redirect);
		}
       }
		if(isset($_POST['course_id']))
		{
			$course_id = $_POST['course_id'];
			
			$table_name = "tc_batch";
			$where = "course_id =".$course_id;	
			$data['batch_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		}
		if(isset($_POST['batch_id']))
		{
			$course_id = $_POST['course_id'];
			$batch_id = $_POST['batch_id'];
			
			$table_name = "tc_batch_group";
			$where = "batch_id =".$batch_id;	
			$data['group_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
		}
		$table_name = "tc_course";
		$data['course_data']=$this->CM->get($table_name);
        $this->load->admin_temp('programing_quiz_create',$data);
    }
    public function programing_quiz_edit(){
        if(isset($_GET['id'])){
            $p_quiz_id= $_GET['id'];
            $table_name = "tc_programing_quiz";
            $where = "pq_id = ".$p_quiz_id;
            $quiz = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['p_quiz_data'] = $quiz[0];
        } 
        if(isset($_POST['submit'])){
			$pq_name = $_POST['pq_name'];
            $p_quiz_id =$_POST['p_quiz_id'];
			$data = array(
                "pq_name"=>$pq_name,
			);

			$table_name = "tc_programing_quiz";
			$redirect = "Programing-Quiz";
			$where = "pq_id = ".$p_quiz_id ;
			$this->CM->update($data,$table_name,$where,$redirect);
		}
        $this->load->admin_temp('programing_quiz_edit',$data);
    }
    public function challenge_list(){
        if(isset($_GET['id'])){
            $p_quiz_id = $_GET['id'];
        $sql = "SELECT cb.*, pq_name, cm.pc_map_id FROM tc_challenge_bank AS cb, tc_pc_map as cm, tc_programing_quiz AS pq
                WHERE pq.pq_id = $p_quiz_id AND pq.pq_id = cm.pq_id AND cb.ch_id = cm.ch_id ORDER BY cb.ch_id DESC ";
        $data["challenge_data"] = $this->CM->get_join($sql);
        }
        if(isset($_GET['delete_id']) && $_GET['p_quiz_id']){
			$pc_map_id = $_GET['delete_id'];
            $p_quiz_id = $_GET['p_quiz_id'];
            $c_id = $_GET['c'];
			$table_name = "tc_pc_map";
			$where = array(
				"pc_map_id"=>$pc_map_id
			);
			$redirect = "Challenge-List?id=".$p_quiz_id."&c=".$c_id;
			$this->CM->delete($table_name,$where,$redirect);
		}
        $this->load->admin_temp('challenge_list',$data);
    }
    public function challenge_create(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        $table_name = "tc_course";
        $data['course_data'] = $this->CM->get($table_name);
        // Challenge Add to Prog Quiz And Bank
        if(isset($_POST['submit'])){
            $challenge_name= $_POST['challenge_name'];
            $challenge_text = $_POST['challenge_text'];
            $code_text = $_POST['code_text'];
            $challenge_output = $_POST['challenge_output'];
            $marks = $_POST['marks'];
            $p_quiz_id = $_POST['p_quiz_id'];
            $course_id = $_POST['course_id'];

            $data = array(
                "challenge_name"=>$challenge_name,
                "course_id"=>$course_id,
                "challenge_text"=>$challenge_text,
                "challenge_prog_text"=>$code_text,
                "challenge_output"=>$challenge_output,
                "marks"=>$marks,
                "status"=>1
            );
            $mm_data = array(
                "pq_id	"=>$p_quiz_id,
                "added_by"=>$emp_id,
                "status"=>1
            );
            $this->CM->insert_challenge($data,$mm_data,$p_quiz_id,$course_id);
        }
        // Challenge Add to Bank
        if(isset($_POST['b_submit'])){
            $challenge_name= $_POST['challenge_name'];
            $challenge_text = $_POST['challenge_text'];
            $code_text = $_POST['code_text'];
            $challenge_output = $_POST['challenge_output'];
            $marks = $_POST['marks'];
            $p_quiz_id = $_POST['p_quiz_id'];
            $course_id = $_POST['course_id'];

            $data = array(
                "challenge_name"=>$challenge_name,
                "course_id"=>$course_id,
                "challenge_text"=>$challenge_text,
                "challenge_prog_text"=>$code_text,
                "challenge_output"=>$challenge_output,
                "marks"=>$marks,
                "status"=>1
            );
            $table_name ="tc_challenge_bank";
            $redirect = "Challenge-Bank";
            $this->CM->save($data,$table_name,$redirect);
        }
        $data["page"]="Challenge-Create";
        $this->load->admin_temp('challenge_create',$data);
    }
    public function challenge_edit(){
        if(isset($_POST['submit'])){
            $p_quiz_id = $_POST['p_quiz_id'];
            $course_id = $_POST['course_id'];
            $ch_id = $_POST['ch_id'];
            $challenge_name = $_POST['challenge_name'];
            $challenge_text = $_POST['challenge_text'];
            $code_text = $_POST['code_text'];
            $challenge_output = $_POST['challenge_output'];
            $marks = $_POST['marks'];
            $data = array(
                "challenge_name"=>$challenge_name,
                "challenge_text"=>$challenge_text,
                "challenge_prog_text"=>$code_text,
                "challenge_output"=>$challenge_output,
                "marks"=>$marks
            );
            $table_name = "tc_challenge_bank";
            $where = "ch_id = ".$ch_id;
            if(isset($_GET['id'])){
            $redirect = "Challenge-List?id=".$p_quiz_id."&c=".$course_id;
            }else{
                $redirect = "Challenge-Bank";
            }
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        if(isset($_GET['ch_id'])){
            $ch_id = $_GET['ch_id'];
            $table_name = "tc_challenge_bank";
            $where = "ch_id = ".$ch_id;
            $challenge_data = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $challenge_data =$challenge_data[0];
            $data['challenge_data']= $challenge_data;
        }
        $this->load->admin_temp('challenge_edit',$data);
    }
    public function challenge_bank(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        if(!isset($_GET['section'])){
        if($user_info->access_level==0){
        $sql = "SELECT b.*,c.course_name FROM tc_challenge_bank AS b, tc_course AS c WHERE b.course_id = c.course_id ORDER BY ch_id DESC";
        $data['challenge_bank'] = $this->CM->get_join($sql);
        }
        if($user_info->access_level==1 && $user_info->access_level==2 ){
            $sql = "SELECT b.*,c.course_name FROM tc_challenge_bank AS b, tc_course AS c WHERE b.course_id = c.course_id ORDER BY ch_id DESC";
            $data['challenge_bank'] = $this->CM->get_join($sql);
        }
        }
        if(isset($_GET['section'])){
            $course_id = $_GET['c'];
            $sql = "SELECT b.*,c.course_name FROM 
            tc_challenge_bank AS b, tc_course AS c 
            WHERE b.course_id = c.course_id AND b.course_id = $course_id ORDER BY ch_id DESC";
            $data['challenge_bank'] = $this->CM->get_join($sql);
        }

        if(isset($_POST['submit'])){
            $c_id = $_POST['c_id'];
            $ch_ids = $_POST['ch_ids'];
            $p_quiz_id = $_POST['p_quiz_id'];
            $this->CM->insert_challenge_f_bank($ch_ids,$p_quiz_id,$emp_id,$c_id);
        }
        if(isset($_GET['delete_id'])){
			$ch_id = $_GET['delete_id'];
			$table_name = "tc_challenge_bank";
			$where = array(
				"ch_id"=>$ch_id
			);
			$redirect = "Challenge-Bank";
			$this->CM->delete($table_name,$where,$redirect);
		}
        $this->load->admin_temp('challenge_bank',$data);
    }
}