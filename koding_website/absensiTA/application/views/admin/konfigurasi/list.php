<?php

// notif
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';	
}

?>

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
echo form_open_multipart(base_url('admin/konfigurasi'),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Website</label>
		<div class="col-md-7">
			<input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Tagline / Moto</label>
		<div class="col-md-7">
			<input type="text" name="tagline" class="form-control" placeholder="Tagline / Moto" value="<?php echo $konfigurasi->tagline ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Email</label>
		<div class="col-md-7">
			<input type="email" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $konfigurasi->email ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Website</label>
		<div class="col-md-7">
			<input type="text" name="website" class="form-control" placeholder="Website" value="<?php echo $konfigurasi->website ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Facebook</label>
		<div class="col-md-7">
			<input type="text" name="facebook" class="form-control" placeholder="Facebook" value="<?php echo $konfigurasi->facebook ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Instagram</label>
		<div class="col-md-7">
			<input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Telepon/HP</label>
		<div class="col-md-7">
			<input type="text" name="telepon" class="form-control" placeholder="Telepon/HP" value="<?php echo $konfigurasi->telepon ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Alamat Kantor</label>
		<div class="col-md-7">
			<textarea name="alamat" class="form-control" placeholder="Alamat Kantor" rows="2"><?php echo $konfigurasi->alamat ?></textarea>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Keywords</label>
		<div class="col-md-7">
			<input type="text" name="keywords" class="form-control" placeholder="Keywords (untuk SEO Google)" value="<?php echo $konfigurasi->keywords ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Kode Metatext</label>
		<div class="col-md-7">
			<input type="text" name="metatext" class="form-control" placeholder="Kode Metatext" value="<?php echo $konfigurasi->metatext ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Deskripsi Website</label>
		<div class="col-md-7">
			<textarea name="deskripsi" class="form-control" placeholder="Deskripsi Website" rows="3"><?php echo $konfigurasi->deskripsi ?></textarea>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Rekening Pembayaran</label>
		<div class="col-md-7">
			<textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran" rows="3"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-7">
			<button class="btn btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>
			<button class="btn btn-info" name="reset" type="reset"><i class="fa fa-times"></i> Reset
			</button>
		</div>
</div>

<?php echo form_close(); ?>