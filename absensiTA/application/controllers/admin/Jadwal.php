<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('jadwal_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('matkul_model');
		$this->load->model('ruang_model');
		// proteksi halaman
		$this->simple_login->cek_login();
		
	}
	
	// data jadwal
    public function index()
        {
			$jadwal = $this->jadwal_model->listing_jadwal();
			$data   = array( 'title'	 	=> 'Data Jadwal',
			                 'jadwal'		=> $jadwal,
						     'isi'			=> 'admin/jadwal/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // tambah jadwal
    public function tambah()
        {
        	// validasi input
			$jadwal 		= $this->jadwal_model->listing_jadwal();
			$mahasiswa 		= $this->mahasiswa_model->listing();
			$matkul 		= $this->matkul_model->listing();
        	$ruang 			= $this->ruang_model->listing();

        	$valid = $this->form_validation;


         	$valid->set_rules('kode_mhs','NPM','required',
         		array( 'required'       => '%s harus diisi')
        		);

        	

        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'		=> 'Tambah Jadwal',
						   'jadwal'		=> $jadwal,
						   'mahasiswa'	=> $mahasiswa,
						   'matkul'		=> $matkul,
						   'ruang'		=> $ruang,
						   'isi'		=> 'admin/jadwal/tambah'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{

				$n = 0;
				$i = $this->input;
				$a = $i->post('j_mulai');
					if ($a<=9) {
						$jm = $n.$a;
					}else{
						$jm = $a;
					}
				$b = $i->post('m_mulai');
					if ($b=="0"){
						$mm = "00";
					}elseif ($b>=1 && $b<=9) {
						$mm = $n.$b;
					}else{
						$mm = $b;
					}
				$c = $i->post('j_akhir');
					if ($c<=9) {
						$ja = $n.$c;
					}else{
						$ja = $c;
					}
				$d = $i->post('m_akhir');
					if ($d=="0"){
						$ma = "00";
					}elseif ($d>=1 && $d<=9) {
						$ma = $n.$d;
					}else{
						$ma = $d;
					}

					$data = array(	'kode_mhs'		=> $i->post('kode_mhs'),
									'id_matkul'		=> $i->post('id_matkul'),
									'hari'			=> $i->post('hari'),
									'id_ruang'		=> $i->post('id_ruang'),
									'j_mulai'		=> $jm,
									'm_mulai'		=> $mm,
									'j_akhir'		=> $ja,
									'm_akhir'		=> $ma
							 );
					$this->jadwal_model->tambah($data);
					$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
					redirect(base_url('admin/jadwal'),'refresh');
			}        	
				 
        }

        // Edit kategori
    public function edit($id_jadwal)
        {
        	$jadwal = $this->jadwal_model->detail($id_jadwal);

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('nama_jadwal','Nama Mata Kuliah','required|is_unique[jadwal.nama_jadwal]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	
        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'	=> 'Edit Jadwal',
						   'jadwal'	=> $jadwal,
						   'isi'	=> 'admin/jadwal/edit'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;

				$data = array(	'id_jadwal'		=> $id_jadwal,
								'nama_jadwal'	=> $i->post('nama_jadwal'),
								'sks'		=> $i->post('sks')
							 );
				$this->jadwal_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diedit');
				redirect(base_url('admin/jadwal'),'refresh');
			}
			// end database
				 
        }

        // delete jadwal
        public function delete($id_jadwal)
        {
        	$data = array('id_jadwal' => $id_jadwal);
        	$this->jadwal_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/jadwal'),'refresh');
        }
    
}
?>
