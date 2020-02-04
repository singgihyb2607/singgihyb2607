<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('mahasiswa_model');
		
		// proteksi halaman
		$this->simple_login->cek_login();
	}

    // Halaman Dashboard Admin
    public function index()
        {
            $mahasiswaa = $this->mahasiswa_model->tampil();
            $jml        = $this->mahasiswa_model->jml();
            $data = array(  'title'      => 'Halaman Admin',
                            'mahasiswa'  => $mahasiswaa,
                            'jml'        => $jml,
                            'isi'        => 'admin/dashboard/list'
                            );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            
        }
    
}
?>
