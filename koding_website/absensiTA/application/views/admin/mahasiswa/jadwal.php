<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
		tr:nth-child(even) {
		  background-color: #E6E6FA
		}
	</style>
</head>
<body>
<p>
	<a href="<?php echo base_url('admin/mahasiswa') ?>" class="btn btn-primary btn-flat"><i class="fa fa-arrow-left"></i> &nbsp;Kembali</a>
</p>
<?php

// notif
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';	
}

?>

<table class="table table-bordered" id="example1">
		<thead>
		<tr style="background-color: #6495ED;">
			<th>No</th>
			<th>Kode Mata Kuliah</th>
			<th>Nama Mata Kuliah</th>
			<th>Hari</th>
			<th>Ruang</th>
			<th>Waktu</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($jadwal_detail as $jadwal) {
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $jadwal->id_matkul ?></td>
			<td><?php echo $jadwal->nama_matkul ?></td>
			<td><?php echo $jadwal->hari ?></td>
			<td><?php echo $jadwal->nama_ruang ?></td>
			<td><?php echo $jadwal->j_mulai ?>:<?php echo $jadwal->m_mulai ?> -
				<?php echo $jadwal->j_akhir ?>:<?php echo $jadwal->m_akhir ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

	
</body>
</html>