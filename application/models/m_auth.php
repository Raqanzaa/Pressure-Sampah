<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_auth extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk menyimpan data pengguna baru
    public function register_user($data) {
        return $this->db->insert('t_users', $data);
    }

    public function get_user_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('t_users');
        return $query->row_array();
    }

    // Fungsi untuk mengambil data pengguna berdasarkan username
    public function get_user_by_username($username) {
        $query = $this->db->get_where('t_users', array('username' => $username));
        return $query->row_array();
    }

    // Fungsi untuk memeriksa keberadaan pengguna berdasarkan username
    public function check_username_exists($username) {
        $query = $this->db->get_where('t_users', array('username' => $username));
        if (empty($query->row_array())) {
            return true; // username available
        } else {
            return false; // username not available
        }
    }

    // Fungsi untuk memeriksa keberadaan pengguna berdasarkan email
    public function check_email_exists($email) {
        $query = $this->db->get_where('t_users', array('email' => $email));
        if (empty($query->row_array())) {
            return true; // email available
        } else {
            return false; // email not available
        }
    }

    // Fungsi untuk memeriksa kecocokan password pengguna
    public function login_user($email, $password) {
        $this->db->where('email', $email);
        $user = $this->db->get('t_users')->row_array();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    // Fungsi untuk mengambil semua data pengguna
    public function get_all_users() {
        return $this->db->get('t_users')->result_array();
    }
}
?>
