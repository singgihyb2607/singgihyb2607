<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	// konfigurasi umu
	public function index()
	{
		$konfigurasi 	= $this->konfigurasi_model->listing();

		// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('namaweb','Nama Website','required',
        	array( 'required'       => '%s harus diisi'));

        	

        	if ($valid->run()===FALSE) {
        	// end validasi

			$data = array( 'title'			=> 'Konfigurasi Website',
						   'konfigurasi'	=> $konfigurasi,
						   'isi'			=> 'admin/konfigurasi/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);

			// masuk database
			}else{
				$i = $this->input;


				$data = array(	'id_konfigurasi'		=> $konfigurasi->id_konfigurasi,
								'namaweb'				=> $i->post('namaweb'),
								'tagline'				=> $i->post('tagline'),
								'email'					=> $i->post('email'),
								'website'				=> $i->post('website'),
								'keywords'				=> $i->post('keywords'),
								'metatext'				=> $i->post('metatext'),
								'telepon'				=> $i->post('telepon'),
								'alamat'				=> $i->post('alamat'),
								'facebook'				=> $i->post('facebook'),
								'instagram'				=> $i->post('instagram'),
								'deskripsi'				=> $i->post('deskripsi'),
								'rekening_pembayaran'	=> $i->post('rekening_pembayaran')
							 );
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi'),'refresh');
			}
	}

	// konfig logo
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
		array( 'required'       => '%s harus diisi'));
		

		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['logo']['name'])){


			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '100000';//dalam KB
			$config['max_width']		= '100000';
			$config['max_height']		= '100000';
			$config['thumb_marker']     = '';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('logo')){
			
				// end validasi

				$data = array( 'title'			=> 'Konfigurasi Logo Website',
							   'konfigurasi'	=> $konfigurasi,
							   'error'			=> $this->upload->display_errors(),
							   'isi'		=> 'admin/konfigurasi/logo'
							   ); 
		
				$this->load->view('admin/layout/wrapper', $data, FALSE);

				// masuk database
			}else{
				$upload_gambar = array('upload_data' 	=> $this->upload->data());

				// created thumbnail
				$config['image_library']  = 'gd2';
				$config['source_image']   = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				// lokasi folder thumbnail
				$config['new_image']	  = './assets/upload/image/thumbs/';
				$config['create_thumb']   = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 250;//ukuran px
				$config['height']         = 250;//ukuran px

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				// end thumbnail

				$i = $this->input;

				// hapus gambar
			  	//$konfigurasi = $this->konfigurasi_model->edit($id_konfigurasi);
			  	unlink('./assets/upload/image/'.$konfigurasi->logo);
			 	unlink('./assets/upload/image/thumbs/'.$konfigurasi->logo);
		  		// end hps gambar


				$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
								'namaweb'	=> $i->post('namaweb'),
								'logo'		=> $upload_gambar['upload_data']['file_name']
							);


				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi/logo'),'refresh');
			}
		}else{
				$i = $this->input;


				$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
								'namaweb'	=> $i->post('namaweb'),
								//'logo'		=> $upload_gambar['upload_data']['file_name']
							);


				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi/logo'),'refresh');
		}
	}
		// end database
		
			$data = array( 'title'			=> 'Konfigurasi Logo Website',
							   'konfigurasi'	=> $konfigurasi,
							   'isi'		=> 'admin/konfigurasi/logo'
							   ); 
		
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// konfig icon
	public function icon()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('namaweb','Nama Website','required',
		array( 'required'       => '%s harus diisi'));
		

		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['icon']['name'])){


			$config['upload_path']		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']			= '100000';//dalam KB
			$config['max_width']		= '100000';
			$config['max_height']		= '100000';
			$config['thumb_marker']     = '';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('icon')){
			
				// end validasi

				$data = array( 'title'			=> 'Konfigurasi Icon Website',
							   'konfigurasi'	=> $konfigurasi,
							   'error'			=> $this->upload->display_errors(),
							   'isi'		=> 'admin/konfigurasi/icon'
							   ); 
		
				$this->load->view('admin/layout/wrapper', $data, FALSE);

				// masuk database
			}else{
				$upload_gambar = array('upload_data' 	=> $this->upload->data());

				// created thumbnail
				$config['image_library']  = 'gd2';
				$config['source_image']   = './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
				// lokasi folder thumbnail
				$config['new_image']	  = './assets/upload/image/thumbs/';
				$config['create_thumb']   = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']          = 250;//ukuran px
				$config['height']         = 250;//ukuran px

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
				// end thumbnail

				$i = $this->input;

				// hapus gambar
			  	//$konfigurasi = $this->konfigurasi_model->edit($id_konfigurasi);
			  	unlink('./assets/upload/image/'.$konfigurasi->icon);
			 	unlink('./assets/upload/image/thumbs/'.$konfigurasi->icon);
		  		// end hps gambar


				$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
								'namaweb'	=> $i->post('namaweb'),
								'icon'		=> $upload_gambar['upload_data']['file_name']
							);


				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
			}
		}else{
				$i = $this->input;


				$data = array(	'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
								'namaweb'	=> $i->post('namaweb'),
								//'logo'		=> $upload_gambar['upload_data']['file_name']
							);


				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi/icon'),'refresh');
		}
	}
		// end database
		
			$data = array( 'title'			=> 'Konfigurasi Icon Website',
							   'konfigurasi'	=> $konfigurasi,
							   'isi'		=> 'admin/konfigurasi/icon'
							   ); 
		
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

}

/* End of file Konfigurasi.php */
/* Location: ./application/controllers/admin/Konfigurasi.php */