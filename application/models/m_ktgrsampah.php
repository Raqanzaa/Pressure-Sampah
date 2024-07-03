<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ktgrsampah extends CI_Model {

    public function get_categories() {
        return $this->db->get('kategori_sampah')->result_array();
    }

    public function get_kategori_by_id($id) {
        return $this->db->get_where('kategori_sampah', ['id_ktgrsampah' => $id])->row_array();
    }

    public function tambah_kategori() {
        $data = [
            'nama_kategori' => $this->input->post('Nama_Kategori'),
            'deskripsi' => $this->input->post('Deskripsi'),
            'warna_kategori' => $this->input->post('Warna_Kategori')
        ];
        return $this->db->insert('kategori_sampah', $data);
    }

    public function edit_kategori($id) {
        $data = [
            'nama_kategori' => $this->input->post('Nama_Kategori'),
            'deskripsi' => $this->input->post('Deskripsi'),
            'warna_kategori' => $this->input->post('Warna_Kategori')
        ];
        $this->db->where('id_ktgrsampah', $id);
        return $this->db->update('kategori_sampah', $data);
    }

    public function hapus_kategori($id) {
        return $this->db->delete('kategori_sampah', ['id_ktgrsampah' => $id]);
    }

}
