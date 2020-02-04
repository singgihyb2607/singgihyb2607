<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class absen_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// detail absen
	public function listing()
	{
		$this->db->select('absen.*,
						   mahasiswa.npm,
						   matkul.nama_matkul,
						   ruang.nama_ruang');
		$this->db->from('absen');
		// join
		$this->db->join('mahasiswa', 'absen.kode_mhs = mahasiswa.kode_mhs', 'left');
		$this->db->join('matkul', 'absen.id_matkul = matkul.id_matkul', 'left');
		$this->db->join('ruang', 'absen.id_ruang = ruang.id_ruang', 'left');
		$this->db->order_by('id_absen','desc');
		$query = $this->db->get();
		return $query->result();
	}

	// tambah absen
	public function tambah($data)
	{
		$this->db->insert('absen', $data);
	}

    // delete absen
    public function delete($data)
    {
    	$this->db->where('id_absen', $data['id_absen']);
    	$this->db->delete('absen', $data);
    }
}
?>
