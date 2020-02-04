<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

if($this->session->flashdata('warning')){
	echo '<p class="alert alert-warning">';
	echo $this->session->flashdata('warning');
	echo '</div>';	
}

// form open
echo form_open(base_url('admin/jadwal/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">NPM Mahasiswa</label>
		<div class="col-md-5">
			<select name="kode_mhs" class="form-control">
				<option value="">-</option>
				<?php foreach ($mahasiswa as $mahasiswa) { ?>
				<option value="<?php echo $mahasiswa->kode_mhs ?>"><?php echo $mahasiswa->npm ?> - <?php echo $mahasiswa->nama ?></option>
				<?php } ?>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Mata Kuliah</label>
		<div class="col-md-5">
			<select name="id_matkul" class="form-control">
				<option value="">-</option>
				<?php $no = 1; ?>
				<?php foreach ($matkul as $matkul) { ?>
				<option value="<?php echo $matkul->id_matkul ?>"><?php echo $no ?>. <?php echo $matkul->nama_matkul ?></option>
				<?php $no++; ?>
				<?php } ?>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Hari</label>
		<div class="col-md-5">
			<select name="hari" class="form-control">
				<option value="">- Pilih Hari -</option>
				<option value="Senin">Senin</option>
				<option value="Selasa">Selasa</option>
				<option value="Rabu">Rabu</option>
				<option value="Kamis">Kamis</option>
				<option value="Jumat">Jum'at</option>
				<option value="Sabtu">Sabtu</option>
				<option value="Minggu">Minggu</option>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Ruang</label>
		<div class="col-md-5">
			<select name="id_ruang" class="form-control">
				<option value="">-</option>
				<?php $no = 1; ?>
				<?php foreach ($ruang as $ruang) { ?>
				<option value="<?php echo $ruang->id_ruang ?>"><?php echo $no ?>. <?php echo $ruang->nama_ruang ?></option>
				<?php $no++; ?>
				<?php } ?>
			</select>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jam Mulai</label>
		<div class="col-md-1">
			<input type="number" min="0" max="24" name="j_mulai" class="form-control" placeholder="00" value="<?php echo set_value('j_mulai') ?>" required>Jam
		</div>
		<div class="col-md-1">
			<input type="number" min="0" max="59" name="m_mulai" class="form-control" placeholder="00" value="<?php echo set_value('m_mulai') ?>" required>Menit
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jam Selesai</label>
		<div class="col-md-1">
			<input type="number" min="0" max="24" name="j_akhir" class="form-control" placeholder="00" value="<?php echo set_value('j_akhir') ?>" required>Jam
		</div>
		<div class="col-md-1">
			<input type="number" min="0" max="59" name="m_akhir" class="form-control" placeholder="00" value="<?php echo set_value('m_akhir') ?>" required>Menit
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