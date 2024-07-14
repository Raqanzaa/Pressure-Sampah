<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_daur_ulang extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_daur_ulang');
        $this->load->model('m_users');
        $this->load->model('m_tps');
        $this->load->model('m_ktgrsampah');
        $this->load->model('m_auth');
        $this->load->library('form_validation');
    }

    public function get_bulan_indonesia($bulan) {
        $bulan_array = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        return $bulan_array[$bulan];
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['tps'] = $this->m_tps->get_all_tps($user_id);
        $data['daur_ulang'] = $this->m_daur_ulang->get_all_daur_ulang($user_id);
        $data['kategori'] = $this->m_ktgrsampah->get_all_ktgrsampah($user_id);
    
        $grouped_data = [];
        foreach ($data['daur_ulang'] as $item) {
            $tahun = $item['tahun'];
            $bulan = $item['bulan'];
            $tps_id = $item['tps_id'];
            $kategori_id = $item['kategori_id'];
    
            if (!isset($grouped_data[$tahun][$bulan][$tps_id])) {
                $grouped_data[$tahun][$bulan][$tps_id] = [];
            }
    
            if (!isset($grouped_data[$tahun][$bulan][$tps_id][$kategori_id])) {
                $grouped_data[$tahun][$bulan][$tps_id][$kategori_id] = $item;
            } else {
                $grouped_data[$tahun][$bulan][$tps_id][$kategori_id]['berat_total'] += $item['berat_total'];
                $grouped_data[$tahun][$bulan][$tps_id][$kategori_id]['berat_daur_ulang'] += $item['berat_daur_ulang'];
                $grouped_data[$tahun][$bulan][$tps_id][$kategori_id]['residu'] += $item['residu'];
            }
        }
    
        $data['grouped_data'] = $grouped_data;
        $data['get_bulan_indonesia'] = array($this, 'get_bulan_indonesia');
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_daur_ulang/index', $data);
        $this->load->view('templates/footer');
    }    

    public function harian() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $tanggal = date('Y-m-d');
        $bulan = date('n');
        $tahun = date('Y');
        $nama_bulan = $this->get_bulan_indonesia($bulan);
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
        $data['daur_ulang'] = $this->m_daur_ulang->get_harian($tanggal, $user_id);
        $data['nama_bulan'] = $nama_bulan;
        $data['tahun'] = $tahun;
        $data['kategori'] = $this->m_ktgrsampah->get_all_ktgrsampah($user_id);
        $data['tps'] = $this->m_tps->get_all_tps($user_id);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_daur_ulang/create', $data); // Pastikan view yang sesuai digunakan
        $this->load->view('templates/footer');
    }
    

    public function submit_harian() {
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('berat_total', 'Total Berat Sampah', 'required|numeric');
        $this->form_validation->set_rules('berat_daur_ulang', 'Sampah Terdaur Ulang', 'required|numeric');
        $this->form_validation->set_rules('residu', 'Residu Sampah', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'Kategori Sampah', 'required');
        $this->form_validation->set_rules('tps_id', 'Nama TPS', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $this->kalender(); // Redirect to form if validation fails
        } else {
            $data = array(
                'tanggal' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
                'berat_total' => $this->input->post('berat_total'),
                'berat_daur_ulang' => $this->input->post('berat_daur_ulang'),
                'residu' => $this->input->post('residu'),
                'kategori_id' => $this->input->post('kategori_id'),
                'tps_id' => $this->input->post('tps_id'),
                'user_id' => $this->session->userdata('user_id')
            );
    
            $this->m_daur_ulang->insert_harian($data);
    
            // Akumulasi data mingguan
            $tanggal_obj = new DateTime($data['tanggal']);
            $minggu_ke = $tanggal_obj->format("W");
            $bulan = $tanggal_obj->format("n");
            $tahun = $tanggal_obj->format("Y");
    
            $mingguan_data = array(
                'minggu_ke' => $minggu_ke,
                'tahun' => $tahun,
                'berat_total' => $data['berat_total'],
                'berat_daur_ulang' => $data['berat_daur_ulang'],
                'residu' => $data['residu'],
                'kategori_id' => $data['kategori_id'],
                'tps_id' => $data['tps_id'],
                'user_id' => $data['user_id']
            );
            $this->m_daur_ulang->accumulate_mingguan($mingguan_data);
    
            // Akumulasi data bulanan
            $bulanan_data = array(
                'bulan' => $bulan,
                'tahun' => $tahun,
                'berat_total' => $data['berat_total'],
                'berat_daur_ulang' => $data['berat_daur_ulang'],
                'residu' => $data['residu'],
                'kategori_id' => $data['kategori_id'],
                'tps_id' => $data['tps_id'],
                'user_id' => $data['user_id']
            );
            $this->m_daur_ulang->accumulate_bulanan($bulanan_data);
    
            redirect('c_daur_ulang');
        }
    }
    

    public function edit_harian($id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $data['user'] = $this->session->userdata('user_id');
        $data['daur_ulang'] = $this->m_daur_ulang->get_harian_by_id($id);
        $data['kategori'] = $this->m_ktgrsampah->get_all_ktgrsampah($this->session->userdata('user_id'));
        $data['tps'] = $this->m_tps->get_all_tps($this->session->userdata('user_id'));
    
        if (empty($data['daur_ulang'])) {
            redirect('c_daur_ulang');
        }
    
        $this->load->view('v_daur_ulang/edit', $data);
    }

    public function update_harian() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $id = $this->input->post('id');
        $new_data = [
            'tanggal' => $this->input->post('tanggal'),
            'berat_total' => $this->input->post('berat_total'),
            'berat_daur_ulang' => $this->input->post('berat_daur_ulang'),
            'residu' => $this->input->post('residu'),
            'kategori_id' => $this->input->post('kategori_id'),
            'tps_id' => $this->input->post('tps_id'),
            'user_id' => $this->session->userdata('user_id')
        ];
    
        $old_data = $this->m_daur_ulang->get_harian_by_id($id);
    
        $this->m_daur_ulang->update_harian($id, $new_data);

        $diff_data = [
            'berat_total' => $new_data['berat_total'] - $old_data['berat_total'],
            'berat_daur_ulang' => $new_data['berat_daur_ulang'] - $old_data['berat_daur_ulang'],
            'residu' => $new_data['residu'] - $old_data['residu'],
            'kategori_id' => $new_data['kategori_id']
        ];

        $this->update_akumulasi($new_data['tanggal'], $new_data['tps_id'], $diff_data);
    
        redirect('c_daur_ulang');
    }
    
    private function update_akumulasi($tanggal, $tps_id, $diff_data) {
        $this->m_daur_ulang->accumulate_update_mingguan($tanggal, $tps_id, $diff_data);
        $this->m_daur_ulang->accumulate_update_bulanan($tanggal, $tps_id, $diff_data);
    }
    
    
    public function delete($id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $data_to_delete = $this->m_daur_ulang->get_harian_by_id($id, $this->session->userdata('user_id')); // Add user_id
    
        if ($data_to_delete) {
            $this->m_daur_ulang->delete_harian($id, $this->session->userdata('user_id')); // Add user_id
            $this->update_akumulasi_delete($data_to_delete['tanggal'], $data_to_delete['tps_id'], $data_to_delete);
        }
    
        redirect('c_daur_ulang');
    }
    
    private function update_akumulasi_delete($tanggal, $tps_id, $data) {
        $tanggal_obj = new DateTime($tanggal);
        $minggu_ke = $tanggal_obj->format("W");
        $bulan = $tanggal_obj->format("n");
        $tahun = $tanggal_obj->format("Y");

        $mingguan_data = array(
            'minggu_ke' => $minggu_ke,
            'tahun' => $tahun,
            'kategori_id' => $data['kategori_id'],
            'tps_id' => $tps_id,
            'berat_total' => -$data['berat_total'], 
            'berat_daur_ulang' => -$data['berat_daur_ulang'],
            'residu' => -$data['residu'],
            'user_id' => $data['user_id']
        );
        $this->m_daur_ulang->accumulate_delete_mingguan($mingguan_data);

        $bulanan_data = array(
            'bulan' => $bulan,
            'tahun' => $tahun,
            'kategori_id' => $data['kategori_id'],
            'tps_id' => $tps_id,
            'berat_total' => -$data['berat_total'],
            'berat_daur_ulang' => -$data['berat_daur_ulang'],
            'residu' => -$data['residu'],
            'user_id' => $data['user_id']
        );
        $this->m_daur_ulang->accumulate_delete_bulanan($bulanan_data);
    }

    public function kalender() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_users->get_user_by_id($user_id);
    
        $bulan = date('n');
        $tahun = date('Y');
        $data['kalender_data'] = $this->m_daur_ulang->get_data_bulanan($user_id, $bulan, $tahun);
    
        $tanggal = date('Y-m-d');
        $nama_bulan = $this->get_bulan_indonesia($bulan);
        $data['daur_ulang'] = $this->m_daur_ulang->get_harian($user_id, $tanggal);
        $data['nama_bulan'] = $nama_bulan;
        $data['tahun'] = $tahun;
        $data['kategori'] = $this->m_ktgrsampah->get_all_ktgrsampah($user_id);
        $data['tps'] = $this->m_tps->get_all_tps($user_id);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_daur_ulang/kalender', $data);
        $this->load->view('templates/footer');
    }    
    
    public function view_details($tps_id) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $data['user'] = $this->m_users->get_user_by_id($this->session->userdata('user_id'));
        $data['tps'] = $this->m_tps->get_tps_by_id($tps_id);
        $data['daur_ulang'] = $this->m_daur_ulang->get_daur_ulang_by_tps_id($tps_id);
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_daur_ulang/view_details', $data);
        $this->load->view('templates/footer');
    }  

}
?>
