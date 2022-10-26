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
}