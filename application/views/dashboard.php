 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <!-- Main content -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Dashboard</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item active">Dashboard</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">

         <!-- Default box -->

         <div class="card">
             <div class="card-header">
                 <h3 class="card-title"></h3>

                 <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                         <i class="fas fa-minus"></i>
                     </button>
                 </div>
             </div>
             <div class="card-body">
                 <div class="row justify-content-center">
                     <div class="col-lg-4 col-12 col-sm-12">
                         <!-- small box -->
                         <div class="small-box bg-secondary">
                             <div class="inner">
                                 <h2><b>Broadcast Pesan</b></h2>

                             </div>
                             <div class="icon">
                                 <i class="fas fa-comment-dots"></i>
                             </div>
                             <a type="button" class="small-box-footer dropdown-toggle dropdown-icon " data-toggle="dropdown">
                                 Pilih untuk membuat pesan
                             </a>
                             <div class="dropdown-menu col-12" role="menu">
                                 <a data-target="#addNewModal" class="btn btn-block btn-outline-primary btn-sm" href="<?php echo base_url('kontakwa/index/') . "1" ?>"><i class="fas fa-comment-dots"></i> Broadcast Kontak</a>
                                 <div class="dropdown-divider"></div>
                                 <a data-target="#addImport" class="btn btn-block btn-outline-success btn-sm" href="<?php echo base_url('grup/index/') . "2" ?>"><i class="fas fa-comment-dots"></i> Broadcast Grup</a>
                             </div>
                         </div>
                     </div>


                     <div class="row  justify-content-center">
                         <div class="card">
                             <!-- /.card-header -->
                             <div class="card-body">
                                 <blockquote>
                                     <p style="text-align: justify;"> Selamat datang <?php echo $this->session->userdata('nama_admin'); ?>, Semoga Anda Sehat selalu</br>Ini Adalah <b>Website Generator Script Whatsapp Broadcast Untuk Humas Polindra</b></br>Website Ini Digunakan Untuk Mengatur kontak Whatsapp dan Generate Pesan Broadcast Whatsapp dengan Script AHK(AutoHotKey). </br>Silahkan kelola website ini dengan baik. <a href="<?php echo base_url();  ?>assets/file/userguide/User Guide Aplikasi.docx">Download user guide disini</a>.</br> Jika belum menginstall AHK anda bisa download di : <a href="<?php echo base_url();  ?>assets/file/support/AutoHotkey_1.1.33.06_setup.exe" download>Download AHK.exe</a> </p>

                                 </blockquote>
                             </div>
                             <!-- /.card-body -->
                         </div>
                         <!-- /.card -->


                     </div>


                     <div class="col-lg-4 col-12 col-sm-12">
                         <!-- small box -->
                         <div class="small-box bg-info">
                             <div class="inner">
                                 <h3><?php echo $data_kontak ?></h3>

                                 <p>Jumlah Kontak Saat Ini</p>
                             </div>
                             <div class="icon">
                                 <i class="fas fa-phone-square-alt"></i>
                             </div>
                             <a href="<?php echo base_url('kontakwa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-12 col-sm-12">
                         <!-- small box -->
                         <div class="small-box bg-success">
                             <div class="inner">
                                 <h3><?php echo $data_grup  ?></h3>

                                 <p>Jumlah GRUP Saat Ini</p>
                             </div>
                             <div class="icon">
                                 <i class="fas fa-users"></i>
                             </div>
                             <a href="<?php echo base_url('grup') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-4 col-12 col-sm-12">
                         <!-- small box -->
                         <div class="small-box bg-warning">
                             <div class="inner">
                                 <h3><?php echo $data_history ?></h3>

                                 <p>Jumlah Data File AHK Terdownload</p>
                             </div>
                             <div class="icon">
                                 <i class="fas fa-file-download"></i>
                             </div>
                             <a href="<?php echo base_url('history') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                         </div>
                     </div>
                     <!-- ./col -->

                     <!-- ./col -->
                 </div>
                 <!-- /.row -->

                 <!-- /.card-body -->

                 <!-- /.card-footer-->
             </div>
             <!-- /.card -->


     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <script>
     // The Calender
     $('#calendar').datetimepicker({
         format: 'L',
         inline: true
     })
 </script>

 <!-- jQuery -->
 <script src="plugins/jquery/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- ChartJS -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/chart.js/Chart.min.js"></script>
 <!-- Sparkline -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/sparklines/sparkline.js"></script>
 <!-- JQVMap -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/jqvmap/jquery.vmap.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
 <!-- jQuery Knob Chart -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/jquery-knob/jquery.knob.min.js"></script>
 <!-- daterangepicker -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/moment/moment.min.js"></script>
 <script src="<?php echo base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
 <!-- Summernote -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
 <!-- overlayScrollbars -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url(); ?>assets/template/dist/js/adminlte.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url(); ?>assets/template/dist/js/demo.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="<?php echo base_url(); ?>assets/template/dist/js/pages/dashboard.js"></script>