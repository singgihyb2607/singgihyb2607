<?php 
// notif error
echo validation_errors('<div class="alert alert-warning">','</div>');

// form open
echo form_open(base_url('admin/user/editpass/'.$user->id_user),' class="form-horizontal"');
?>


<div class="form-group">
	<label class="col-md-2 control-label">Password Lama</label>
		<div class="col-md-5">
			<input type="text" class="form-control" placeholder="Password Lama" value="<?php echo $user->password ?>" readonly>
		</div>
</div>

<div class="form-group">
	<label class="col-md-2 control-label">Password Baru</label>
		<div class="col-md-5">
			<input type="password" name="password" class="form-control" placeholder="Password Baru">
		</div>
</div>


<div class="form-group">
	<label class="col-md-2 control-label"></label>
		<div class="col-md-5">
			<button class="btn btn-success btn-lg" name="submit" type="submit"><i class="fa fa-save"></i> Simpan
			</button>
			<button class="btn btn-info btn-lg" name="reset" type="reset"><i class="fa fa-times"></i> Reset
			</button>
		</div>
</div>

<?php echo form_close(); ?>