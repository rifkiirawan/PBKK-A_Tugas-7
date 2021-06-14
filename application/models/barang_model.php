<?php 

/**
* Hasil Model untuk keperluan pengumuman
*/
class Barang_Model extends CI_Model
{
	private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }
    
    public function getBarang()
    {
        $this->db->from('barang');
        $query = $this->db->get();
        return $query->result();
    }

    public function getBarangSpesific($id)
    {
        $this->db->from('barang');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function insertBarang($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function updateBarang($data,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update('barang', $data);
    }

    public function deleteBarang($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('barang');
    }
}