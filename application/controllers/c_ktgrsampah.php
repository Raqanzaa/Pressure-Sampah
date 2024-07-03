<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ktgrsampah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_ktgrsampah'); // Memuat model m_ktgrsampah
        $this->load->model('m_users');
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
    }

    public function index() {
        $data['title'] = 'Kategori Sampah';
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['categories'] = $this->m_ktgrsampah->get_categories(); // Mengambil data kategori dari model

        $this->load->view('templates/header', $data); // Memuat bagian header
        $this->load->view('templates/topbar', $data); // Memuat bagian topbar
        $this->load->view('templates/sidebar', $data); // Memuat bagian sidebar
        $this->load->view('v_ktgrsampah/index', $data); // Memuat view index dengan data
        $this->load->view('templates/footer'); // Memuat bagian footer
    }

    public function tambah() {
        // Fungsi untuk menambah data kategori, sesuaikan kebutuhan
        $this->load->view('templates/header', $data); // Contoh: Memuat bagian header
        $this->load->view('templates/topbar', $data); // Contoh: Memuat bagian topbar
        $this->load->view('templates/sidebar', $data); // Contoh: Memuat bagian sidebar
        $this->load->view('v_ktgrsampah/tambah'); // Contoh: Memuat view tambah
        $this->load->view('templates/footer'); // Contoh: Memuat bagian footer
    }

    // Tambahkan fungsi lainnya sesuai kebutuhan

}
?>
