<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/ruang/tambah'),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Ruang</label>
		<div class="col-md-5">
			<input type="text" name="nama_ruang" class="form-control" placeholder="Nama Ruang" value="<?php echo set_value('nama_ruang') ?>" required>
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