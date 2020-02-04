<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruang extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('ruang_model');
		// proteksi halaman
		$this->simple_login->cek_login();
		
	}
	
	// data ruang
    public function index()
        {
			$ruang = $this->ruang_model->listing();
			$data = array( 'title'	 	=> 'Data Ruang',
			               'ruang'		=> $ruang,
						   'isi'		=> 'admin/ruang/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // tambah ruang
    public function tambah()
        {
        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('nama_ruang','Nama Ruang','required|is_unique[ruang.nama_ruang]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	

        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Tambah Ruang',
						   'isi'	=> 'admin/ruang/tambah'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;


				$data = array(	'nama_ruang'	=> $i->post('nama_ruang')
							 );
				$this->ruang_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
				redirect(base_url('admin/ruang'),'refresh');
			}
				 
        }

        // Edit kategori
    public function edit($id_ruang)
        {
        	$ruang = $this->ruang_model->detail($id_ruang);

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('nama_ruang','Nama Ruang','required|is_unique[ruang.nama_ruang]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	
        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Edit Ruang',
						   'ruang'	=> $ruang,
						   'isi'	=> 'admin/ruang/edit'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;

				$data = array(	'id_ruang'		=> $id_ruang,
								'nama_ruang'	=> $i->post('nama_ruang')
							 );
				$this->ruang_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/ruang'),'refresh');
			}
			// end database
				 
        }

        // delete ruang
        public function delete($id_ruang)
        {
        	$data = array('id_ruang' => $id_ruang);
        	$this->ruang_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/ruang'),'refresh');
        }
    
}
?>
