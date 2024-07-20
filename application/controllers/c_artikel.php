<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_artikel extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_artikel');
        $this->load->library('upload');
        $this->load->library('pagination');
        $this->load->model('M_auth');
    }

    // Fungsi untuk mengambil data
    public function index()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $cari = $this->input->get('cari');
        $page = $this->input->get('per_page');
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->M_auth->get_user_by_id($user_id);
        $data['artikel'] = $this->M_artikel->get_all_artikel($user_id);

        $search = array('judul' => $cari);

        $batas = 9; // 9 data per halaman
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'index.php/C_artikel/?cari='.$cari;
        $config['total_rows'] = $this->M_artikel->jumlah_row($search, $user_id);

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

        $data['data'] = $this->M_artikel->get($batas, $offset, $search, $user_id);

        $data['cari'] = $cari;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('v_artikel/read', $data);
        $this->load->view('templates/footer');
    }

    // Fungsi untuk menampilkan halaman tambah data
    public function tambah()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }

        $data['title'] = 'Tambah Artikel';
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->M_auth->get_user_by_id($user_id);

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

    // Fungsi untuk memasukan data ke database
    public function insertdata()
    {
        $judul = $this->input->post('judul');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        $deskripsi = $this->input->post('deskripsi');

        // Mengambil gambar_artikel
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
                    'gambar_artikel' => $gambar['file_name'],
                    'user_id' => $this->session->userdata('user_id')
                );
                $this->M_artikel->insert($data);
                redirect('artikel-sampah');
            } else {
                die("Gagal upload");
            }
        } else {
            $data = array(
                'judul' => $judul,
                'tanggal_publikasi' => $tanggal_publikasi,
                'deskripsi' => $deskripsi,
                'user_id' => $this->session->userdata('user_id')
            );
            $this->M_artikel->insert($data);
            redirect('artikel-sampah');
        }
    }

    // Fungsi untuk menampilkan halaman edit
    public function edit($id)
    {
        $data['title'] = 'Edit Artikel';
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->M_auth->get_user_by_id($user_id);
        $data['data'] = $this->M_artikel->get_by_id($id, $user_id);

        // Set rules for form validation
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

    // Fungsi untuk mengupdate data artikel
    public function updatedata()
    {
        $id = $this->input->post('id_artikel');
        $judul = $this->input->post('judul');
        $tanggal_publikasi = $this->input->post('tanggal_publikasi');
        $deskripsi = $this->input->post('deskripsi');

        // Configuration for file upload
        $config['upload_path'] = './assets/img';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
        $config['max_size'] = '2048';  // 2MB max
        $config['max_width'] = '4480'; // pixel
        $config['max_height'] = '4480'; // pixel
        $config['file_name'] = $_FILES['gambar_artikel']['name'];

        $this->upload->initialize($config);

        // Check if a new image file is uploaded
        if (!empty($_FILES['gambar_artikel']['name'])) {
            if ($this->upload->do_upload('gambar_artikel')) {
                $gambar = $this->upload->data();
                $data = array(
                    'judul' => $judul,
                    'tanggal_publikasi' => $tanggal_publikasi,
                    'deskripsi' => $deskripsi,
                    'gambar_artikel' => $gambar['file_name']
                );
                $this->M_artikel->update($data, array('id_artikel' => $id));
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
            $this->M_artikel->update($data, array('id_artikel' => $id));
            redirect('artikel-sampah');
        }
    }

    public function deletedata($id, $gambar = null)
    {
        // Periksa level user
        $user_id = $this->session->userdata('user_id');
        $is_super_user = $this->M_auth->is_super_user($user_id); // Pastikan metode ini ada di model M_auth

        if ($is_super_user) {
            $this->hapus_data($id, $gambar);
        } else {
            $artikel = $this->M_artikel->get_by_id($id, $user_id);
            if ($artikel) {
                $this->hapus_data($id, $artikel->gambar_artikel);
            } else {
                redirect('artikel-sampah');
            }
        }
    }

    private function hapus_data($id, $gambar = null)
    {
        if ($gambar) {
            $path = './assets/img/' . $gambar;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->M_artikel->delete(array('id_artikel' => $id));
        redirect('artikel-sampah');
    }
}

?>
