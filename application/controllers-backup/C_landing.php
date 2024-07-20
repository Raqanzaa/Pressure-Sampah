<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_artikel');
        $this->load->model('M_landing');
        // $this->load->model('M_auth');
    }

    // Fungsi untuk menampilkan halaman landing
    public function index() {
        // Dapatkan data artikel
        $data['artikel'] = $this->M_artikel->get_all_articles();
        
        // Dapatkan tahun dari filter tahun (jika ada), default ke tahun sekarang
        $yearFilter = $this->input->get('yearFilter');
        if (!$yearFilter) {
            $yearFilter = date('Y');
        }
        
        // Dapatkan data statistik tanpa batasan user_id
        $data['tps'] = $this->M_landing->get_tps_count();
        $data['jenis_sampah'] = $this->M_landing->get_jenis_sampah_count();
        $data['sampah_dikumpulkan'] = $this->M_landing->get_sampah_dikumpulkan();
        $data['kategori_sampah'] = $this->M_landing->get_kategori_sampah_count();
        $data['sampah_didaur_ulang'] = $this->M_landing->get_sampah_didaur_ulang();
        $data['residu'] = $this->M_landing->get_residu();

        $data['yearFilter'] = $yearFilter; // Sertakan tahun filter ke view

        $this->load->view('t_landing/header.php');
        $this->load->view('v_front/landing.php', $data);
        $this->load->view('t_landing/footer.php');
    }
}

?>
