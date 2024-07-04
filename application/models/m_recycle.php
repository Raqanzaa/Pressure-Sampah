<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_recycle extends CI_Model {

    public function get_all_recycles() {
        $this->db->select('r.*, s.nama_sampah, t.Nama_TPS as nama_tps');
        $this->db->from('recycle r');
        $this->db->join('sampah s', 'r.id_sampah = s.ID_Sampah');
        $this->db->join('tps t', 'r.id_tps = t.ID_TPS');
        $query = $this->db->get();
        return $query->result();
    }

    // Metode lain di model ini
}
?>
