<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_recycle extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_recycle');
    }

    public function index() {
        $data['data_recycle'] = $this->m_recycle->get_all_recycles(); // Ganti ini dengan nama method yang sesuai
        $this->load->view('v_recycle/index', $data);
    }

    public function tambah() {
        // Logika untuk form tambah data
    }

    public function view($id) {
        // Logika untuk tampilan detail data
    }

    public function edit($id) {
        // Logika untuk form edit data
    }

    public function hapus($id) {
        // Logika untuk menghapus data
    }
}
?>
