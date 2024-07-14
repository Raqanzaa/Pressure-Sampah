<?php
class m_artikel extends CI_Model {
    
    // Mendapatkan semua artikel untuk pengguna tertentu
    public function get_all_artikel($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_artikel');
        return $query->result();
    }

    // Mendapatkan artikel dengan paginasi dan pencarian untuk pengguna tertentu
    public function get($limit, $offset, $search, $user_id) {
        $this->db->like($search);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_artikel', $limit, $offset);
        return $query->result();
    }

    // Mendapatkan jumlah artikel untuk pengguna tertentu
    public function jumlah_row($search, $user_id) {
        $this->db->like($search);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_artikel');
        return $query->num_rows();
    }

    // Mendapatkan artikel berdasarkan id untuk pengguna tertentu
    public function get_by_id($id, $user_id) {
        $this->db->where('id_artikel', $id);
        $this->db->where('user_id', $user_id);
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

    // Menghapus artikel
    public function delete($kondisi) {
        $this->db->where($kondisi);
        return $this->db->delete('t_artikel');
    }
}

?>
