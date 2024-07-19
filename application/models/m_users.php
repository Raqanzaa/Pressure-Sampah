<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('t_users');
        return $query->row_array();
    }

    public function get_all_users() {
        $query = $this->db->get('t_users');
        return $query->result_array();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update('t_users', $data);
    }    
}
?>
