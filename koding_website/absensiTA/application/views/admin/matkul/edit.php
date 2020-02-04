<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/matkul/edit/'.$matkul->id_matkul),' class="form-horizontal"');
?>

<div class="form-group">
	<label class="col-md-2 control-label">Kode Mata Kuliah</label>
		<div class="col-md-5">
			<input type="text" name="id_matkul" style="background-color: #F5F5DC;" class="form-control" placeholder="ex. 16010101" value="<?php echo $matkul->id_matkul ?>" disabled>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Nama Mata Kuliah</label>
		<div class="col-md-5">
			<input type="text" name="nama_matkul" class="form-control" placeholder="Nama Mata Kuliah" value="<?php echo $matkul->nama_matkul ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Jumlah SKS</label>
		<div class="col-md-5">
			<input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" value="<?php echo $matkul->sks ?>" required>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>

<?php echo form_close(); ?>

			<a class="btn btn-primary" href="<?php echo base_url('admin/matkul') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div> 
</div>