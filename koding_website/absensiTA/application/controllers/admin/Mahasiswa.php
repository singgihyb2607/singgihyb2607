<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('mahasiswa_model');
		$this->load->model('jadwal_model');
		$this->load->model('matkul_model');
		$this->load->model('ruang_model');
		// proteksi halaman
		// $this->simple_login->cek_login();
		
	}
	
	// data mahasiswa
    public function index()
        {
			$mahasiswa = $this->mahasiswa_model->listing();
			$data = array( 'title'	 	=> 'Data Mahasiswa',
			               'mahasiswa'	=> $mahasiswa,
						   'isi'	 	=> 'admin/mahasiswa/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // jadwal
         public function jadwal($kode_mhs)
         {
         	$mahasiswa 		= $this->mahasiswa_model->detail($kode_mhs);
         	$jadwal 		= $this->jadwal_model->listing_jadwal();
         	$matkul 		= $this->matkul_model->listing();
         	$ruang 			= $this->ruang_model->listing();
         	$jadwal_detail	= $this->mahasiswa_model->jadwal($kode_mhs);
	        			
		         	// end validasi

				 	$data = array( 'title'			=> 'Data Jadwal Mahasiswa : '.$mahasiswa->nama,
				 				   'mahasiswa'		=> $mahasiswa,
				 				   'jadwal'			=> $jadwal,
				 				   'matkul'			=> $matkul,
				 				   'ruang'			=> $ruang,
				 				   'jadwal_detail'	=> $jadwal_detail,
				 				   // 'error'			=> $this->upload->display_errors(),
				 				   'isi'			=> 'admin/mahasiswa/jadwal'
				 				   ); 
					
				 	$this->load->view('admin/layout/wrapper', $data, FALSE);
         }

    public function idmhs()
    {
	 	// 	if (isset($_GET['kode_kartu'])) {
 		// //echo "OK";
		 // 		$i = $this->input;

		 // 		$data = array(	'kode_kartu' => $i->get('kode_kartu'));

		 // 		echo "BERHASIL";

		 // 		$this->mahasiswa_model->update($data);

		 // 	}else{
		 // 		echo "Variabel data tidak terdefinisi";
		 // 	}

		 	require "config.php";
        	$kode_kartu 	= $_GET["kode_kartu"];

			$sql   = "SELECT * FROM mahasiswa WHERE kode_mhs = '$kode_kartu'";
			$que   = mysqli_query($con, $sql);
			$brs   = mysqli_fetch_array($que);
			$bck   = $brs[0];
			$kode  = strtolower($bck);
			$nama  = $brs[3];

				if ($kode > 0){
					echo "Untuk ";
					$explode = explode(' ', $nama);
					echo $explode[0];
				}else{
					$i = $this->input;

		  			$data = array(	'kode_kartu' => $i->get('kode_kartu'));

		 			echo "BERHASIL";

		  			$this->mahasiswa_model->update($data);
				}

    }

    // tambah mahasiswa
    public function tambah()
        {
        	$kode_mhs = $this->mahasiswa_model->kode();

        	// validasi input
        	$valid = $this->form_validation;

        	$valid->set_rules('kode_mhs','Kode Mahasiswa','required|is_unique[mahasiswa.kode_mhs]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));
        	
        	$valid->set_rules('npm','NPM','required|is_unique[mahasiswa.npm]',
        	array( 'required'       => '%s harus diisi',
        		   'is_unique'		=> '%s sudah ada...!'));

        	$valid->set_rules('nama','Nama','required',
        	array( 'required'       => '%s harus diisi'));

        	$valid->set_rules('password','Password','required|min_length[8]',
        	array( 'required'       => '%s harus diisi',
        		   'min_length'		=> '%s password minimal 8 karakter'));
        	

        	if ($valid->run()) {
        		$config['upload_path']		= './assets/upload/image/';
        		$config['allowed_types']	= 'gif|jpg|png|jpeg';
        		$config['max_size']			= '900000';//dalam KB
        		$config['max_width']		= '900000';
        		$config['max_height']		= '900000';
        		$config['thumb_marker']     = '';
        		
        		$this->load->library('upload', $config);
        		
        		if ( ! $this->upload->do_upload('gambar')){
        			
        			
        			
	        	// end validasi

				$data = array( 'title'		=> 'Tambah Data Mahasiswa',
							   'kode_mhs'	=> $kode_mhs,
							   'error'		=> $this->upload->display_errors(),
							   'isi'		=> 'admin/mahasiswa/tambah'
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
					$data = array(	'kode_mhs'		=> $i->post('kode_mhs'),
									'npm'			=> $i->post('npm'),
									'nama'			=> $i->post('nama'),
									'nick'			=> $i->post('nick'),
									'email'			=> $i->post('email'),
									'password'		=> $i->post('password'),
									'alamat'		=> $i->post('alamat'),
									'jenis_kelamin'	=> $i->post('jenis_kelamin'),
									'telepon'		=> $i->post('telepon'),
									'tempat_lahir'	=> $i->post('tempat_lahir'),
									'ttl'			=> $i->post('ttl'),
									'status'		=> $i->post('status'),
									'progdi'		=> $i->post('progdi'),
									'kelas'			=> $i->post('kelas'),
									'gambar'		=> $upload_gambar['upload_data']['file_name']
								 );
					$this->mahasiswa_model->tambah($data);
					$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
					redirect(base_url('admin/mahasiswa'),'refresh');
				}
			}
			// end database
			
			$data = array( 'title'		=> 'Tambah Mahasiswa',
						   'kode_mhs'	=> $kode_mhs,
						   'isi'		=> 'admin/mahasiswa/tambah'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
        }




// Edit mahasiswa
public function edit($kode_mhs)
{
	$mahasiswa   = $this->mahasiswa_model->detail($kode_mhs);

	// validasi input
	$valid = $this->form_validation;

	$valid->set_rules('nama','Nama','required',
        	array(    'required'    => '%s harus diisi'));

    $valid->set_rules('password','Password','required|min_length[8]',
    		array( 	  'required'    => '%s harus diisi',
        			  'min_length'	=> '%s password minimal 8 karakter'));

	if ($valid->run()) {
		// cek jika gambar diganti
		if(!empty($_FILES['gambar']['name'])){


		$config['upload_path']		= './assets/upload/image/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= '900000';//dalam KB
		$config['max_width']		= '900000';
		$config['max_height']		= '900000';
		$config['thumb_marker']     = '';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
		
			// end validasi

			$data = array( 'title'		=> 'Edit Data Mahasiswa: '.$mahasiswa->nama,
						   'mahasiswa'	=> $mahasiswa,
						   'error'		=> $this->upload->display_errors(),
						   'isi'		=> 'admin/mahasiswa/edit'
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
	    	$mahasiswa = $this->mahasiswa_model->detail($kode_mhs);
	    	unlink('./assets/upload/image/'.$mahasiswa->gambar);
	    	unlink('./assets/upload/image/thumbs/'.$mahasiswa->gambar);
	    	// end hps gambar


			$data = array(	'kode_mhs'		=> $kode_mhs,
							'nama'			=> $i->post('nama'),
							'nick'			=> $i->post('nick'),
							'email'			=> $i->post('email'),
							'password'		=> $i->post('password'),
							'alamat'		=> $i->post('alamat'),
							'jenis_kelamin'	=> $i->post('jenis_kelamin'),
							'telepon'		=> $i->post('telepon'),
							'tempat_lahir'	=> $i->post('tempat_lahir'),
							'ttl'			=> $i->post('ttl'),
							'status'		=> $i->post('status'),
							'progdi'		=> $i->post('progdi'),
							'kelas'			=> $i->post('kelas'),
							'gambar'		=> $upload_gambar['upload_data']['file_name']
						);

			$this->mahasiswa_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/mahasiswa'),'refresh');
		}
	}else{
		// edit mahasiswa tanpa rubah gambar
		$i = $this->input;

		$data = array(	'kode_mhs'		=> $kode_mhs,
						'nama'			=> $i->post('nama'),
						'nick'			=> $i->post('nick'),
						'email'			=> $i->post('email'),
						'password'		=> $i->post('password'),
						'alamat'		=> $i->post('alamat'),
						'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						'telepon'		=> $i->post('telepon'),
						'tempat_lahir'	=> $i->post('tempat_lahir'),
						'ttl'			=> $i->post('ttl'),
						'status'		=> $i->post('status'),
						'progdi'		=> $i->post('progdi'),
						'kelas'			=> $i->post('kelas')
						// 'gambar'		=> $upload_gambar['upload_data']['file_name']
					);


		$this->mahasiswa_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diedit');
		redirect(base_url('admin/mahasiswa'),'refresh');
	}
}
	// end database
	
		$data = array( 'title'		=> 'Edit Data Mahasiswa: '.$mahasiswa->nama,
					   'mahasiswa'	=> $mahasiswa,
					   'isi'		=> 'admin/mahasiswa/edit'
					   ); 
	
		$this->load->view('admin/layout/wrapper', $data, FALSE);			 
}

        // delete mahasiswa
        public function delete($npm)
        {
        	// hapus gambar
        	$mahasiswa = $this->mahasiswa_model->detail($npm);
        	unlink('./assets/upload/image/'.$mahasiswa->gambar);
        	unlink('./assets/upload/image/thumbs/'.$mahasiswa->gambar);
        	// end hps gambar

        	$data = array('npm' => $npm);
        	$this->mahasiswa_model->delete($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
			redirect(base_url('admin/mahasiswa'),'refresh');
        }

        // delete jadwal
         public function delete_jadwal($id_jadwal)
         {
         	$data = array('id_jadwal' => $id_jadwal);
         	$this->mahasiswa_model->delete_jadwal($data);
			$this->session->set_flashdata('sukses', 'Data telah dihapus');
		 	redirect(base_url('admin/mahasiswa/jadwal/'.$npm),'refresh');
         }
    
}
?>