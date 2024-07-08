<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_artikel');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('m_auth');
    }

    // fungsi untuk mengambil data
    public function index()
    {
        $cari = $this->input->get('cari');
        $page = $this->input->get('per_page');
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);

        $search = array('judul' => $cari );

        $batas =  9; // 9 data per page
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'index.php/c_artikel/?cari='.$cari;
        $config['total_rows'] = $this->m_artikel->jumlah_row($search);

        $config['per_page'] = $batas;
        $config['uri_segment'] = $page;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';

        $config['first_link'] = 'first';
        $config['first_tag_open'] = '<li><a>';
        $config['first_tag_close'] = '</a></li>';

        $config['last_link'] = 'last';
        $config['last_tag_open'] = '<li><a>';
        $config['last_tag_close'] = '</a></li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li><a>';
        $config['next_tag_close'] = '</a></li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li><a>';
        $config['prev_tag_close'] = '</a></li>';

        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li><a>';
        $config['num_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();
        $data['jumlah_page'] = $page;

        $data['data'] = $this->m_artikel->get($batas,$offset,$search);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_artikel/read', $data);
        $this->load->view('templates/footer');
    }

    // untuk menampilkan halaman tambah data
    public function tambah()
    {
        $data['title'] = 'Tambah Artikel';
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal_publikasi', 'Tanggal Publikasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Artikel', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_artikel/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->insertdata();
        }
    }

    // untuk memasukan data ke database
    public function insertdata()
    {
        $judul = $this->input->post('judul');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        $deskripsi = $this->input->post('deskripsi');

        // get gambar_artikel
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  // 2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar_artikel']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['gambar_artikel']['name'])) {
            if ($this->upload->do_upload('gambar_artikel')) {
                $gambar = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'tanggal_publikasi' => $tanggal_publikasi,
                    'deskripsi' => $deskripsi,
                    'gambar_artikel' => $gambar['file_name']
                );
                $this->m_artikel->insert($data);
                redirect('artikel-sampah');
            } else {
                die("Gagal upload");
            }
        } else {
            $data = array(
                'judul' => $judul,
                'tanggal_publikasi' => $tanggal_publikasi,
                'deskripsi' => $deskripsi
            );
            $this->m_artikel->insert($data);
            redirect('artikel-sampah');
        }
    }

    // delete
    public function deletedata($id, $gambar)
    {
        $path = './assets/img/';
        @unlink($path.$gambar);

        $where = array('id_artikel' => $id);
        $this->m_artikel->delete($where);
        return redirect('artikel-sampah');
    }

    // edit
    public function edit($id)
    {
        $data['title'] = 'Edit Artikel';
        $kondisi = array('id_artikel' => $id);
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->m_auth->get_user_by_id($user_id);

        $data['data'] = $this->m_artikel->get_by_id($kondisi);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal_publikasi', 'Tanggal Publikasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Artikel', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('v_artikel/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->updatedata();
        }
    }

    // update
    public function updatedata()
    {
        $id = $this->input->post('id_artikel');
        $judul = $this->input->post('judul');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        $deskripsi = $this->input->post('deskripsi');

        $path = './assets/img/';
        $kondisi = array('id_artikel' => $id);

        // get gambar_artikel
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  // 2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar_artikel']['name'];

        $this->upload->initialize($config);

        if (!empty($_FILES['gambar_artikel']['name'])) {
            if ($this->upload->do_upload('gambar_artikel')) {
                $gambar = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'tanggal_publikasi' => $tanggal_publikasi,
                    'deskripsi' => $deskripsi,
                    'gambar_artikel' => $gambar['file_name']
                );
                // hapus gambar pada direktori
                @unlink($path.$this->input->post('filelama'));

                $this->m_artikel->update($data, $kondisi);
                redirect('artikel-sampah');
            } else {
                die("Gagal update");
            }
        } else {
            $data = array(
                'judul' => $judul,
                'tanggal_publikasi' => $tanggal_publikasi,
                'deskripsi' => $deskripsi
            );
            $this->m_artikel->update($data, $kondisi);
            redirect('artikel-sampah');
        }
    }
}
?>
