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
	<a href="<?php echo base_url('admin/ruang/tambah') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Tambah Baru </a>
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
			<th>Nama Ruang</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($ruang as $ruang) {
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $ruang->nama_ruang ?></td>
			<td>
				<a href="<?php echo base_url('admin/ruang/edit/'.$ruang->id_ruang) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

				<a href="<?php echo base_url('admin/ruang/delete/'.$ruang->id_ruang) ?>" class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?')"><i class="fa fa-trash-o"></i> Hapus</a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>
</body>
</html>