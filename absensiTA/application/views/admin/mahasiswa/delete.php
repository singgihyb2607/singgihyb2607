<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-<?php echo $mahasiswa->npm ?>">
	<i class="fa fa-trash-o"></i> Hapus
</button>

<div class="modal modal-danger fade" id="delete-<?php echo $mahasiswa->npm ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Hapus Data Produk</h4>
      </div>
      <div class="modal-body">
        <div class="callout callout-warning">
	        <h4>Reminder!</h4>
	        Ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan...!
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <a href="<?php echo base_url('admin/mahasiswa/delete/'.$mahasiswa->npm) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Ya, Hapus data</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->