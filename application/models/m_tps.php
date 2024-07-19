<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tps extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua data TPS berdasarkan user ID
    public function get_all_tps($user_id) {
        $this->db->select('t_tps.*, t_users.full_name');
        $this->db->from('t_tps');
        $this->db->join('t_users', 't_tps.user_id = t_users.id');
        $this->db->where('t_tps.user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_tps_by_id($tps_id) {
        $this->db->where('id_tps', $tps_id);
        $query = $this->db->get('t_tps'); // Ganti 'tps' dengan nama tabel TPS yang sesuai di database Anda
        return $query->row_array();
    }

    // Fungsi untuk mengambil satu data TPS
    public function get_tps($id_tps) {
        $this->db->select('t_tps.*, t_users.full_name');
        $this->db->from('t_tps');
        $this->db->join('t_users', 't_tps.user_id = t_users.id');
        $this->db->where('t_tps.id_tps', $id_tps);
        $query = $this->db->get();
        return $query->row_array();
    }

    // Fungsi untuk menambah data TPS
    public function insert_tps($data) {
        return $this->db->insert('t_tps', $data);
    }

    // Fungsi untuk mengupdate data TPS
    public function update_tps($id_tps, $data) {
        $this->db->where('id_tps', $id_tps);
        return $this->db->update('t_tps', $data);
    }

    // Fungsi untuk menghapus data TPS
    public function delete_tps($id_tps) {
        $this->db->where('id_tps', $id_tps);
        return $this->db->delete('t_tps');
    }
}
?>
