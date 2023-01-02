<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class crud_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form','url');
        $this->load->library('email');
    }
    function save($data,$table_name,$redirect=Null){
        $query = $this->db->insert($table_name, $data);
        if($query)
        {
            $this->session->set_flashdata('isuccMess', 'Record Insert Succesfully');
            if($redirect!=Null){
            redirect($redirect);
            }else{
                return true;
            }
        }
    }
    function update($data,$table_name,$where,$redirect=NULL){
        $this->db->where($where);
        $query = $this->db->update($table_name, $data);
        if($query && $redirect!=NULL){
            $this->session->set_flashdata('usuccMess', 'Record Updated Succesfully');
            redirect($redirect);
        }
    }
    function update_in($data,$table_name,$where,$redirect=Null,$where_in_column){
        $this->db->where_in("$where_in_column",$where);
        $query = $this->db->update($table_name, $data);
        if($query && $redirect!=NULL){
            $this->session->set_flashdata('succMess', 'Record Updated Succesfully');
            redirect($redirect);
        }
    }
    function get($table_name,$limit=Null,$offset=Null,$order_by=Null,$where=Null,$select=Null,$join=Null){
            if($select!==Null)
            {
            $this->db->select($select);
            }
            if($join!==Null){
                $this->db->join($join);
            }
            if($order_by!==Null){
            $this->db->order_by($order_by, 'DESC');
            }
            if($offset!==Null || $limit!==Null){
            $this->db->limit($limit,$offset);
            }
            if($where!==Null)
            {
            $this->db->where($where);
            }
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    function get_row($table_name,$where=Null){
            if($where!==Null)
            {
            $this->db->where($where);
            }
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
    }
    function get_join($sql){
        $my_sql = "$sql";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function get_join_row($sql){
        $my_sql = "$sql";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return false;
        }
    }
    function delete($table_name,$where,$redirect){
        $this->db->where($where);
        $query = $this->db->delete($table_name);
        if($query){
            $this->session->set_flashdata('dsuccMess', 'Record Deleted Succesfully');
            redirect($redirect);
        }
    }
    function delete_course($course_id){
        $this->db->trans_start();
        $this->db->where("course_id",$course_id);
        $this->db->delete("tc_course");
        $this->db->where("course_id",$course_id);
        $this->db->delete("tc_batch");
        $this->db->where("course_id",$course_id);
        $this->db->delete("tc_enrollment");
        if($this->db->trans_complete()){
            $this->session->set_flashdata('dsuccMess', 'Record Deleted Succesfully');
            redirect("Course-List");
        }
    }
    function delete_all_student($student_id,$user_id,$redirect){
        $this->db->trans_start();
        $this->db->where("student_id",$student_id);
        $this->db->delete("tc_student");
        $this->db->where("student_id",$student_id);
        $this->db->delete("tc_enrollment");
        $this->db->where("id",$user_id);
        $this->db->delete("tc_login");
        if($this->db->trans_complete()){
            $this->session->set_flashdata('dsuccMess', 'Record Deleted Succesfully');
            redirect($redirect);
        }
    }
    function delete_student(){

    }
    function delete_employee(){

    }
    function add_student($login_data,$student_data,$course_name,$enroll_data){
        $this->load->library('email');
        $this->db->trans_start();
        $this->db->insert('tc_login', $login_data);
        $insert_id = $this->db->insert_id();
        $student_data['user_id'] = $insert_id;
        $this->db->insert('tc_student',$student_data);
        $insert_id = $this->db->insert_id();
        $enroll_data['student_id'] = $insert_id;
        $this->db->insert('tc_enrollment',$enroll_data);
        if($this->db->trans_complete()){
         $this->send_mail_student_enrolment($student_data,$login_data,$course_name);
         $this->session->set_flashdata('isuccMess', 'Record Insert Succesfully');
         redirect("Student-List");
          }
    }
    function insert_question($data,$mm_data,$quiz){
        $this->db->trans_start();
        $this->db->insert('tc_quiz_question', $data);
        $insert_id = $this->db->insert_id();
        $mm_data['question_id']= $insert_id;
        $this->db->insert('tc_q_q_map', $mm_data);
        if($this->db->trans_complete()){
            redirect("Quiz-Questions-List?id=".$quiz);
        }
    }
    function insert_quiz_question_f_bank($q_ids,$quiz_id,$emp_id){
        $this->db->trans_start();
        if($this->db->trans_complete()){
            foreach($q_ids as $q){
                $data = array(
                    "quiz_id"=>$quiz_id,
                    "question_id"=>$q,
                    "add_by"=>$emp_id,
                    "status"=>1
                );
            $this->db->insert('tc_q_q_map',$data);
            }
            redirect("Quiz-Questions-List?id=".$quiz_id);
        }
    }
    function get_student($student_id){
        $sql = "SELECT student_name,email FROM tc_student WHERE student_id = $student_id";
        $my_sql = "$sql";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() == 1) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function get_course($course_id){
        $sql = "SELECT course_name FROM tc_course WHERE course_id = $course_id";
        $my_sql = "$sql";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() == 1) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function insert_class_history($class_id,$class_link,$emp_id){
        $cl_date = date('y-m-d');
        $cl_started_at = date('h:i A');
        $cl_start_ts = strtotime($cl_started_at);
        $data = array(
            "class_id"=>$class_id,
            "class_date"=>$cl_date,
            "class_started_at"=>$cl_started_at,
            "class_starting_ts"=>$cl_start_ts,
            "teacher_id"=>$emp_id
        );
        $query = $this->db->insert("tc_live_classes",$data);
        if($query){
            redirect("$class_link");
        }
    }
    function get_batch_class_data($class_id){
        $sql="SELECT ch.*, c.class_name,c.class_ts, b.batch_name FROM tc_live_classes AS ch,
        tc_classes AS c, tc_batch AS b WHERE ch.class_id = $class_id AND ch.class_id = c.class_id AND c.batch_id = b.batch_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function get_group_class_data($class_id){
        $sql="SELECT ch.*, c.class_name,c.class_ts, g.group_name FROM tc_live_classes AS ch,
        tc_classes AS c, tc_batch_group AS g WHERE ch.class_id = $class_id AND ch.class_id = c.class_id AND c.group_id = g.group_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function get_student_batch_class_data($student_id){
        $sql="SELECT ch.*, c.class_name,c.class_ts, b.batch_name FROM tc_live_classes AS ch,
        tc_classes AS c, tc_batch AS b WHERE ch.student_ids LIKE '%$student_id%'  AND ch.class_id = c.class_id AND c.batch_id = b.batch_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function get_student_group_class_data($student_id){
        $sql="SELECT ch.*, c.class_name,c.class_ts, g.group_name FROM tc_live_classes AS ch,
        tc_classes AS c, tc_batch_group AS g WHERE ch.student_ids LIKE '%$student_id%' AND ch.class_id = c.class_id AND c.group_id = g.group_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    function insert_teacher($user_login,$employee){
$this->db->trans_start();
$this->db->insert('tc_login', $user_login);
$insert_id = $this->db->insert_id();
$employee['user_id'] = $insert_id;
$this->db->insert('tc_employee',$employee);
if($this->db->trans_complete()){
    $this->session->set_flashdata('isuccMess', 'Record Inserted Succesfully');
    redirect("Employee-List");
}
    }
function update_teacher($emp_data,$emp_us_data,$where,$u_where){
    $this->db->trans_start();
    $this->db->where($u_where);
    $this->db->update('tc_login',$emp_us_data);
    $this->db->where($where);
    $this->db->update('tc_employee',$emp_data);
    if($this->db->trans_complete()){
        $this->session->set_flashdata('usuccMess', 'Record Updated Succesfully');
        redirect("Employee-List");
    }
}
    function update_student($std_data,$std_us_data,$where,$u_where){
        $this->db->trans_start();
        $this->db->where($u_where);
        $this->db->update('tc_login',$std_us_data);
        $this->db->where($where);
        $this->db->update('tc_student',$std_data);
        if($this->db->trans_complete()){
            $this->session->set_flashdata('usuccMess', 'Record Updated Succesfully');
            redirect("Student-List");
        }
    }
    function en_existing_std($data,$course_data,$student_data){
        $query = $this->db->insert("tc_enrollment", $data);
        if($query)
        {
            $this->send_mail_exi_student_enrolment($course_data,$student_data);
            $this->session->set_flashdata('usuccMess', 'Course Added Succesfully');
            redirect("Student-Course-List?id=".$data['student_id']);
            }else{
                return true;
            }
        }
    function send_mail_student_enrolment($student_data,$login_data,$course_name){
        $email = $student_data['email'];
        $this->email->from('pawnesh1999@gmail.com', 'Think Champ Pvt.Ltd');
        $this->email->to($email);
        $this->email->bcc('thinkchamp.pvt.ltd@gmail.com');
        $this->email->subject('Enrollment In '.$course_name[0]['course_name']);
        $message = $this->template_student_enrollment($student_data,$login_data,$course_name); 
        $this->email->message($message);
       if( $this->email->send()){
        echo "sent";
       }else{
        $this->email->print_debugger();
       }
    }
    function send_mail_exi_student_enrolment($course_data,$student_data){
        $email = $student_data[0]['email'];
        $this->email->from('pawnesh1999@gmail.com', 'Think Champ Pvt.Ltd');
        $this->email->to($email);
        $this->email->bcc('thinkchamp.pvt.ltd@gmail.com');
        $this->email->subject('Enrollment In '.$course_name[0]['course_name']);
        $message = $this->template_exi_student_enrollment($course_data,$student_data); 
        $this->email->message($message);
       if( $this->email->send()){
        echo "sent";
       }else{
        $this->email->print_debugger();
       }
    }
    function template_student_enrollment($student_data,$login_data,$course_name){
        ob_start();
    ?>
        <!DOCTYPE html><html><head> <style>*{font-family: Arial, Helvetica, sans-serif;}html,body{margin: 0;padding: 0;}body{background: #f0f0f0;}</style></head><body> <table cellpadding="0" cellspacing="0" border="0" align="center" style="background: #f0f0f0; width: 100%;"> <tbody> <tr> <td> <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%"> <tbody> <tr> <td valign="top"> <table cellpadding="0" cellspacing="0" border="0" style="height:40px"></table> </td></tr><tr> <td valign="top" style="padding:0 20px"> <div style="border-top:5px solid #8b4cdc; width:100%; display:block; box-shadow: 0px 0px 5px #ccc; background:#fff; padding:25px;"> 
        <p>Dear <strong><?=$student_data['student_name']?></strong>,</p><p>Think Champ.</p><p>Thank you for registering with us. Your login credentials are as follows:</p>
        <p style="font-weight:bold">Course: <?=$course_name[0]['course_name']?></p>
        <p style="font-weight:bold">Email: <?=$student_data['email']?></p>
        <p style="font-weight:bold">Password: <?=$login_data['password']?></p>
        <p>&nbsp;</p><a style="padding:15px 30px; background:#8b4cdc; margin:15px 0px; cursor:pointer; color:#fff; text-decoration:none" href="https://think-champ.com/auth/">Login Now</a><p>&nbsp;</p>
        <p>In case the above link does not work, copy and paste following link in browser.</p>
        <a href="https://think-champ.com/auth/" style="font-weight:bold">https://think-champ.com/auth/</a>
        <p>Don't forget to change your password once you login. In case of any query, feel free to contact us.</p><p>Regards,<br>Think Champ Team</p><img src="http://localhost/Think-Champ/assets/images/home/Tc_logo2.png" >">www.facebook.com/think-champ</a></p></div></td></tr></tbody> </table> </td></tr></tbody> </table></body></html>
    <?php
        return ob_get_clean();
    }
    function template_exi_student_enrollment($course_data,$student_data){
        ob_start();
        ?>
            <!DOCTYPE html><html><head> <style>*{font-family: Arial, Helvetica, sans-serif;}html,body{margin: 0;padding: 0;}body{background: #f0f0f0;}</style></head><body> <table cellpadding="0" cellspacing="0" border="0" align="center" style="background: #f0f0f0; width: 100%;"> <tbody> <tr> <td> <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%"> <tbody> <tr> <td valign="top"> <table cellpadding="0" cellspacing="0" border="0" style="height:40px"></table> </td></tr><tr> <td valign="top" style="padding:0 20px"> <div style="border-top:5px solid #8b4cdc; width:100%; display:block; box-shadow: 0px 0px 5px #ccc; background:#fff; padding:25px;"> 
            <p>Dear <strong><?=$student_data[0]['student_name']?></strong>,</p><p>Think Champ.</p><p>Our Existing Student You Have Successfully Enrolled In Our <?=$course_data[0]['course_name']?> Course:</p>
            <p>&nbsp;</p><a style="padding:15px 30px; background:#8b4cdc; margin:15px 0px; cursor:pointer; color:#fff; text-decoration:none" href="https://think-champ.com/auth/">Login Now</a><p>&nbsp;</p>
            <p>In case the above link does not work, copy and paste following link in browser.</p>
            <a href="https://think-champ.com/auth/" style="font-weight:bold">https://think-champ.com/auth/</a>
            <p>Don't forget to change your password once you login. In case of any query, feel free to contact us.</p><p>Regards,<br>Think Champ Team</p><img src="http://localhost/Think-Champ/assets/images/home/Tc_logo2.png" >">www.facebook.com/think-champ</a></p></div></td></tr></tbody> </table> </td></tr></tbody> </table></body></html>
        <?php
            return ob_get_clean();
    }
}