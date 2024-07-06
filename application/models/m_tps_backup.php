<?php
class m_tps extends CI_Model {

    public function get_all_tps()
    {
        return $this->db->get('tps')->result();
    }

    public function get_tps_by_id($id_tps)
    {
        return $this->db->get_where('tps', array('ID_TPS' => $id_tps))->row();
    }

    public function insert_tps($data)
    {
        $this->db->insert('tps', $data);
    }

    public function update_tps($id_tps, $data)
    {
        $this->db->where('ID_TPS', $id_tps);
        $this->db->update('tps', $data);
    }

    public function delete_tps($id_tps)
    {
        $this->db->where('ID_TPS', $id_tps);
        $this->db->delete('tps');
    }
}
?>
