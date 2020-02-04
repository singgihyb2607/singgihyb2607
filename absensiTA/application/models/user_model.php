<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	
	// listing all user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user','asc');
		$query = $this->db->get();
		return $query->result();
	}

	// detail user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user','desc');
		$query = $this->db->get();
		return $query->row();
	}

	// login user
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array( 'username' => $username,
								'password' => MD5($password)));
		$this->db->order_by('id_user','desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// tambah
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}
    
    // edit
    public function edit($data)
    {
    	$this->db->where('id_user', $data['id_user']);
    	$this->db->update('user', $data);
    }

    // delete
    public function delete($data)
    {
    	$this->db->where('id_user', $data['id_user']);
    	$this->db->delete('user', $data);
    }
}
?>
