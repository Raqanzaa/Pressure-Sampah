<?php
class m_home extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_total_sampah($user_id)
    {
        $this->db->select_sum('berat_total');
        $this->db->where('t_daur_ulang.user_id', $user_id);
        $query = $this->db->get('t_daur_ulang');
        $result = $query->row_array();
        return $result['berat_total'];
    }

    public function get_total_daur_ulang($user_id)
    {
       $this->db->select_sum('berat_daur_ulang');
       $this->db->where('t_daur_ulang.user_id', $user_id);
       $query = $this->db->get('t_daur_ulang');
       $result = $query->row_array();
       return $result['berat_daur_ulang'];
    }

    public function get_total_residu($user_id)
    {
        $this->db->select_sum('residu');
        $this->db->where('t_daur_ulang.user_id', $user_id);
        $query = $this->db->get('t_daur_ulang');
        $result = $query->row_array();
        return $result['residu'];
    }
    
        public function get_data_harian($user_id, $kategori_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_daur_ulang');
            $this->db->where('user_id', $user_id);
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            $this->db->where('tanggal', date('Y-m-d')); // Hanya untuk data hari ini
            $query = $this->db->get();
            return $query->row_array();
        }
        
        public function get_data_mingguan($user_id, $kategori_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_mingguan');
            $this->db->where('user_id', $user_id);
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            $this->db->where('tahun', date('Y'));
            $this->db->where('minggu_ke', date('W'));
            $query = $this->db->get();
            return $query->row_array();
        }
    
        public function get_data_bulanan($user_id, $kategori_id = null) {
            $this->db->select('SUM(berat_total) as total, SUM(berat_daur_ulang) as daur_ulang, SUM(residu) as residu');
            $this->db->from('t_bulanan');
            $this->db->where('user_id', $user_id);
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            $this->db->where('tahun', date('Y'));
            $this->db->where('bulan', date('m'));
            $query = $this->db->get();
            return $query->row_array();
        }
    
        public function get_data_per_bulan_by_kategori($user_id, $kategori_id) {
            $this->db->select('MONTH(tanggal) as bulan, SUM(berat_total) as total_sampah, SUM(berat_daur_ulang) as total_daur_ulang, SUM(residu) as total_residu');
            $this->db->from('t_daur_ulang');
            $this->db->where('user_id', $user_id);
            if ($kategori_id) {
                $this->db->where('kategori_id', $kategori_id);
            }
            $this->db->group_by('bulan');
            $query = $this->db->get();
            return $query->result_array();
        }
    }
