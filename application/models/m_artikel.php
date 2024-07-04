<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_artikel extends CI_Model {
    
    public function get_all_articles() {
        $this->db->select('a.*, u.full_name as author_name');
        $this->db->from('artikel a');
        $this->db->join('t_users u', 'a.author_id = u.id');
        $query = $this->db->get();
        return $query->result();
    }

    // Metode lain di model ini
}
