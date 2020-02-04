
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3><?php echo $jml; ?></h3>

          <p>Mahasiswa Terdaftar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person"></i>
        </div>
        <a href="<?php echo base_url('admin/mahasiswa') ?>" class="small-box-footer">Show Data <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>


<div class="col-md-9">
    <div class="box box-primary bordered">
        <div class="box-header with-border">
            <h3 class="box-title">Mahasiswa Baru</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <ul class="users-list clearfix">
                <?php
                    foreach ($mahasiswa as $mahasiswa) {
                ?>
                <li>
                    <img src="<?php echo base_url('assets/upload/image/thumbs/'.$mahasiswa->gambar) ?>" class="img img-responsive img-thumbnail" width="60" style="height: 60px;">
                    <a class="users-list-name" href="#"><?php echo $mahasiswa->nick ?></a>
                    <span class="users-list-date"><?php echo ucfirst($mahasiswa->progdi) ?></span>
                </li>
                <?php } ?>
            </ul>
        <!-- /.users-list -->
        </div>
    </div>
</div>