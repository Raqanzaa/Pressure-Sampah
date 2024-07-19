<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tps extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_tps');
        $this->load->model('M_auth');
        $this->load->library('form_validation');
    }

    // Fungsi untuk menampilkan semua data TPS
    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->M_auth->get_user_by_id($user_id);
        $data['tps'] = $this->M_tps->get_all_tps($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/index', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menampilkan form tambah TPS
    public function create() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->M_auth->get_user_by_id($user_id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/create', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menyimpan data TPS baru
    public function store() {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('nama_tps', 'Nama TPS', 'required');
        $this->form_validation->set_rules('alamat_tps', 'Alamat TPS', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tps/create', $data);
            $this->load->view('templates/footer');
        } else {
            // Mengambil data dari form
            $nama_tps = $this->input->post('nama_tps');
            $alamat_tps = $this->input->post('alamat_tps');
            $kapasitas = $this->input->post('kapasitas');
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');

            // Konversi kapasitas ke gram jika satuan adalah kg
            if ($satuan == 'kg') {
                $kapasitas *= 1000; // 1 kg = 1000 gram
            }

            // Data yang akan disimpan
            $data = array(
                'nama_tps' => $nama_tps,
                'alamat_tps' => $alamat_tps,
                'kapasitas' => $kapasitas,
                'keterangan' => $keterangan,
                'user_id' => $this->session->userdata('user_id')
            );

            // Simpan data ke database
            $this->M_tps->insert_tps($data);
            redirect('list-tps');
        }
    }

    public function edit($id_tps) {
        $tps = $this->db->get_where('t_tps', ['id_tps' => $id_tps])->row_array();
        if ($tps) {
            $this->load->view('v_tps/edit', ['tps' => $tps]);
        } else {
            echo 'No TPS found with ID ' . $id_tps;
        }
    }
    


    // Fungsi untuk mengupdate data TPS
    public function update($id_tps) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
    
        $this->form_validation->set_rules('nama_tps', 'Nama TPS', 'required');
        $this->form_validation->set_rules('alamat_tps', 'Alamat TPS', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->M_auth->get_user_by_id($this->session->userdata('user_id'));
            $data['tps'] = $this->M_tps->get_tps($id_tps);
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_tps/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $nama_tps = $this->input->post('nama_tps');
            $alamat_tps = $this->input->post('alamat_tps');
            $kapasitas = str_replace(',', '.', $this->input->post('kapasitas'));
            $satuan = $this->input->post('satuan');
            $keterangan = $this->input->post('keterangan');
    
            // Konversi kapasitas ke gram jika satuan adalah kg
            if ($satuan == 'kg') {
                $kapasitas = $kapasitas * 1000; // 1 kg = 1000 gram
            }
    
            // Data yang akan diupdate
            $tps_data = array(
                'nama_tps' => $nama_tps,
                'alamat_tps' => $alamat_tps,
                'kapasitas' => $kapasitas,
                'keterangan' => $keterangan
            );
    
            $this->M_tps->update_tps($id_tps, $tps_data);
            redirect('list-tps');
        }
    }
    
    
    // Fungsi untuk menghapus data TPS
    public function delete($id_tps) {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $this->M_tps->delete_tps($id_tps);
        redirect('list-tps');
    }
}
?>
