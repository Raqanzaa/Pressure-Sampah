<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ktgrsampah extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_ktgrsampah');
    }

    public function index()
    {
        $data['title'] = 'Daftar Kategori Sampah';
        $data['categories'] = $this->m_ktgrsampah->get_all_ktgrsampah();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_ktgrsampah/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kategori Sampah';

        if ($this->input->post()) {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_kategori' => $this->input->post('warna_kategori')
            );
            $this->m_ktgrsampah->insert_ktgrsampah($data);
            redirect('c_ktgrsampah/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_ktgrsampah/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_ktgrsampah)
    {
        $data['title'] = 'Edit Kategori Sampah';
        $data['ktgrsampah'] = $this->m_ktgrsampah->get_ktgrsampah_by_id($id_ktgrsampah);

        if ($this->input->post()) {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi'),
                'warna_kategori' => $this->input->post('warna_kategori')
            );
            $this->m_ktgrsampah->update_ktgrsampah($id_ktgrsampah, $data);
            redirect('c_ktgrsampah/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_ktgrsampah/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id_ktgrsampah)
    {
        $this->m_ktgrsampah->delete_ktgrsampah($id_ktgrsampah);
        redirect('c_ktgrsampah/index');
    }
}
?>
