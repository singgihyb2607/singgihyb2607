<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// detail jadwal
	public function listing_jadwal()
	{
		$this->db->select('jadwal.*,
						mahasiswa.npm,
						matkul.nama_matkul,
						ruang.nama_ruang,
						COUNT(jadwal.id_jadwal) AS jadwal');
		$this->db->from('jadwal');

		// join
		$this->db->join('mahasiswa', 'mahasiswa.kode_mhs = jadwal.kode_mhs', 'left');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul', 'left');
		$this->db->join('ruang', 'ruang.id_ruang = jadwal.id_ruang', 'left');
		// end join
		$this->db->group_by('jadwal.id_jadwal');
		// $this->db->order_by('jadwal.npm','asc');
		$this->db->order_by('jadwal.kode_mhs','asc');
		$this->db->order_by('jadwal.hari','desc');
		$this->db->order_by('jadwal.j_mulai','asc');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->order_by('id_jadwal','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// tambah jadwal
	public function tambah($data)
	{
		$this->db->insert('jadwal', $data);
	}

    // delete jadwal
    public function delete($data)
    {
    	$this->db->where('id_jadwal', $data['id_jadwal']);
    	$this->db->delete('jadwal', $data);
    }
}
?>
