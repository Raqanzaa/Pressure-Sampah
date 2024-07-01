<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model'); // Load model user_model.php
    }

    // Fungsi untuk halaman login
    public function login() {
        // Proses login
        if ($this->input->post('login')) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->user_model->login_user($username, $password);
            if ($user) {
                // Login sukses, simpan data user ke session
                $this->session->set_userdata('user_id', $user['id']);
                redirect('dashboard'); // Ganti 'dashboard' dengan halaman setelah login sukses
            } else {
                // Login gagal, tampilkan pesan error
                $data['error'] = 'Username atau password salah.';
            }
        }
        // Tampilkan halaman login
        $this->load->view('login', $data); // Ganti 'login' dengan nama file view login
    }

    // Fungsi untuk halaman register
    public function register() {
        // Proses registrasi
        if ($this->input->post('register')) {
            // Validasi input
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            // tambahkan validasi lainnya sesuai kebutuhan

            if ($this->form_validation->run() == true) {
                // Data untuk disimpan ke database
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    // tambahkan field lainnya jika ada
                );
                // Simpan data ke database
                $this->user_model->register_user($data);
                redirect('auth/login'); // Redirect ke halaman login setelah registrasi sukses
            }
        }
        // Tampilkan halaman register
        $this->load->view('register'); // Ganti 'register' dengan nama file view register
    }
}
?>
