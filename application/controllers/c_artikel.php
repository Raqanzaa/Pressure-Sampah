<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
    }    

    public function index()
    {
        $data['title'] = 'Daftar Artikel';
        $data['artikel'] = $this->m_artikel->get_all_artikel();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_artikel/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        // Proses form submission
        if ($this->input->post()) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'id_user' => $this->input->post('id_user'),
                'tanggal_dibuat' => date('d-m-Y'),
                'tanggal_diperbarui' => date('d-m-Y')
            );
            // Panggil model untuk menyimpan data artikel
            $this->m_artikel->insert_artikel($data);
    
            // Redirect ke halaman daftar artikel setelah berhasil menyimpan
            redirect('c_artikel/index');
        }
    
        // Load view untuk form tambah artikel
        $data['users'] = $this->m_artikel->get_all_users(); // Ambil data penulis untuk dropdown
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_artikel/create', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_artikel)
    {
        $data['title'] = 'Edit Artikel';
        $data['artikel'] = $this->m_artikel->get_artikel_by_id($id_artikel);

        if ($this->input->post()) {
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'tanggal_diperbarui' => date('d-m-Y')
            );
            $this->m_artikel->update_artikel($id_artikel, $data);
            redirect('c_artikel/index');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/sidebar');
        $this->load->view('v_artikel/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete($id_artikel)
    {
        $this->m_artikel->delete_artikel($id_artikel);
        redirect('c_artikel/index');
    }
}
?>
