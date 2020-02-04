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
		.notification {
		  text-decoration: none;
		  padding: 1px 5px;
		  position: relative;
		  display: inline-block;
		  border-radius: 4px;
		  margin-right: 10px;
		}

		.notification:hover {
		  color: white;
		}

		.notification .bage {
		  position: absolute;
		  top: -10px;
		  right: -10px;
		  padding: 1px 5px;
		  border-radius: 5px;
		  background: #1E90FF;
		  color: white;
		}

	</style>
</head>
<body>


<p>
	<a href="<?php echo base_url('admin/mahasiswa/tambah') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> &nbsp;Tambah Baru </a>
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
			<th style=" text-align: center;">No</th>
			<th>NPM</th>
			<th>Nama</th>
			<th>Sapaan</th>
			<th>E-Mail</th>
			<th style="text-align: center;">Progdi</th>
			<th style="text-align: center;">Kelas</th>
			<th style="text-align: center;">Status</th>
			<th style="text-align: center;">Gambar</th>
			<th style="text-align: center;" width="90">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no=1;
		foreach ($mahasiswa as $mahasiswa) {
		?>
		<tr>
			<td style=" text-align: center;"><?php echo $no ?></td>
			<td><?php echo ($mahasiswa->npm) ?></td>
			<td><?php echo $mahasiswa->nama ?></td>
			<td><?php echo $mahasiswa->nick ?></td>
			<td><?php echo $mahasiswa->email ?></td>
			<td style="text-align: center;"><?php echo ucfirst($mahasiswa->progdi) ?></td>
			<td style="text-align: center;"><?php echo ucfirst($mahasiswa->kelas) ?></td>
			<td style="text-align: center;"><?php echo ucfirst($mahasiswa->status) ?></td>
			<td style="text-align: center;">
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$mahasiswa->gambar) ?>" class="img img-responsive img-thumbnail" width="60" style="height: 60px;" >
			</td>
			<td style=" text-align: center;">

				<a href="<?php echo base_url('admin/mahasiswa/edit/'.$mahasiswa->kode_mhs) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>

				<?php include('delete.php') ?>

				<p></p>

				<a href="<?php echo base_url('admin/mahasiswa/jadwal/'.$mahasiswa->kode_mhs) ?>" class="btn btn-primary btn-xs notification"><i class="fa fa-book"></i> Jadwal <span class="bage"> <?php echo $mahasiswa->total_jadwal ?> </span></a>
			</td>
		</tr>
		<?php $no++; } ?>
	</tbody>
</table>

	
</body>
</html>