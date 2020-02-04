<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {

	// Load model
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('absen_model');
		$this->load->model('jadwal_model');
		$this->load->model('mahasiswa_model');
		$this->load->model('matkul_model');
		$this->load->model('ruang_model');
		// // proteksi halaman
		// $this->simple_login->cek_login();
		
	}
	
	// data jadwal
    public function index()
        {
			$absen  = $this->absen_model->listing();
			$data   = array( 'title' => 'Data Kehadiran Mahasiswa',
			                 'absen' => $absen,
						     'isi'	 => 'admin/absen/list'
						   ); 
			
			$this->load->view('admin/layout/wrapper', $data, FALSE);
			 
        }

    // tambah jadwal
    public function tambah() {

         	require "config.php";
        	$kode_mhs 	 = $_GET["kode_mhs"];

        	$qiu         = mysqli_query($con, "SELECT * FROM mahasiswa WHERE kode_mhs = '$kode_mhs'");
        	$dsl         = mysqli_fetch_row($qiu);
			$cod         = $dsl[1];
			if ($cod < 1) {
				echo "gagal";
			}else{

			$que1        = mysqli_query($con, "SELECT * FROM jadwal WHERE kode_mhs = '$kode_mhs'");
			$abys        = mysqli_fetch_row($que1);
			$code        = $abys[1];
			if ($code < 1) {
				echo "kosong";
			}else {

			$que         = mysqli_query($con, "SELECT * FROM jadwal WHERE kode_mhs = '$kode_mhs'");
			while($brs   = mysqli_fetch_array($que)){
				$bck     = $brs[1];
				$kode    = strtolower($bck);

				// $sql1   = "SELECT * FROM mahasiswa WHERE kode_mhs = '$kode_mhs'";
				// $que1   = mysqli_query($con, $sql1);
				// $brs1   = mysqli_fetch_array($que1);
				// $npm    = $brs1[1];

				// define dari database //
				$a      = $brs[3];
				$b      = $brs[5];
				$c      = $brs[6];
				$bc     = $b.$c;
				$f      = 30;
				$ff		= intval($bc);
				$bcff   = $ff + $f;
				$d      = $brs[7];
				$e      = $brs[8];
				$de     = $d.$e;
				$ruang  = $brs[4];
				$matkul = $brs[2];

			// define waktu sekarang //
			date_default_timezone_set('Asia/Jakarta');
			$tgl		= date("d-m-Y");
			$ttt	 	= date("H:i:s", time());
			$j_m	 	= date("H", time());
			$m_m	 	= date("i", time());
			$jam        = $j_m.$m_m;
			$hari 		= date('l');

				// mengganti jadi bahasa Indonesia //
				if ($hari=="Sunday") {
				 $dino 		= "Minggu";
				}elseif ($hari=="Monday") {
				 $dino 		= "Senin";
				}elseif ($hari=="Tuesday") {
				 $dino 		= "Selasa";
				}elseif ($hari=="Wednesday") {
				 $dino 		= "Rabu";
				}elseif ($hari=="Thursday") {
				 $dino 		=("Kamis");
				}elseif ($hari=="Friday") {
				 $dino 		= "Jumat";
				}elseif ($hari=="Saturday") {
				 $dino 		= "Sabtu";
				}

				// mulai logika absen //
			// mengecek kode yg dikirim sudah ada didatabase //
			if ($kode_mhs===$kode) {

				// cek apakah hari ini sama dengan jadwal //
				if ($dino==$a) {

					// cek waktu di jadwal //
					if ($ruang=="3") {

						// cek ruang di jadwal //
						if ($jam>=$bc && $jam<=$de){

							// cek waktu absen yelat tidak //
							if ($jam<$bcff){

								// input data ke db //
								$data = array(	'kode_mhs'		=> $kode_mhs,
												'id_matkul'		=> $matkul,
												'id_ruang'		=> $ruang,
												'hari'			=> $dino,
												'jam'			=> $ttt,
												'tanggal'		=> $tgl
											 );

								echo "BERHASIL";

								// mengambil fungsi tambah dari absen model //
								$this->absen_model->tambah($data);
								$this->session->set_flashdata('sukses', 'Data telah ditambahkan');
								redirect(base_url('admin/absen'),'refresh');

							}else{
								echo "TELAT";
							}

						}else{
							echo "JAM";
						}

					}else{
						echo "RUANG";
					}

				}else{
					echo "HARI";
				}

			}else{
				echo "KODE";
			}
		  }

		}
	}     
	}   	
		
    
}
?>