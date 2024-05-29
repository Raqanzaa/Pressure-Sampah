<?php 


class c_mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_mahasiswa');
    }
    public function Index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['d_mahasiswa'] = $this->m_mahasiswa->getAllMahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('v_mahasiswa/index');
        $this->load->view('templates/footer');
    }
    
    public function create()
    {
        $data['judul'] = 'Form Tambah Data';
        
        //Teks Errors
        $this->form_validation->set_rules('nama_mhs', 'Name', 'required'); 
        $this->form_validation->set_rules('nim_mhs', 'NIM', 'required|numeric'); 
        $this->form_validation->set_rules('email_mhs', 'Email', 'required|valid_email'); 

        if ($this->form_validation->run() == false) {
            # code...
            $this->load->view('templates/header', $data);
            $this->load->view('v_mahasiswa/create');
            $this->load->view('templates/footer');
        } else {
            # code...
            $this->m_mahasiswa->tambahDataMahasiswa();
            $this->session->set_flashdata('success', 'Ditambahkan');
            redirect('c_mahasiswa');
        }
    }

    public function delete($id)
    {
        $this->m_mahasiswa->hapusDataMahasiswa($id);
        $this->session->set_flashdata('success', 'Dihapus');
        redirect('c_mahasiswa');
    }
}

; ?>
