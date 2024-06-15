<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_tps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tps');
    }

    public function index()
    {
        $data['title'] = 'TPS';
        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/index', $data);
        $this->load->view('templates/footer');
    }

}
