<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ktgrsampah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        $this->load->model('m_ktgrsampah'); // Memuat model m_ktgrsampah
        $this->load->model('m_users');
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
=======
        $this->load->model('m_ktgrsampah');
        $this->load->library('form_validation'); // Load library form_validation untuk validasi form
>>>>>>> b122476367dcc8b0010602a7fb2bcc5b94142919
    }

    public function index()
    {
        $data['title'] = 'Kategori Sampah';
<<<<<<< HEAD
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['categories'] = $this->m_ktgrsampah->get_categories(); // Mengambil data kategori dari model
=======
        $data['categories'] = $this->m_ktgrsampah->get_categories();
>>>>>>> b122476367dcc8b0010602a7fb2bcc5b94142919

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_ktgrsampah/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori Sampah';

        $this->form_validation->set_rules('Nama_Kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('Warna_Kategori', 'Warna Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_ktgrsampah/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_ktgrsampah->tambah_kategori();
            redirect('c_ktgrsampah/index');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kategori Sampah';
        $data['category'] = $this->m_ktgrsampah->get_kategori_by_id($id);

        $this->form_validation->set_rules('Nama_Kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('Warna_Kategori', 'Warna Kategori', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_ktgrsampah/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->m_ktgrsampah->edit_kategori($id);
            redirect('c_ktgrsampah/index');
        }
    }

    public function hapus($id)
    {
        $this->m_ktgrsampah->hapus_kategori($id);
        redirect('c_ktgrsampah/index');
    }
}
