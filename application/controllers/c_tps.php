<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_tps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tps');
        $this->load->model('m_users');
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['title'] = 'Tempat Pembuangan Sampah';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/index', $data);
        $this->load->view('templates/footer');
    }

}
