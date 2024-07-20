<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to save new user data
    public function register_user($data) {
        return $this->db->insert('t_users', $data);
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('t_users');
        return $query->row_array();
    }

    // Function to get user data by username
    public function get_user_by_username($username) {
        $query = $this->db->get_where('t_users', array('username' => $username));
        return $query->row_array();
    }

    // Function to check if username exists
    public function check_username_exists($username) {
        $query = $this->db->get_where('t_users', array('username' => $username));
        if (empty($query->row_array())) {
            return true; // username available
        } else {
            return false; // username not available
        }
    }

    // Function to check if email exists
    public function check_email_exists($email) {
        $query = $this->db->get_where('t_users', array('email' => $email));
        if (empty($query->row_array())) {
            return true; // email available
        } else {
            return false; // email not available
        }
    }

    // Function to check user password
    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('t_users')->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    // Function to get all user data
    public function get_all_users() {
        return $this->db->get('t_users')->result_array();
    }

    public function is_super_user($user_id)
    {
        $this->db->select('user_level');
        $this->db->from('t_users');
        $this->db->where('id', $user_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $user = $query->row();
            return $user->user_level == 1; // Asumsi level 1 adalah super admin
        }

        return FALSE;
    }
}
?>
