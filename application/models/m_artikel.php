<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_artikel extends CI_Model {

    public function get_all_articles()
    {
        $this->db->select('a.*, u.full_name as author_name');
        $this->db->from('artikel a');
        $this->db->join('t_users u', 'a.author_id = u.id_users');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_article_by_id($id)
    {
        $this->db->select('a.*, u.full_name as author_name');
        $this->db->from('artikel a');
        $this->db->join('t_users u', 'a.author_id = u.id_users');
        $this->db->where('a.id_artikel', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function insert_article($data)
    {
        return $this->db->insert('artikel', $data);
    }

    public function update_article($id, $data)
    {
        $this->db->where('id_artikel', $id);
        return $this->db->update('artikel', $data);
    }

    public function delete_article($id)
    {
        $this->db->where('id_artikel', $id);
        return $this->db->delete('artikel');
    }
}
