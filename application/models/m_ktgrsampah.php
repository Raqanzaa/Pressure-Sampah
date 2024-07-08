<?php
class m_ktgrsampah extends CI_Model {

    public function get_all_ktgrsampah($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('t_ktgrsampah');
        return $query->result_array();
    }

    public function get_ktgrsampah_by_id($id_ktgrsampah, $user_id) {
        $query = $this->db->get_where('t_ktgrsampah', array('id_ktgrsampah' => $id_ktgrsampah, 'user_id' => $user_id));
        return $query->row_array();
    }

    public function insert_ktgrsampah($data) {
        return $this->db->insert('t_ktgrsampah', $data);
    }

    public function update_ktgrsampah($id_ktgrsampah, $data) {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        return $this->db->update('t_ktgrsampah', $data);
    }      

    public function delete_ktgrsampah($id_ktgrsampah, $user_id) {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        $this->db->where('user_id', $user_id);
        return $this->db->delete('t_ktgrsampah');
    }
}
?>
