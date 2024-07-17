<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_landing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_artikel');
        $this->load->model('m_landing');
        $this->load->model('m_auth');
    }

    // Fungsi untuk menampilkan halaman landing
    public function index() {
        // Dapatkan user ID dari sesi
        $user_id = $this->session->userdata('user_id');
        
        // Dapatkan data artikel
        $data['artikel'] = $this->m_artikel->get_all_articles();
        
        // Dapatkan tahun dari filter tahun (jika ada), default ke tahun sekarang
        $yearFilter = $this->input->get('yearFilter');
        if (!$yearFilter) {
            $yearFilter = date('Y');
        }
        
        // Dapatkan data statistik untuk user yang terakhir login
        $data['tps'] = $this->m_landing->get_tps_count($user_id);
        $data['jenis_sampah'] = $this->m_landing->get_jenis_sampah_count($user_id);
        $data['sampah_dikumpulkan'] = $this->m_landing->get_sampah_dikumpulkan($user_id, $yearFilter);
        $data['kategori_sampah'] = $this->m_landing->get_kategori_sampah_count($user_id);
        $data['sampah_didaur_ulang'] = $this->m_landing->get_sampah_didaur_ulang($user_id, $yearFilter);
        $data['residu'] = $this->m_landing->get_residu($user_id, $yearFilter);

        $data['yearFilter'] = $yearFilter; // Sertakan tahun filter ke view

        $this->load->view('t_landing/header.php');
        $this->load->view('v_front/landing.php', $data);
        $this->load->view('t_landing/footer.php');
    }
}
?>
