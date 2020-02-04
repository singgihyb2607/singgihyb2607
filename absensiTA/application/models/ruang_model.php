<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ruang_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	// listing all ruang
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('ruang');
		$this->db->order_by('id_ruang','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail ruang
	public function detail($id_ruang)
	{
		$this->db->select('*');
		$this->db->from('ruang');
		$this->db->where('id_ruang', $id_ruang);
		$this->db->order_by('id_ruang','desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// tambah
	public function tambah($data)
	{
		$this->db->insert('ruang', $data);
	}
    
    // edit
    public function edit($data)
    {
    	$this->db->where('id_ruang', $data['id_ruang']);
    	$this->db->update('ruang', $data);
    }

    // delete
    public function delete($data)
    {
    	$this->db->where('id_ruang', $data['id_ruang']);
    	$this->db->delete('ruang', $data);
    }
}
?>
