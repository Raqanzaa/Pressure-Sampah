<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_users');
    }

    public function login() {
        $data = array();
        if ($this->input->post('login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->m_users->login_user($username, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('c_home');
            } else {
                $data['error'] = 'Username atau password salah.';
                $this->load->view('v_front/landing', $data);
            }
        }
    }

    public function register() {
        $data = array();
        if ($this->input->post('register')) {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[t_users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[t_users.email]');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'email' => $this->input->post('email')
                );
                $this->m_users->register_user($data);
                redirect('auth/login');
            } else {
                $this->load->view('v_front/landing', $data);
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>
