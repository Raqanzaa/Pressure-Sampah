<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Daftar Artikel';
        $data['articles'] = $this->m_artikel->get_all_articles();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_artikel/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Artikel';

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('author_id', 'Author', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_artikel/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $article_data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'author_id' => $this->input->post('author_id')
            ];
            $this->m_artikel->insert_article($article_data);
            redirect('c_artikel/index');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Artikel';
        $data['article'] = $this->m_artikel->get_article_by_id($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('author_id', 'Author', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_artikel/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $article_data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'author_id' => $this->input->post('author_id')
            ];
            $this->m_artikel->update_article($id, $article_data);
            redirect('c_artikel/index');
        }
    }

    public function hapus($id)
    {
        $this->m_artikel->delete_article($id);
        redirect('c_artikel/index');
    }
}
