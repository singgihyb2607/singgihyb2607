<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU NAVIGATION</li>
				
				<!-- MENU DASHBOARD -->
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-home text-aqua"></i> <span>DASHBOARD</span></a></li>
				<!-- END MENU DASHBOARD -->

        <li class="treeview">

          <a href="#">
            <i class="fa fa-database"></i> <span>MASTER DATA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">

            <li class="treeview">
              <a href="#"><i class="fa fa-graduation-cap"></i> <span>MAHASISWA</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('admin/mahasiswa') ?>"><i class="fa fa-table"></i> Data Mahasiswa</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>MATA KULIAH</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('admin/matkul') ?>"><i class="fa fa-table"></i> Data Mata Kuliah</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-sitemap"></i> <span>RUANG</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('admin/ruang') ?>"><i class="fa fa-table"></i> Data Ruang</a>
                </li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-tasks"></i> <span>JADWAL</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('admin/jadwal') ?>"><i class="fa fa-table"></i> Data Jadwal</a>
                </li>
              </ul>
            </li>

            <!-- menu admin -->
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i> <span>ADMIN</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-table"></i> Data Admin</a>
                </li>
              </ul>
            </li>
            <!-- end menu admin -->

          </ul>
        </li>

        <!-- MENU absen -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-check-circle"></i> <span>KEHADIRAN</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/absen') ?>"><i class="fa fa-table"></i> Data Kehadiran</a></li>
            <li><a href="<?php echo base_url('admin/absen/report') ?>"><i class="fa fa-eyedropper"></i> Laporan Kehadiran</a></li>
          </ul>
        </li>
        <!-- END MENU absen -->

            
        <!-- MENU KONFIGURASI 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench"></i> <span>KONFIGURASI</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-tags"></i> Ganti Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-image"></i> Ganti Icon</a></li>
          </ul>
        </li>
         END MENU KONFIGURASI -->
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
