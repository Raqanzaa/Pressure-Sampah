<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
        // Pastikan user sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $data['articles'] = $this->m_artikel->get_all_articles();
        $data['title'] = 'Daftar Artikel';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_artikel/index', $data);
        $this->load->view('templates/footer');
    }
}
