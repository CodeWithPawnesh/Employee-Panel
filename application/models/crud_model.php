<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class crud_model extends CI_Model
{
    function save($data,$table_name,$redirect=Null){
        $query = $this->db->insert($table_name, $data);
        if($query)
        {
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
            redirect($redirect);
        }
    }
    function update_in($data,$table_name,$where,$redirect=Null,$where_in_column){
        $this->db->where_in("$where_in_column",$where);
        $query = $this->db->update($table_name, $data);
        if($query && $redirect!=NULL){
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
    function add_student($login_data,$student_data){
        $this->db->trans_start();
        $this->db->insert('tc_login', $login_data);
        $insert_id = $this->db->insert_id();
        $student_data['user_id'] = $insert_id;
        $this->db->insert('tc_student',$student_data);
        if($this->db->trans_complete()){
         redirect("Student-List");
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
}