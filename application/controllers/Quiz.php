<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
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
        if(isset($_GET['page'])){
			$page_no = $_GET['page']; 
		}else{
			$page_no = 1;
		}
		$order_by = "quiz_id";
		$table_name="tc_quiz";
		$limit = 10;
		$offset = ($page_no-1) * $limit;
        if($user_info->access_level == 0){
		$row = $this->CM->get_row($table_name);
		$data['total_pages'] = ceil($row/$limit);
        $sql = "SELECT q.*, c.course_name, b.batch_name, b.batch_number, g.group_name, g.group_number FROM tc_quiz as q, tc_batch as b,
         tc_course AS c, tc_batch_group as g WHERE b.course_id = c.course_id AND q.quiz_batch_id = b.batch_id AND g.group_id = q.quiz_group_id";
        $group_quiz = $this->CM->get_join($sql);
        $sql = "SELECT q.*, c.course_name, b.batch_name, b.batch_number FROM tc_quiz as q, tc_batch as b,
             tc_course AS c WHERE b.course_id = c.course_id AND q.quiz_batch_id = b.batch_id AND q.quiz_group_id= '0'";
        $batch_quiz = $this->CM->get_join($sql);
        $quiz_data = "";
		if(!empty($batch_quiz) && !empty($group_quiz)){
		$quiz_data = array_merge($batch_quiz,$group_quiz);
		}
		if(empty($batch_quiz) && !empty($group_quiz)){
			$quiz_data = $group_quiz;
		}
		if(!empty($batch_quiz) && empty($group_quiz)){
			$quiz_data = $batch_quiz;
		}
		if(!empty($quiz_data)){
		function date_compare($element1, $element2) {
			$datetime1 = $element1['quiz_start_date'];
			$datetime2 = $element2['quiz_start_date'];
			   return $datetime1 - $datetime2;
			   } 
	  
			// Sort the array 
		   usort($quiz_data, 'date_compare');
			}

		   $data['quiz_data'] = $quiz_data;
        }
        if($user_info->access_level == 1){
            $sql = "SELECT q.*, c.course_name, b.batch_name, b.batch_number FROM tc_quiz as q, tc_batch as b,
             tc_course AS c WHERE b.course_id = c.course_id AND q.quiz_batch_id = b.batch_id AND q.quiz_group_id= '0' AND b.emp_id = $emp_id";
            $data['quiz_data'] = $this->CM->get_join($sql);
            $row = $this->CM->get_join_row($sql);
            $data['total_pages'] = ceil($row/$limit);
            }
            if($user_info->access_level == 2){
                $sql = "SELECT q.*, c.course_name, b.batch_name, b.batch_number, g.group_name, g.group_number FROM tc_quiz as q, tc_batch as b,
                 tc_course AS c, tc_batch_group as g WHERE b.course_id = c.course_id AND q.quiz_batch_id = b.batch_id AND g.group_id = q.quiz_group_id AND g.emp_id = $emp_id";
                $data['quiz_data'] = $this->CM->get_join($sql);
                $row = $this->CM->get_join_row($sql);
                $data['total_pages'] = ceil($row/$limit);
                }
		$this->load->admin_temp('quiz_list',$data);
	}
    public function quiz_create(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        if($user_info->access_level == 0){
		if(isset($_POST['submit'])){
			$course = $_POST['course_id'];
			$batch = $_POST['batch_id'];
            if($_POST['type']==1){
			$group = $_POST['group'];
            }else{
                $group = 0;
            }
			$quiz_title = $_POST['quiz_title'];
            $quiz_duration = $_POST['duration'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$created_at = time();

			$data = array(
				"quiz_batch_id"=>$batch,
				"quiz_group_id"=>$group,
				"quiz_start_date"=>$start_date,
				"quiz_end_date"=>$end_date,
                "quiz_duration"=>$quiz_duration,
				"quiz_title"=>$quiz_title,
				"created_at"=>$created_at,
				"status"=>'1'
			);
			$table_name = "tc_quiz";
			$redirect = "Quiz";
			$this->CM->save($data,$table_name,$redirect);
		}
    }
    if($user_info->access_level==1){
        $table_name = "tc_batch";
        $select = "batch_id,batch_name,batch_number";
        $where = array(
            "emp_id"=> $emp_id
        );
        $data['batch_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
            if(isset($_POST['submit'])){
                $batch = $_POST['batch'];
                $quiz_title = $_POST['quiz_title'];
                $quiz_duration = $_POST['duration'];
                $start_date = $_POST['start_date'];
                $start_date = strtotime($start_date);
                $end_date = $_POST['end_date'];
                $end_date = strtotime($end_date);
                $created_at = time();
    
                $data = array(
                    "quiz_batch_id"=>$batch,
                    "quiz_group_id"=>"0",
                    "quiz_start_date"=>$start_date,
                    "quiz_end_date"=>$end_date,
                    "quiz_duration"=>$quiz_duration,
                    "quiz_title"=>$quiz_title,
                    "created_at"=>$created_at,
                    "status"=>'1'
                );
                $table_name = "tc_quiz";
                $redirect = "Quiz";
                $this->CM->save($data,$table_name,$redirect);
            }
    }
    if($user_info->access_level==2){
        $table_name = "tc_batch_group";
        $select = "group_id,batch_id,group_name,group_number";
        $where = array(
            "emp_id"=> $emp_id
        );
        $data['group_data']= $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select,$join=Null);
        if(isset($_POST['submit'])){
			$group_batch = $_POST['group_batch'];
			$group_batch = explode(",",$group_batch);
			$group = $group_batch[0];
			$batch = $group_batch[1];
			$quiz_title = $_POST['quiz_title'];
            $quiz_duration = $_POST['duration'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$created_at = time();
            $created_by = $emp_id;

			$data = array(
				"quiz_batch_id"=>$batch,
				"quiz_group_id"=>$group,
				"quiz_start_date"=>$start_date,
				"quiz_end_date"=>$end_date,
                "quiz_duration"=>$quiz_duration,
				"quiz_title"=>$quiz_title,
				"created_at"=>$created_at,
                "created_by"=>$created_by,
				"status"=>'1'
			);
			$table_name = "tc_quiz";
			$redirect = "Quiz";
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
        $this->load->admin_temp('quiz_create',$data);
    }
    public function quiz_edit(){
        if(isset($_GET['id'])){
            $quiz_id= $_GET['id'];
            $table_name = "tc_quiz";
            $where = "quiz_id = ".$quiz_id;
            $quiz = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $data['quiz_data'] = $quiz[0];
        }
        if(isset($_POST['submit'])){
			$quiz_title = $_POST['quiz_title'];
            $duration = $_POST['duration'];
			$start_date = $_POST['start_date'];
			$start_date = strtotime($start_date);
			$end_date = $_POST['end_date'];
			$end_date = strtotime($end_date);
			$quiz_id = $_POST['quiz_id'];
			$data = array(
                "quiz_title"=>$quiz_title,
                "quiz_duration"=>$duration,
				"quiz_start_date"=>$start_date,
				"quiz_end_date"=>$end_date
			);

			$table_name = "tc_quiz";
			$redirect = "Quiz";
			$where = "quiz_id = ".$quiz_id ;
			$this->CM->update($data,$table_name,$where,$redirect);
		}
        $this->load->admin_temp('quiz_edit',$data);
    }
    public function quiz_question_list(){
        if(isset($_GET['id'])){
            $quiz_id = $_GET['id'];
        $sql = "SELECT qu.*, qz.quiz_title,qm.qq_id FROM tc_quiz_question AS qu, tc_q_q_map as qm, tc_quiz AS qz WHERE qm.question_id = qu.question_id AND qm.quiz_id = $quiz_id AND qz.quiz_id = $quiz_id ";
        $data["quiz_question"] = $this->CM->get_join($sql);
        }
        if(isset($_GET['delete_id']) && $_GET['quiz_id']){
			$qq_id = $_GET['delete_id'];
            $quiz_id = $_GET['quiz_id'];
			$table_name = "tc_q_q_map";
			$where = array(
				"qq_id"=>$qq_id
			);
			$redirect = "Quiz-Questions-List?id=".$quiz_id;
			$this->CM->delete($table_name,$where,$redirect);
		}
        $this->load->admin_temp('quiz_question_list',$data);
    }
    public function quiz_question_create(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        if(isset($_POST['submit'])){
            $question_text = $_POST['question_text'];
            $no_of_options = $_POST['no_of_options'];
            $option_1 = $_POST['option_1'];
            $option_2 = $_POST['option_2'];
            $option_3 = $_POST['option_3'];
            $option_4 = $_POST['option_4'];
            $correct_option = $_POST['correct_option'];
            $marks = $_POST['marks'];
            $quiz_id = $_POST['quiz_id'];

            $data = array(
                "question_text"=>$question_text,
                "no_of_options"=>$no_of_options,
                "option_1"=>$option_1,
                "option_2"=>$option_2,
                "option_3"=>$option_3,
                "option_4"=>$option_4,
                "correct_options"=>$correct_option,
                "marks"=>$marks,
                "status"=>1
            );
            $mm_data = array(
                "quiz_id"=>$quiz_id,
                "add_by"=>$emp_id,
                "status"=>1
            );
            $this->CM->insert_question($data,$mm_data,$quiz_id);
        }
        $data["page"]="Quiz-Question-Create";
        $this->load->admin_temp('quiz_question_create',$data);
    }
    public function quiz_question_edit(){
        if(isset($_POST['submit'])){
            if(isset($_POST['quiz_id'])){
            $quiz_id = $_POST['quiz_id'];
            }
            $question_text = $_POST['question_text'];
            $option_1 = $_POST['option_1'];
            $option_2 = $_POST['option_2'];
            if($_POST['option_3']){
            $option_3 = $_POST['option_3'];
            }
            if($_POST['option_4']){
            $option_4 = $_POST['option_4'];
            }
            $correct_option = $_POST['correct_option'];
            $marks = $_POST['marks'];
            $q_id = $_POST['q_id'];

            $data = array(
                "question_text"=>$question_text,
                "option_1"=>$option_1,
                "option_2"=>$option_2,
                "option_3"=>$option_3,
                "option_4"=>$option_4,
                "correct_options"=>$correct_option,
                "marks"=>$marks
            );
            $table_name = "tc_quiz_question";
            $where = "question_id = ".$q_id;
            if(isset($_POST['quiz_id'])){
            $redirect = "Quiz-Questions-List?id=".$quiz_id;
            }else{
                $redirect = "Quiz-Question-Bank";
            }
            $this->CM->update($data,$table_name,$where,$redirect);
        }
        if(isset($_GET['id'])){
            $q_id = $_GET['id'];
            $table_name = "tc_quiz_question";
            $where = "question_id = ".$q_id;
            $question_data = $this->CM->get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where,$select=Null,$join=Null);
            $question_data =$question_data[0];
            $data['question_data']= $question_data;
        }
        $this->load->admin_temp('quiz_question_edit',$data);
    }
    public function quiz_question_bank(){
        $user_info = $this->session->userdata('user_data');
		$emp_data = $this->session->userdata('emp_data');
		$user_id = $user_info->id;
		$emp_id = $emp_data->emp_id;
        $sql = "SELECT * FROM tc_quiz_question ORDER BY question_id DESC";
        $data['bank_question'] = $this->CM->get_join($sql);
        if(isset($_POST['submit'])){
            $q_ids = $_POST['q_id'];
            $quiz_id = $_POST['quiz_id'];
            $this->CM->insert_quiz_question_f_bank($q_ids,$quiz_id,$emp_id);
        }
        if(isset($_GET['delete_id'])){
			$q_id = $_GET['delete_id'];
			$table_name = "tc_quiz_question";
			$where = array(
				"question_id"=>$q_id
			);
			$redirect = "Quiz-Question-Bank";
			$this->CM->delete($table_name,$where,$redirect);
		}
        $this->load->admin_temp('quiz_question_bank',$data);
    }
}
