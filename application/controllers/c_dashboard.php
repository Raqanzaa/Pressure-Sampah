<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    public function index() {
        $data['total_tps'] = $this->m_dashboard->get_total_tps();
        $data['total_sampah'] = $this->m_dashboard->get_total_sampah();
        $data['persentase_daur_ulang'] = $this->m_dashboard->get_persentase_daur_ulang();
        $data['total_residu'] = $this->m_dashboard->get_total_residu();
        $data['keberhasilan_daur_ulang'] = $this->m_dashboard->get_keberhasilan_daur_ulang_bulanan();
        $data['summary_data'] = $this->m_dashboard->get_summary_data();

        // Load view dengan data yang sudah diambil
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_home/index', $data);
        $this->load->view('templates/footer');
    }
}
?>
