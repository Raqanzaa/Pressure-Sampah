<?php
class m_ktgrsampah extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Mendapatkan semua data kategori sampah
    public function get_all_ktgrsampah() {
        $query = $this->db->get('t_ktgrsampah');
        return $query->result_array();
    }

    // Mendapatkan data kategori sampah berdasarkan ID
    public function get_ktgrsampah_by_id($id) {
        $query = $this->db->get_where('t_ktgrsampah', array('id_ktgrsampah' => $id));
        return $query->row_array();
    }

    // Menambahkan data kategori sampah baru
    public function insert_ktgrsampah($data) {
        return $this->db->insert('t_ktgrsampah', $data);
    }

    // Memperbarui data kategori sampah berdasarkan ID
    public function update_ktgrsampah($id, $data) {
        $this->db->where('id_ktgrsampah', $id);
        return $this->db->update('t_ktgrsampah', $data);
    }

    // Menghapus data kategori sampah berdasarkan ID
    public function delete_ktgrsampah($id) {
        $this->db->where('id_ktgrsampah', $id);
        return $this->db->delete('t_ktgrsampah');
    }
}
?>