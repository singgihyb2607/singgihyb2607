<?php 
// error upload
if (isset($error)) {
	echo '<p class="alert alert-warning">';
	echo $error;
	echo '</p>';
}

// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open_multipart(base_url('admin/mahasiswa/edit/'.$mahasiswa->kode_mhs),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Kode Mahasiswa</label>
		<div class="col-md-5">
			<input type="text" name="kode_mhs" class="form-control" style="background-color: #F5F5DC;" placeholder="Kode Mahasiswa" value="<?php echo $mahasiswa->kode_mhs ?>" disabled>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">NPM</label>
		<div class="col-md-5">
			<input type="text" name="npm" class="form-control" style="background-color: #F5F5DC;" placeholder="NPM" value="<?php echo $mahasiswa->npm ?>" disabled>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Mahasiswa</label>
		<div class="col-md-5">
			<input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo $mahasiswa->nama ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Panggilan</label>
		<div class="col-md-5">
			<input type="text" name="nick" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo $mahasiswa->nick ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">E-Mail</label>
		<div class="col-md-5">
			<input type="text" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $mahasiswa->email ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Password</label>
		<div class="col-md-5">
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $mahasiswa->password ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Alamat</label>
		<div class="col-md-5">
			<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $mahasiswa->alamat ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jenis Kelamin</label>
		<div class="col-md-5">
			<select name="jenis_kelamin" class="form-control">
				<option value="Laki-laki" <?php if($mahasiswa->jenis_kelamin=="laki") { echo "selected"; } ?>>Laki-laki</option>
				<option value="Perempuan" <?php if($mahasiswa->jenis_kelamin=="Perempuan") { echo "selected"; } ?>>Perempuan</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Telepon</label>
		<div class="col-md-5">
			<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $mahasiswa->telepon ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Tempat Lahir</label>
		<div class="col-md-5">
			<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo $mahasiswa->tempat_lahir ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Tanggal Lahir</label>
		<div class="col-md-5">
			<input type="text" name="ttl" class="form-control" placeholder="Tanggal Lahir" value="<?php echo $mahasiswa->ttl ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Status Mahasiswa</label>
		<div class="col-md-5">
			<select name="status" class="form-control">
				<option value="Aktif" <?php if($mahasiswa->status=="Aktif") { echo "selected"; } ?>>Aktif</option>
				<option value="Cuti" <?php if($mahasiswa->status=="Cuti") { echo "selected"; } ?>>Cuti</option>
				<option value="Tidak Aktif" <?php if($mahasiswa->status=="Tidak Aktif") { echo "selected"; } ?>>Tidak Aktif</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Program Studi</label>
		<div class="col-md-5">
			<select name="progdi" class="form-control">
				<option value="Informatika" <?php if($mahasiswa->progdi=="Informatika") { echo "selected"; } ?>>Informatika</option>
				<option value="SI" <?php if($mahasiswa->progdi=="SI") { echo "selected"; } ?>>Sistem Informasi</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Kelas</label>
		<div class="col-md-5">
			<select name="kelas" class="form-control">
				<option value="Reguler" <?php if($mahasiswa->kelas=="Reguler") { echo "selected"; } ?>>Reguler</option>
				<option value="Karyawan" <?php if($mahasiswa->kelas=="Karyawan") { echo "selected"; } ?>>Karyawan</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Upload Foto</label>
		<div class="col-md-5">
			<input type="file" name="gambar" class="form-control" >
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>

<?php echo form_close(); ?>

			<a class="btn btn-primary" href="<?php echo base_url('admin/mahasiswa') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div> 
</div>