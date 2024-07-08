<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ktgrsampah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_ktgrsampah');
        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);
        $data['ktgrsampah'] = $this->m_ktgrsampah->get_all_ktgrsampah($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_ktgrsampah/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_ktgrsampah/create', $data);
        $this->load->view('templates/footer');
    }

    public function store() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('warna_kategori', 'Warna Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_kategori' => $this->input->post('warna_kategori')
            );

            $this->m_ktgrsampah->insert_ktgrsampah($data);
            redirect('c_ktgrsampah');
        }
    }

    public function edit($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);
        $data['ktgrsampah'] = $this->m_ktgrsampah->get_ktgrsampah($id_ktgrsampah);
    
        $this->load->view('v_ktgrsampah/edit', $data);
    }

    public function update($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('warna_kategori', 'Warna Kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id_ktgrsampah);
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_kategori' => $this->input->post('warna_kategori')
            );

            $this->m_ktgrsampah->update_ktgrsampah($id_ktgrsampah, $data);
            redirect('c_ktgrsampah');
        }
    }

    public function delete($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->m_ktgrsampah->delete_ktgrsampah($id_ktgrsampah);
        redirect('c_ktgrsampah');
    }
}
?>
