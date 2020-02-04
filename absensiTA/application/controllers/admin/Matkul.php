<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('matkul_model');
		// proteksi halaman
		$this->simple_login->cek_login();
		
	}
	
	// data matkul
    public function index()
        {
			$matkul = $this->matkul_model->listing();
			$data = array( 'title'	 	=> 'Data Mata Kuliah',
			               'matkul'		=> $matkul,
						   'isi'		=> 'admin/matkul/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // tambah matkul
    public function tambah()
        {
        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('id_matkul','Kode Mata Kuliah','required|is_unique[matkul.id_matkul]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	$valid->set_rules('nama_matkul','Nama Mata Kuliah','required|is_unique[matkul.nama_matkul]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	

        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Tambah Mata Kuliah',
						   'isi'	=> 'admin/matkul/tambah'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;


				$data = array(	'id_matkul'		=> $i->post('id_matkul'),
								'nama_matkul'	=> $i->post('nama_matkul'),
								'sks'			=> $i->post('sks')
							 );
				$this->matkul_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
				redirect(base_url('admin/matkul'),'refresh');
			}
				 
        }

        // Edit kategori
    public function edit($id_matkul)
        {
        	$matkul = $this->matkul_model->detail($id_matkul);

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('nama_matkul','Nama Mata Kuliah','required',
        	array( 'required'       => '%s harus diisi'));

        	
        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Edit Mata Kuliah',
						   'matkul'	=> $matkul,
						   'isi'	=> 'admin/matkul/edit'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;

				$data = array(	'id_matkul'		=> $id_matkul,
								'nama_matkul'	=> $i->post('nama_matkul'),
								'sks'			=> $i->post('sks')
							 );
				$this->matkul_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/matkul'),'refresh');
			}
			// end database
				 
        }

        // delete matkul
        public function delete($id_matkul)
        {
        	$data = array('id_matkul' => $id_matkul);
        	$this->matkul_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/matkul'),'refresh');
        }
    
}
?>
