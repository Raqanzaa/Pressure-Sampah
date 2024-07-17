<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_landing extends CI_Model {

    // Dapatkan jumlah TPS
    public function get_tps_count() {
        return $this->db->count_all('t_tps');
    }

    // Dapatkan jumlah jenis sampah
    public function get_jenis_sampah_count() {
        return $this->db->count_all('t_ktgrsampah');
    }

    // Dapatkan total sampah dikumpulkan
    public function get_sampah_dikumpulkan() {
        $this->db->select_sum('berat_total');
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->berat_total;
    }

    // Dapatkan jumlah kategori sampah
    public function get_kategori_sampah_count() {
        return $this->db->count_all('t_ktgrsampah');
    }

    // Dapatkan total sampah didaur ulang
    public function get_sampah_didaur_ulang() {
        $this->db->select_sum('berat_daur_ulang');
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->berat_daur_ulang;
    }

    // Dapatkan total residu
    public function get_residu() {
        $this->db->select_sum('residu');
        $result = $this->db->get('t_daur_ulang')->row();
        return $result->residu;
    }
}

?>
