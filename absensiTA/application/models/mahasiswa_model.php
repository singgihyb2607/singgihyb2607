<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// listing all mahasiswa 2
	public function listing()
	{
		$this->db->select('mahasiswa.*,
						jadwal.hari,
						jadwal.j_mulai,
						jadwal.m_mulai,
						jadwal.j_akhir,
						jadwal.m_akhir,
						jadwal.id_ruang,
						jadwal.id_matkul,
						jadwal.id_ruang,
						COUNT(jadwal.id_jadwal) AS total_jadwal');
		$this->db->from('mahasiswa');

		// join
		$this->db->join('jadwal', 'jadwal.kode_mhs = mahasiswa.kode_mhs', 'left');
		// end join
		$this->db->group_by('mahasiswa.npm');
		$this->db->order_by('mahasiswa.npm','asc');
		$query = $this->db->get();
		return $query->result();
	}



	public function kode()
	{
		$this->db->select('*');
		$this->db->from('kodemhs');
		$this->db->where('id_kode', '1');
		$this->db->order_by('id_kode', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		// end join
		$this->db->limit(8);
		$this->db->group_by('npm');
		$this->db->order_by('npm','desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function jml()
	{
		$query = $this->db->get('mahasiswa');
		if($query->num_rows() > 0) {
			return $query->num_rows();
		}else{
			return 0;
		}
	}

	public function jadwal($kode_mhs)
	{
		$this->db->select('jadwal.*,
						matkul.nama_matkul,
						matkul.sks,
						ruang.nama_ruang,
						COUNT(jadwal.id_jadwal) AS jadwal');
		$this->db->from('jadwal');

		// join
		$this->db->join('mahasiswa', 'mahasiswa.kode_mhs = jadwal.kode_mhs', 'left');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal.id_matkul', 'left');
		$this->db->join('ruang', 'ruang.id_ruang = jadwal.id_ruang', 'left');
		// end join
		$this->db->where('jadwal.kode_mhs', $kode_mhs);
		$this->db->group_by('jadwal.id_jadwal');
		$this->db->order_by('jadwal.kode_mhs','asc');
		$query = $this->db->get();
		return $query->result();
	}

	 //total jadwal
	 public function total_jadwal()
	 {
	 	$this->db->select('COUNT(*) AS total');
	 	$this->db->from('jadwal');
	 	$this->db->where('status', 'Publish');
	 	$query = $this->db->get();
	 	return $query->rows();
	 }

	// detail mahasiswa
	public function detail($kode_mhs)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('kode_mhs', $kode_mhs);
		$this->db->order_by('kode_mhs','desc');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah
	public function tambah($data)
	{
		$this->db->insert('mahasiswa', $data);
	}	

	public function update($data)
	{
    	$this->db->where('id_kode', '1');
		$this->db->update('kodemhs', $data);
	}
    
    // edit
    public function edit($data)
    {
    	$this->db->where('kode_mhs', $data['kode_mhs']);
    	$this->db->update('mahasiswa', $data);
    }

    // delete
    public function delete($data)
    {
    	$this->db->where('kode_mhs', $data['kode_mhs']);
    	$this->db->delete('mahasiswa', $data);
    }

    public function delete_jadwal($data)
    {
    	$this->db->where('id_jadwal', $data['id_jadwal']);
    	$this->db->delete('jadwal', $data);
    }

}
?>
