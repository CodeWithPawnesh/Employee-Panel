<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function auth_login($data)
    {
        $this->db->select('*');
        $this->db->where($data);
        $this->db->from('tc_login');
        $query = $this->db->get(); 
        if($query->num_rows() == 1) {
            return $query->row();
        }else{
            return false;
        }
    }
}