<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // load data model
        $this->CI->load->model('user_model');
	}

	// fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data usernya, maka create session login
		if($check){
			$id_user		= $check->id_user;
			// create session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('username',$username);
			// redirect halaman admin yg diproteksi
			redirect(base_url('admin/dashboard'),'refresh');
		}else{
			// kalau tidak ada (username password salah), maka suruh login lg
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah...!');
			redirect(base_url('login'),'refresh');
		}

	}

	// fungsi cek login
	public function cek_login()
	{
		// memeriksa apakah cek session sudah ada apa belum
		// jika belum alihkan ke halaman login
		if($this->CI->session->userdata('username') == ""){
			$this->CI->session->set_flashdata('warning', 'Anda belum login...!');
			redirect(base_url('login'),'refresh');
		}
	}

	// fungsi logout
	public function logout()
	{
		// menghapus semua session yang tersimpan saat login
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('username');
		// redirek ke login
		$this->CI->session->set_flashdata('sukses', 'Anda berhasil logout...!');
		redirect(base_url('login'),'refresh');
	}

	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
