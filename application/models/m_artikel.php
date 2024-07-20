<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_artikel extends CI_Model {

    // Mendapatkan semua artikel untuk pengguna tertentu
    public function get_all_artikel($user_id) {
        if (!$this->is_super_user()) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get('t_artikel');
        return $query->result();
    }

    // Mendapatkan semua artikel tanpa memfilter user_id
    public function get_all_articles() {
        $this->db->select('artikel.*, t_users.full_name');
        $this->db->from('t_artikel artikel');
        $this->db->join('t_users', 'artikel.user_id = t_users.id');
        $this->db->order_by('artikel.tanggal_publikasi', 'DESC');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Mendapatkan artikel dengan paginasi dan pencarian untuk pengguna tertentu
    public function get($limit, $offset, $search, $user_id) {
        $this->db->like($search);
        if (!$this->is_super_user()) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get('t_artikel', $limit, $offset);
        return $query->result();
    }

    // Mendapatkan jumlah artikel untuk pengguna tertentu
    public function jumlah_row($search, $user_id) {
        $this->db->like($search);
        if (!$this->is_super_user()) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get('t_artikel');
        return $query->num_rows();
    }

    // Mendapatkan artikel berdasarkan id untuk pengguna tertentu
    public function get_by_id($id, $user_id) {
        $this->db->where('id_artikel', $id);
        if (!$this->is_super_user()) {
            $this->db->where('user_id', $user_id);
        }
        $query = $this->db->get('t_artikel');
        return $query->row();
    }

    // Menambahkan artikel baru
    public function insert($data) {
        return $this->db->insert('t_artikel', $data);
    }

    // Mengupdate artikel
    public function update($data, $kondisi) {
        $this->db->where($kondisi);
        return $this->db->update('t_artikel', $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        return $this->db->delete('t_artikel');
    }

    private function is_super_user() {
        return $this->session->userdata('user_level') == 1;
    }
}
?>
