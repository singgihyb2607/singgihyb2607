<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/matkul/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Kode Mata Kuliah</label>
		<div class="col-md-5">
			<input type="text" name="id_matkul" class="form-control" placeholder="ex. 16010101" value="<?php echo set_value('id_matkul') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Mata Kuliah</label>
		<div class="col-md-5">
			<input type="text" name="nama_matkul" class="form-control" placeholder="Nama Mata Kuliah" value="<?php echo set_value('nama_matkul') ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jumlah SKS</label>
		<div class="col-md-5">
			<input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" value="<?php echo set_value('sks') ?>" required>
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