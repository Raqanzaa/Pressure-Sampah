<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_artikel extends CI_Model {

    public function get_all_artikel()
    {
        return $this->db->get('artikel')->result();
    }

    public function insert_artikel($data)
    {
        return $this->db->insert('artikel', $data);
    }

    public function get_artikel_by_id($id_artikel)
    {
        return $this->db->get_where('artikel', array('id_artikel' => $id_artikel))->row();
    }

    public function update_artikel($id_artikel, $data)
    {
        $this->db->where('id_artikel', $id_artikel);
        return $this->db->update('artikel', $data);
    }

    public function delete_artikel($id_artikel)
    {
        return $this->db->delete('artikel', array('id_artikel' => $id_artikel));
    }

    // Fungsi untuk mengambil semua data pengguna
    public function get_all_users()
    {
        return $this->db->get('t_users')->result_array();
    }
}
?>
