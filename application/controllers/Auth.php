<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function login() {
        if ($this->input->post('login')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $user = $this->m_auth->login_user($email, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('dashboard');  // Pastikan URL controller 'dashboard' sesuai dengan route yang diinginkan
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('landing-page');
            }
        } else {
            redirect('landing-page');
        }
    }

    public function register() {
        if ($this->input->post('register')) {
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[t_users.email]');
    
            if ($this->form_validation->run() == true) {
                $data = array(
                    'full_name' => $this->input->post('full_name'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'email' => $this->input->post('email')
                );
    
                if ($this->m_auth->register_user($data)) {
                    $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                    redirect('landing-page?registered=true');
                } else {
                    $this->session->set_flashdata('error', 'Gagal menyimpan data.');
                    redirect('landing-page');
                }
            } else {
                $this->session->set_flashdata('validation_errors', validation_errors());
                redirect('landing-page');
            }
        } else {
            redirect('landing-page');
        }
    }
    

    public function logout() {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }
}
?>
