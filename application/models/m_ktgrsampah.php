<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ktgrsampah extends CI_Model {

    public function __construct() {
        parent::__construct();
        // Load database jika diperlukan
        $this->load->database();
    }

    public function get_categories() {
        // Method untuk mendapatkan semua kategori sampah
        $query = $this->db->get('kategori_sampah'); // Ganti 'kategori_sampah' dengan nama tabel yang sesuai
        return $query->result();
    }

    public function get_category($id) {
        // Method untuk mendapatkan detail kategori berdasarkan ID
        $query = $this->db->get_where('kategori_sampah', array('id' => $id));
        return $query->row();
    }

    public function tambah_category($data) {
        // Method untuk menambahkan kategori baru
        $this->db->insert('kategori_sampah', $data);
        return $this->db->insert_id();
    }

    public function update_category($id, $data) {
        // Method untuk memperbarui kategori berdasarkan ID
        $this->db->where('id', $id);
        $this->db->update('kategori_sampah', $data);
    }

    public function hapus_category($id) {
        // Method untuk menghapus kategori berdasarkan ID
        $this->db->delete('kategori_sampah', array('id' => $id));
    }

    // Tambahkan method lainnya sesuai kebutuhan

}
