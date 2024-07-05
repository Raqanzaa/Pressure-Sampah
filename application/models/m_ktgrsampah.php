<?php
class M_ktgrsampah extends CI_Model {

    public function get_all_ktgrsampah()
    {
        return $this->db->get('kategori_sampah')->result();
    }

    public function get_ktgrsampah_by_id($id_ktgrsampah)
    {
        return $this->db->get_where('kategori_sampah', array('id_ktgrsampah' => $id_ktgrsampah))->row();
    }

    public function insert_ktgrsampah($data)
    {
        $this->db->insert('kategori_sampah', $data);
    }

    public function update_ktgrsampah($id_ktgrsampah, $data)
    {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        $this->db->update('kategori_sampah', $data);
    }

    public function delete_ktgrsampah($id_ktgrsampah)
    {
        $this->db->where('id_ktgrsampah', $id_ktgrsampah);
        $this->db->delete('kategori_sampah');
    }
}
?>
