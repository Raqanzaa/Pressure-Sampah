<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_landing extends CI_Model {

    // Dapatkan jumlah TPS
    public function get_tps_count($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->from('t_tps');
        return $this->db->count_all_results();
    }

    // Dapatkan jumlah jenis sampah
    public function get_jenis_sampah_count($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->from('t_ktgrsampah');
        return $this->db->count_all_results();
    }

    // Dapatkan total sampah dikumpulkan
    public function get_sampah_dikumpulkan($user_id) {
        $this->db->select_sum('berat_total');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->berat_total;
    }

    // Dapatkan jumlah kategori sampah
    public function get_kategori_sampah_count($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->from('t_ktgrsampah');
        return $this->db->count_all_results();
    }

    // Dapatkan total sampah didaur ulang
    public function get_sampah_didaur_ulang($user_id) {
        $this->db->select_sum('berat_daur_ulang');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->berat_daur_ulang;
    }

    // Dapatkan total residu
    public function get_residu($user_id) {
        $this->db->select_sum('residu');
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->residu;
    }
}
?>
