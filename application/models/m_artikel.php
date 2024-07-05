<?php
class m_artikel extends CI_Model
{
  // Retrieve data with optional limits and search criteria
  public function get($batas = NULL, $offset = NULL, $cari = NULL)
  {
    if ($batas != NULL) {
      $this->db->limit($batas, $offset);
    }
    if ($cari != NULL) {
      $this->db->or_like($cari);
    }
    $this->db->from('artikel');
    $query = $this->db->get();
    return $query->result();
  }

  // Count the number of rows matching the search criteria
  public function jumlah_row($search)
  {
    $this->db->or_like($search);
    $query = $this->db->get('artikel');
    return $query->num_rows();
  }

  // Retrieve a single row by ID
  public function get_by_id($kondisi)
  {
    $this->db->from('artikel');
    $this->db->where($kondisi);
    $query = $this->db->get();
    return $query->row();
  }

  // Insert data into the table
  public function insert($data)
  {
    $this->db->insert('artikel', $data);
    return TRUE;
  }

  // Delete data from the table
  public function delete($where)
  {
    $this->db->where($where);
    $this->db->delete('artikel');
    return TRUE;
  }

  // Update data in the table
  public function update($data, $kondisi)
  {
    $this->db->update('artikel', $data, $kondisi);
    return TRUE;
  }
}
?>
