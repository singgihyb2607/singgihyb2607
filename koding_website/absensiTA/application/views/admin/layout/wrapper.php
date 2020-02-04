<?php
// proteksi halaman admin dgn fungsi cek login yang ada di simple login
$this->simple_login->cek_login();
// gabungkan semua bagian layout jadi 1
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
?>