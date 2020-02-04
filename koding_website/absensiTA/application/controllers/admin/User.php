<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('user_model');
		// proteksi halaman
		$this->simple_login->cek_login();
		
	}
	
	// data user
    public function index()
        {
			$user = $this->user_model->listing();
			$data = array( 'title'	 => 'Data Pengguna',
			               'user'	 => $user,
						   'isi'	 => 'admin/user/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // tambah user
    public function tambah()
        {
        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[user.username]',
        	array( 'required'       => '%s harus diisi',
        		   'min_length'		=> '%s minimal 6 karakter',
        		   'max_length'		=> '%s maksimal 32 karakter',
        		   'is_unique'		=> '%s sudah ada, gunakan username lain.!'));

        	$valid->set_rules('password','Password','required|min_length[8]',
        	array( 'required'       => '%s harus diisi',
        		   'min_length'		=> '%s password minimal 8 karakter'));



        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Tambah Pengguna',
						   'isi'	=> 'admin/user/tambah'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;
				$data = array(	'username'		=> $i->post('username'),
								'password'		=> MD5($i->post('password'))
							 );
				$this->user_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
				redirect(base_url('admin/user'),'refresh');
			}
			// end database
				 
        }




        // Edit user
    public function edit($id_user)
        {
        	$user = $this->user_model->detail($id_user);

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[user.username]',
        	array( 'required'       => '%s harus diisi',
        		   'min_length'		=> '%s minimal 6 karakter',
        		   'max_length'		=> '%s maksimal 32 karakter',
        		   'is_unique'		=> '%s sudah ada, gunakan username lain.!'));

		
        	if ($valid->run()===FALSE) {
        		// end validasi

				$data = array( 'title'	=> 'Edit Pengguna',
							   'user'	=> $user,
							   'isi'	=> 'admin/user/edit'
							   ); 
				
				$this->load->view('admin/layout/wrapper', $data, FALSE);

				// masuk database
				}else{
					$i = $this->input;
					$data = array(	'id_user'		=> $id_user,
									'username'		=> $i->post('username')
								 );
					$this->user_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/user'),'refresh');
				}
				// end database
		 }

		 public function editpass($id_user)
		 {
		 	$user = $this->user_model->detail($id_user);

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('password','Password','required|min_length[8]',
        	array( 'required'       => '%s harus diisi',
        		   'min_length'		=> '%s password minimal 8 karakter'));

		
        	if ($valid->run()===FALSE) {
        		// end validasi

				$data = array( 'title'	=> 'Edit Password',
							   'user'	=> $user,
							   'isi'	=> 'admin/user/editpass'
							   ); 
				
				$this->load->view('admin/layout/wrapper', $data, FALSE);

				// masuk database
				}else{
					$i = $this->input;
					$data = array(	'id_user'		=> $id_user,
									'password'		=> MD5($i->post('password'))
								 );
					$this->user_model->edit($data);
					$this->session->set_flashdata('sukses', 'Data telah diedit');
					redirect(base_url('admin/user'),'refresh');
				}
		 }



        // delete user
        public function delete($id_user)
        {
        	$data = array('id_user' => $id_user);
        	$this->user_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/user'),'refresh');
        }
    
}
?>
