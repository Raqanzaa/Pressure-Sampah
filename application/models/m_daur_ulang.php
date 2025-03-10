<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_daur_ulang extends CI_Model {

    private function is_super_user() {
        return $this->session->userdata('user_level') == 1;
    }

    public function get_harian_by_tanggal($tanggal, $tps_id) {
        $this->db->where('tanggal', $tanggal);
        $this->db->where('tps_id', $tps_id);

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id', $user_id);
        }

        $query = $this->db->get('t_daur_ulang');
        return $query->row_array();
    }
    
    public function get_harian_by_id($id) {
        $this->db->select('t_daur_ulang.*, t_tps.nama_tps');
        $this->db->from('t_daur_ulang');
        $this->db->join('t_tps', 't_daur_ulang.tps_id = t_tps.id_tps');
        $this->db->where('t_daur_ulang.id', $id);

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }

        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_daur_ulang_by_tps_id($tps_id) {
        $this->db->select('t_daur_ulang.*, t_ktgrsampah.nama_kategori');
        $this->db->from('t_daur_ulang');
        $this->db->join('t_ktgrsampah', 't_daur_ulang.kategori_id = t_ktgrsampah.id_ktgrsampah', 'left');
        $this->db->where('t_daur_ulang.tps_id', $tps_id);

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }

        return $this->db->get()->result_array();
    }    

    public function insert_harian($data) {
        if (!$this->is_super_user()) {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $this->db->insert('t_daur_ulang', $data);
    }
    
    public function update_harian($id, $data) {
        $this->db->set($data);
        $this->db->where('id', $id);
    
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id', $user_id);
        }
    
        return $this->db->update('t_daur_ulang');
    }    

    public function delete_harian($id) {
        $this->db->where('id', $id);

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('user_id', $user_id);
        }

        $this->db->delete('t_daur_ulang');
    }
    
    public function get_mingguan($minggu_ke, $tahun) {
        $this->db->select('t_mingguan.*, t_tps.nama_tps, t_ktgrsampah.nama_kategori');
        $this->db->from('t_mingguan');
        $this->db->join('t_tps', 't_mingguan.tps_id = t_tps.id_tps');
        $this->db->join('t_ktgrsampah', 't_mingguan.kategori_id = t_ktgrsampah.id_ktgrsampah');
        $this->db->where('minggu_ke', $minggu_ke);
        $this->db->where('tahun', $tahun);

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_mingguan.user_id', $user_id);
        }

        return $this->db->get()->result_array();
    }

    public function get_daur_ulang_bulanan() {
        $this->db->select('t_bulanan.*, t_tps.nama_tps, t_ktgrsampah.nama_kategori');
        $this->db->from('t_bulanan');
        $this->db->join('t_tps', 't_bulanan.tps_id = t_tps.id_tps');
        $this->db->join('t_ktgrsampah', 't_bulanan.kategori_id = t_ktgrsampah.id_ktgrsampah');

        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_bulanan.user_id', $user_id); 
        }

        return $this->db->get()->result_array();
    }

    public function accumulate_mingguan($data) {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('minggu_ke', $data['minggu_ke']);
        $this->db->where('tahun', $data['tahun']);
        $this->db->where('kategori_id', $data['kategori_id']);
        $this->db->where('tps_id', $data['tps_id']);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_mingguan');
    
        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $data['residu']
            );
    
            $this->db->where('id', $existing_data['id']);
            $this->db->update('t_mingguan', $update_data);
        } else {
            $data['user_id'] = $user_id;
            $this->db->insert('t_mingguan', $data);
        }
    }

    public function accumulate_bulanan($data) {
        $user_id = $this->session->userdata('user_id');
        $this->db->where('bulan', $data['bulan']);
        $this->db->where('tahun', $data['tahun']);
        $this->db->where('kategori_id', $data['kategori_id']);
        $this->db->where('tps_id', $data['tps_id']);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_bulanan');

        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $data['residu']
            );
            $this->db->where('id', $existing_data['id']);
            $this->db->update('t_bulanan', $update_data);
        } else {
            $data['user_id'] = $user_id;
            $this->db->insert('t_bulanan', $data);
        }
    }

    public function accumulate_update_mingguan($tanggal, $tps_id, $diff_data) {
        $user_id = $this->session->userdata('user_id');
        $tanggal_obj = new DateTime($tanggal);
        $minggu_ke = (int)$tanggal_obj->format("W"); // Menggunakan minggu ISO-8601
        $tahun = $tanggal_obj->format("Y");
    
        echo "Minggu ke: " . $minggu_ke . ", Tahun: " . $tahun . ", TPS ID: " . $tps_id . ", User ID: " . $user_id;
        print_r($diff_data);
    
        $this->db->where('minggu_ke', $minggu_ke);
        $this->db->where('tahun', $tahun);
        $this->db->where('tps_id', $tps_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_mingguan');
    
        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $diff_data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $diff_data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $diff_data['residu']
            );
    
            echo "Existing Data: ";
            print_r($existing_data);
            echo "Update Data: ";
            print_r($update_data);
    
            $this->db->where('id', $existing_data['id']);
            $this->db->update('t_mingguan', $update_data);
        } else {
            echo "No existing data found for update.";
        }
    }
    
    
    public function accumulate_update_bulanan($tanggal, $tps_id, $diff_data) {
        $user_id = $this->session->userdata('user_id');
        $tanggal_obj = new DateTime($tanggal);
        $bulan = $tanggal_obj->format("m");
        $tahun = $tanggal_obj->format("Y");
    
        $this->db->where('bulan', $bulan);
        $this->db->where('tahun', $tahun);
        $this->db->where('tps_id', $tps_id);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_bulanan');
    
        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $diff_data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $diff_data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $diff_data['residu']
            );
            $this->db->where('id', $existing_data['id']);
            $this->db->update('t_bulanan', $update_data);
        }
    }

    public function accumulate_delete_mingguan($data) {
        $this->db->where('minggu_ke', $data['minggu_ke']);
        $this->db->where('tahun', $data['tahun']);
        $this->db->where('kategori_id', $data['kategori_id']);
        $this->db->where('tps_id', $data['tps_id']);
        $query = $this->db->get('t_mingguan');
    
        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $data['residu']
            );
    
            if ($update_data['berat_total'] <= 0 && $update_data['berat_daur_ulang'] <= 0 && $update_data['residu'] <= 0) {
                $this->db->where('id', $existing_data['id']);
                $this->db->delete('t_mingguan');
            } else {
                $update_data['berat_total'] = max(0, $update_data['berat_total']);
                $update_data['berat_daur_ulang'] = max(0, $update_data['berat_daur_ulang']);
                $update_data['residu'] = max(0, $update_data['residu']);
                $this->db->where('id', $existing_data['id']);
                $this->db->update('t_mingguan', $update_data);
            }
        }
    }
    
    public function accumulate_delete_bulanan($data) {
        $this->db->where('bulan', $data['bulan']);
        $this->db->where('tahun', $data['tahun']);
        $this->db->where('kategori_id', $data['kategori_id']);
        $this->db->where('tps_id', $data['tps_id']);
        $query = $this->db->get('t_bulanan');
    
        if ($query->num_rows() > 0) {
            $existing_data = $query->row_array();
            $update_data = array(
                'berat_total' => $existing_data['berat_total'] + $data['berat_total'],
                'berat_daur_ulang' => $existing_data['berat_daur_ulang'] + $data['berat_daur_ulang'],
                'residu' => $existing_data['residu'] + $data['residu']
            );
    
            if ($update_data['berat_total'] <= 0 && $update_data['berat_daur_ulang'] <= 0 && $update_data['residu'] <= 0) {
                $this->db->where('id', $existing_data['id']);
                $this->db->delete('t_bulanan');
            } else {
                $update_data['berat_total'] = max(0, $update_data['berat_total']);
                $update_data['berat_daur_ulang'] = max(0, $update_data['berat_daur_ulang']);
                $update_data['residu'] = max(0, $update_data['residu']);
                $this->db->where('id', $existing_data['id']);
                $this->db->update('t_bulanan', $update_data);
            }
        }
    }

    public function get_all_daur_ulang($user_id) {
        $this->db->select('t_bulanan.*, t_tps.nama_tps, t_ktgrsampah.nama_kategori, t_bulanan.bulan, t_bulanan.tahun, t_users.full_name');
        $this->db->from('t_bulanan');
        $this->db->join('t_tps', 't_bulanan.tps_id = t_tps.id_tps');
        $this->db->join('t_users', 't_bulanan.user_id = t_users.id');
        $this->db->join('t_ktgrsampah', 't_bulanan.kategori_id = t_ktgrsampah.id_ktgrsampah');
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_bulanan.user_id', $user_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_harian($user_id, $tanggal) {
        $this->db->select('t_daur_ulang.*, t_tps.nama_tps, t_ktgrsampah.nama_kategori');
        $this->db->from('t_daur_ulang');
        $this->db->join('t_tps', 't_daur_ulang.tps_id = t_tps.id_tps');
        $this->db->join('t_ktgrsampah', 't_daur_ulang.kategori_id = t_ktgrsampah.id_ktgrsampah');
        $this->db->where('tanggal', $tanggal);
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_data_bulanan($user_id ,$bulan, $tahun) {
        $this->db->select('tanggal', 't_users.full_name');
        $this->db->from('t_daur_ulang');
        $this->db->join('t_users', 't_daur_ulang.user_id = t_users.id');
        $this->db->where('MONTH(tanggal)', $bulan);
        $this->db->where('YEAR(tanggal)', $tahun);
        if (!$this->is_super_user()) {
            $user_id = $this->session->userdata('user_id');
            $this->db->where('t_daur_ulang.user_id', $user_id);
        }
        return $this->db->get()->result_array();
    }
    
}
?>
