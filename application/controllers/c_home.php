<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
        $this->load->model('M_home');
        $this->load->model('M_tps');
        $this->load->model('M_ktgrsampah');
        $this->load->model('M_daur_ulang');
        // Periksa apakah pengguna sudah login
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data = []; // Inisialisasi array $data
        $data['user'] = $this->M_auth->get_user_by_id($user_id);
        $data['title'] = 'Dashboard';

        // Mengambil semua data TPS berdasarkan user ID
        $tps_data = $this->M_tps->get_all_tps($user_id);
        $data['total_sampah'] = $this->M_home->get_total_sampah($user_id);
        $data['total_daur_ulang'] = $this->M_home->get_total_daur_ulang($user_id);
        $data['total_residu'] = $this->M_home->get_total_residu($user_id);

        // Mengambil kategori sampah
        $data['nama_tps'] = $this->M_tps->get_all_tps($user_id);
        $data['kategori_sampah'] = $this->M_ktgrsampah->get_all_ktgrsampah($user_id);

        // Default kategori (bisa diubah sesuai kebutuhan)
        $kategori_id = $this->input->post('kategori_id') ? $this->input->post('kategori_id') : null;
        $tps_id = $this->input->post('tps_id') ? $this->input->post('tps_id') : null;

        // Mengambil data bulanan berdasarkan kategori
        $data['data_per_bulan'] = $this->M_home->get_data_per_bulan_by_kategori_and_tps($user_id, $kategori_id, $tps_id);

        // Menghitung jumlah TPS
        $data['jumlah_tps'] = count($tps_data);

        // Inisialisasi array data bulanan dengan nilai 0
        $total_sampah_bulanan = array_fill(0, 12, 0);
        $total_daur_ulang_bulanan = array_fill(0, 12, 0);
        $total_residu_bulanan = array_fill(0, 12, 0);

        if ($data['data_per_bulan']) {
            foreach ($data['data_per_bulan'] as $data_bulan) {
                $bulan_index = $data_bulan['bulan'] - 1; // Mengurangi 1 karena array dimulai dari 0
                $total_sampah_bulanan[$bulan_index] = $data_bulan['total_sampah'];
                $total_daur_ulang_bulanan[$bulan_index] = $data_bulan['total_daur_ulang'];
                $total_residu_bulanan[$bulan_index] = $data_bulan['total_residu'];
            }
        }

        $data['total_sampah_bulanan'] = $total_sampah_bulanan;
        $data['total_daur_ulang_bulanan'] = $total_daur_ulang_bulanan;
        $data['total_residu_bulanan'] = $total_residu_bulanan;

        // Mengambil data bulanan, mingguan, dan harian
        $bulanan = $this->M_home->get_data_bulanan($user_id, $kategori_id, $tps_id);
        $mingguan = $this->M_home->get_data_mingguan($user_id, $kategori_id, $tps_id);
        $harian = $this->M_home->get_data_harian($user_id, $kategori_id, $tps_id);

        // Menghitung persentase keberhasilan daur ulang
        $data['persen_bulanan'] = isset($bulanan['total']) && $bulanan['total'] > 0 ? ($bulanan['daur_ulang'] / $bulanan['total']) * 100 : 0;
        $data['persen_mingguan'] = isset($mingguan['total']) && $mingguan['total'] > 0 ? ($mingguan['daur_ulang'] / $mingguan['total']) * 100 : 0;
        $data['persen_harian'] = isset($harian['total']) && $harian['total'] > 0 ? ($harian['daur_ulang'] / $harian['total']) * 100 : 0;

        // Menambahkan data persentase ke progress bar
        $data['progress_bulanan'] = [
            'persen' => $data['persen_bulanan'],
            'kelas' => $this->get_progress_class($data['persen_bulanan'])
        ];
        $data['progress_mingguan'] = [
            'persen' => $data['persen_mingguan'],
            'kelas' => $this->get_progress_class($data['persen_mingguan'])
        ];
        $data['progress_harian'] = [
            'persen' => $data['persen_harian'],
            'kelas' => $this->get_progress_class($data['persen_harian'])
        ];

        // Load views dengan variabel $data
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_home/index', $data);
        $this->load->view('templates/footer');
    }

    private function get_progress_class($persentase) {
        if ($persentase > 50) {
            return 'bg-success';
        } elseif ($persentase >= 30) {
            return 'bg-warning';
        } else {
            return 'bg-danger';
        }
    }
}
?>
