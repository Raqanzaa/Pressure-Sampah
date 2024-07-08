<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ktgrsampah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_ktgrsampah');
        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    // Fungsi untuk menampilkan semua data kategori sampah
    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);
        $data['ktgrsampah'] = $this->m_ktgrsampah->get_all_ktgrsampah($user_id);

        // Debugging: Periksa apakah $data['ktgrsampah'] mengandung data yang diharapkan
        if (empty($data['ktgrsampah'])) {
            $data['ktgrsampah'] = [];  // Pastikan $ktgrsampah tidak null
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_ktgrsampah/index', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menampilkan form tambah kategori sampah
    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);
    
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('warna_kategori', 'Warna Kategori', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_ktgrsampah/create', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'user_id' => $user_id,
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_kategori' => $this->input->post('warna_kategori')
            );
    
            $this->m_ktgrsampah->insert_ktgrsampah($data);
            redirect('c_ktgrsampah');
        }
    }

    // Fungsi untuk menampilkan form edit kategori sampah
    public function edit($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);
        $data['ktgrsampah'] = $this->m_ktgrsampah->get_ktgrsampah_by_id($id_ktgrsampah);
    
        if (empty($data['ktgrsampah'])) {
            show_error('Kategori sampah tidak ditemukan');
        }
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_ktgrsampah/edit', $data);
        $this->load->view('templates/footer');
    }
    
    public function update($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('warna_kategori', 'Warna Kategori', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $user_id = $this->session->userdata('user_id');
            $data['user'] = $this->m_auth->get_user_by_id($user_id);
            $data['ktgrsampah'] = $this->m_ktgrsampah->get_ktgrsampah_by_id($id_ktgrsampah);
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_ktgrsampah/edit', $data);
            $this->load->view('templates/footer');
        } else {
            // Mengambil data dari form
            $nama_kategori = $this->input->post('nama_kategori');
            $deskripsi = $this->input->post('deskripsi');
            $warna_kategori = $this->input->post('warna_kategori');
    
            // Data yang akan diupdate
            $data = array(
                'nama_kategori' => $nama_kategori,
                'deskripsi' => $deskripsi,
                'warna_kategori' => $warna_kategori
            );
    
            $this->m_ktgrsampah->update_ktgrsampah($id_ktgrsampah, $data);
            redirect('c_ktgrsampah/index');
        }
    }        

    // Fungsi untuk menghapus data kategori sampah
    public function delete($id_ktgrsampah) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $this->m_ktgrsampah->delete_ktgrsampah($id_ktgrsampah, $user_id);
        redirect('c_ktgrsampah/index');
    }
}
?>
