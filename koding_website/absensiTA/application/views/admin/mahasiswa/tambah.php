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
echo form_open_multipart(base_url('admin/mahasiswa/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Kode Mahasiswa</label>
		<div class="col-md-5">
			<input type="text" name="kode_mhs" class="idregistrasi form-control " placeholder="Kode Mahasiswa" 
			value="<?php foreach ($kode_mhs as $a) {
					echo strtoupper($a->kode_kartu); } ?>" required readonly>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">NPM</label>
		<div class="col-md-5">
			<input type="text" name="npm" class="form-control" placeholder="NPM" value="<?php echo set_value('npm') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Mahasiswa</label>
		<div class="col-md-5">
			<input type="text" name="nama" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo set_value('nama') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Panggilan</label>
		<div class="col-md-5">
			<input type="text" name="nick" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo set_value('nick') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">E-Mail</label>
		<div class="col-md-5">
			<input type="text" name="email" class="form-control" placeholder="E-Mail" value="<?php echo set_value('email') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Password</label>
		<div class="col-md-5">
			<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Alamat</label>
		<div class="col-md-5">
			<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo set_value('alamat') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jenis Kelamin</label>
		<div class="col-md-5">
			<select name="jenis_kelamin" class="form-control">
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Telepon</label>
		<div class="col-md-5">
			<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo set_value('telepon') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Tempat Lahir</label>
		<div class="col-md-5">
			<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?php echo set_value('tempat_lahir') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Tanggal Lahir</label>
		<div class="col-md-5">
			<input type="text" name="ttl" class="form-control" placeholder="Tanggal Lahir" value="<?php echo set_value('ttl') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Status Mahasiswa</label>
		<div class="col-md-5">
			<select name="status" class="form-control">
				<option value="Aktif">Aktif</option>
				<option value="Cuti">Cuti</option>
				<option value="Tidak Aktif">Tidak Aktif</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Program Studi</label>
		<div class="col-md-5">
			<select name="progdi" class="form-control">
				<option value="Informatika">Informatika</option>
				<option value="SI">Sistem Informasi</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Kelas</label>
		<div class="col-md-5">
			<select name="kelas" class="form-control">
				<option value="Reguler">Reguler</option>
				<option value="Karyawan">Karyawan</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Upload Foto</label>
		<div class="col-md-5">
			<input type="file" name="gambar" class="form-control" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>
			<button class="btn btn-info" name="reset" type="reset"><i class="fa fa-times"></i> Reset
			</button>
		</div>
</div>

<?php echo form_close(); ?>
<script src="jquery-3.4.1.min.js"></script>
<script src="script.js"></script>