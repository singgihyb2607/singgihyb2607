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

<p>
	<a href="<?php echo base_url('admin/jadwal/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Tambah Baru </a>
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
			<th>NPM</th>
			<th>Nama Mata Kuliah</th>
			<th>Hari</th>
			<th>Ruang</th>
			<th>Waktu</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($jadwal as $jadwal) {
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $jadwal->npm ?></td>
			<td><?php echo $jadwal->nama_matkul ?></td>
			<td><?php echo $jadwal->hari ?></td>
			<td><?php echo $jadwal->nama_ruang ?></td>
			<td><?php echo $jadwal->j_mulai ?>:<?php echo $jadwal->m_mulai ?> -
				<?php echo $jadwal->j_akhir ?>:<?php echo $jadwal->m_akhir ?></td>
			<td>
				<a href="<?php echo base_url('admin/jadwal/delete/'.$jadwal->id_jadwal) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</body>
</html>