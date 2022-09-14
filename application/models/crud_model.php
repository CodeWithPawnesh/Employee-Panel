<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class crud_model extends CI_Model
{
    function save($data,$table_name){
        $query = $this->db->insert($table_name, $data);
        if($query)
        {
            redirect('Course-List');
        }
    }
    function update($data,$table_name,$where_data){
        
    }
}