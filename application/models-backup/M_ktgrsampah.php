<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ktgrsampah extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all_ktgrsampah($user_id) {
        $this->db->select('id_ktgrsampah, nama_kategori, deskripsi, warna_kategori'); // Added deskripsi here
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_ktgrsampah');
        return $query->result_array();
    }
    
    public function get_ktgrsampah($id_ktgrsampah) {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        $query = $this->db->get('t_ktgrsampah');
        return $query->row_array();
    }

    public function insert_ktgrsampah($data) {
        return $this->db->insert('t_ktgrsampah', $data);
    }

    public function update_ktgrsampah($id_ktgrsampah, $data) {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        return $this->db->update('t_ktgrsampah', $data);
    }

    public function delete_ktgrsampah($id_ktgrsampah) {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        return $this->db->delete('t_ktgrsampah');
    }
}
?>
