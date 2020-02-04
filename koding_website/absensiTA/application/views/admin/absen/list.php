<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style>
		tr:nth-child(even) {
		  background-color: #ADD8E6;
		}
	</style>
</head>
<body>


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
			<th>NPM</th>
			<th>Nama Mata Kuliah</th>
			<th>Ruang</th>
			<th>Hari, Tanggal</th>
			<th>Jam</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($absen as $absen) {
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $absen->npm ?></td>
			<td><?php echo $absen->nama_matkul ?></td>
			<td><?php echo $absen->nama_ruang ?></td>
			<td><?php echo $absen->hari ?>, <?php echo $absen->tanggal ?></td>
			<td><?php echo $absen->jam ?></td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</body>
</html>