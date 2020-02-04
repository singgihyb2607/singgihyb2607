<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class matkul_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	// listing all matkul
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->order_by('id_matkul','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail matkul
	public function detail($id_matkul)
	{
		$this->db->select('*');
		$this->db->from('matkul');
		$this->db->where('id_matkul', $id_matkul);
		$this->db->order_by('id_matkul','desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// tambah
	public function tambah($data)
	{
		$this->db->insert('matkul', $data);
	}
    
    // edit
    public function edit($data)
    {
    	$this->db->where('id_matkul', $data['id_matkul']);
    	$this->db->update('matkul', $data);
    }

    // delete
    public function delete($data)
    {
    	$this->db->where('id_matkul', $data['id_matkul']);
    	$this->db->delete('matkul', $data);
    }
}
?>
