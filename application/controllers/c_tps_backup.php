<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_tps extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_tps');
    }

    public function index()
    {
        $data['title'] = 'TPS';
        $data['tps'] = $this->m_tps->get_all_tps();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/index', $data);
        $this->load->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah TPS';

        if ($this->input->post()) {
            $data = array(
                'Nama_TPS' => $this->input->post('nama_tps'),
                'Alamat' => $this->input->post('alamat'),
                'Kapasitas' => $this->input->post('kapasitas'),
                'Keterangan' => $this->input->post('keterangan')
            );
            $this->m_tps->insert_tps($data);
            redirect('c_tps/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_tps)
    {
        $data['title'] = 'Edit TPS';
        $data['tps'] = $this->m_tps->get_tps_by_id($id_tps);

        if ($this->input->post()) {
            $data = array(
                'Nama_TPS' => $this->input->post('nama_tps'),
                'Alamat' => $this->input->post('alamat'),
                'Kapasitas' => $this->input->post('kapasitas'),
                'Keterangan' => $this->input->post('keterangan')
            );
            $this->m_tps->update_tps($id_tps, $data);
            redirect('c_tps/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_tps/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id_tps)
    {
        $this->m_tps->delete_tps($id_tps);
        redirect('c_tps/index');
    }
}
?>
