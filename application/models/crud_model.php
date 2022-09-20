<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class crud_model extends CI_Model
{
    function save($data,$table_name,$redirect){
        $query = $this->db->insert($table_name, $data);
        if($query)
        {
            redirect($redirect);
        }
    }
    function update($data,$table_name,$where,$redirect=NULL){
        $this->db->where($where);
        $query = $this->db->update($table_name, $data);
        if($query && $redirect!=NULL){
            redirect($redirect);
        }
    }
    function get($table_name,$limit=NULL,$offset=NULL,$order_by=NULL,$where=Null){
        if($where ==Null){
            $this->db->order_by($order_by, 'DESC');
            $this->db->limit($limit,$offset);
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }else{
            $this->db->order_by($order_by, 'DESC');
            $this->db->limit($limit,$offset);
            $this->db->where($where);
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
    }
    function get_row($table_name,$where=Null){
        if($where ==Null){
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }else{
            $this->db->where($where);
            $query = $this->db->get($table_name);
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
    }
}