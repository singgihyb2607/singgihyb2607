<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/edit/'.$user->id_user),' class="form-horizontal"');
?>
<div class="form-group">
	<label class="col-md-2 control-label">Username</label>
		<div class="col-md-5">
			<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username ?>" >
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>

<?php echo form_close(); ?>

			<a class="btn btn-primary" href="<?php echo base_url('admin/user') ?>"><i class="fa fa-arrow-left"></i> Kembali</a>
		</div> 
</div>