<?php 

class m_mahasiswa extends CI_model
{
    public function getAllMahasiswa()
    {
        return $query = $this->db->get('t_mahasiswa')->result_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = array(
            "nama_mhs" => $this->input->post('nama_mhs', true),
            "nim_mhs" => $this->input->post('nim_mhs', true),
            "email_mhs" => $this->input->post('email_mhs', true),
            "jurusan_mhs" => $this->input->post('jurusan_mhs', true),
    );
    
    $this->db->insert('t_mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_mahasiswa');
    }
}

; ?>
