 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Riwayat</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active">Riwayat</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <!-- /.row -->
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <form action="<?php echo base_url('history/export_pdf'); ?>" method="get">
                                 <!-- <a href="<?= base_url('history/export_pdf'); ?>" class="btn btn-inline bg-gradient-danger"><i class="fas fa-file-download"></i> PDF</a> -->
                                 <button type="submit" class="btn btn-inline bg-gradient-danger "><i class="fas fa-file-download"></i> PDF</button>
                                 <input type="text" value="<?php echo $table_daterange; ?>" class="form-control float-right" id="dates_download" name="dates_download" hidden>
                             </form>
                             <div class="card-tools ">

                                 <form action="<?php echo base_url('history'); ?>" method="get">
                                     <div class="input-group  input-group-sm " style="width: 180px;">

                                         <input type=" text" name="table_search" value="<?php echo $table_search;  ?>" class="form-control float-right col-md-4 offset-md-6" placeholder="Search" hidden>
                                         <input type="text" value="<?php echo $table_daterange; ?>" class="form-control float-right col-md-10 offset-md-2" id="dates" name="dates" placeholder="Pilih Tanggal">

                                         <div class="input-group-append">
                                             <?php
                                                if ($table_search <> '' || $table_daterange <> '') {
                                                ?>
                                                 <a href="<?php echo base_url('history'); ?>" class="btn btn-danger">X</a>
                                             <?php } ?>
                                             <button type="submit" class="btn btn-default">
                                                 <!-- <i class="fas fa-search"></i> -->
                                                 <i class="fas fa-filter"></i>
                                             </button>

                                         </div>

                                     </div>
                                 </form>
                             </div>

                             <!-- <div class="input-group col-3" style="display: inline-flex;">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text">
                                         <i class="far fa-calendar-alt"></i>
                                     </span>
                                 </div>
                                 <input type="text" class="form-control float-right" id="dates" name="dates">
                             </div> -->

                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $junlah_kontak ?></b></p>
                         </div>
                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->



                         <!-- /.input group -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <table class="table table-head-fixed text-nowrap">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama File</th>
                                         <th>Keterangan</th>
                                         <th>Jumlah Kontak</th>
                                         <th>Tanggal Download</th>
                                         <th>#</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $count = 0;
                                        foreach ($riwayat->result() as $row) :
                                            $count++;
                                            $tanggal = date('d/m/Y', strtotime($row->tgl_download));
                                        ?>
                                         <tr>
                                             <td> <?php echo $count; ?> </td>
                                             <td style="width: 2px;" hidden><input name="jenis" value="1" type="text"> </td>
                                             <td><?php echo $row->nama_file; ?></td>
                                             <td><?php echo $row->keterangan; ?></td>
                                             <td><?php echo $row->jumlah_kontak ?></td>
                                             <td><?php echo $tanggal; ?></td>
                                             <!-- <td>
                                                     <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_kontak; ?>">Edit</a>
                                                     <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id_kontak; ?>">Delete</a>
                                                 </td> -->
                                         </tr>
                                     <?php endforeach; ?>

                                 </tbody>

                             </table>
                             <!-- </form> -->

                         </div>
                         <!-- end tampilan tabel Kontak -->
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
             </div>

             <!-- /.col -->
         </div>
         <!-- /.row -->
     </section>
 </div>
 </div>

 <!-- jQuery -->
 <!-- jQuery -->
 <!-- <script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script> -->
 <!-- Bootstrap 4 -->
 <!-- <script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
 <!-- date-range-picker -->
 <!-- <script src="<?= base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script> -->
 <!-- AdminLTE App -->
 <!-- <script src="<?= base_url(); ?>assets/template/dist/js/adminlte.min.js"></script> -->
 <!-- AdminLTE for demo purposes -->
 <!-- <script src="<?= base_url(); ?>assets/template/dist/js/demo.js"></script> -->
 <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script> -->
 <script>
     //      $(function() {

     //          $('input[name="datefilter"]').daterangepicker({
     //              autoUpdateInput: false,
     //              locale: {
     //                  cancelLabel: 'Clear'
     //              }
     //          });

     //          $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
     //              $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
     //          });

     //          $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
     //              $(this).val('');
     //          });

     //      });
     //      // BS-Stepper Init

     //      // DropzoneJS Demo Code End
     //  
 </script>



 <!-- /.content -->

 <!-- /.content-wrapper -->