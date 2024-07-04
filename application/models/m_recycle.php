<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_recycle extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Ambil semua data daur ulang
    public function get_all_recycles() {
        return $this->db->get('recycle')->result();
    }

    // Simpan data daur ulang baru
    public function insert_recycle($data) {
        return $this->db->insert('recycle', $data);
    }

    // Ambil data daur ulang berdasarkan ID
    public function get_recycle_by_id($id) {
        return $this->db->get_where('recycle', array('id_data' => $id))->row();
    }

    // Update data daur ulang
    public function update_recycle($id, $data) {
        $this->db->where('id_data', $id);
        return $this->db->update('recycle', $data);
    }

    // Hapus data daur ulang
    public function delete_recycle($id) {
        return $this->db->delete('recycle', array('id_data' => $id));
    }
}
?>
