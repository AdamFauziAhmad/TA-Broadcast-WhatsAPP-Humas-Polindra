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
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
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

                             <a href="<?= base_url('history/export_pdf'); ?>" class="btn btn-inline bg-gradient-danger"><i class="fas fa-file-download"></i> PDF</a>


                             <div class="card-tools">

                                 <form action="<?php echo site_url('history'); ?>" method="get">
                                     <div class="input-group  input-group-sm" style="width: 150px; margin-top: 5px;">

                                         <input type="text" name="table_search" value="<?php echo $table_search;  ?>" class="form-control float-right" placeholder="Search">

                                         <div class="input-group-append">
                                             <?php
                                                if ($table_search <> '') {
                                                ?>
                                                 <a href="<?php echo site_url('history'); ?>" class="btn btn-default">X</a>
                                             <?php } ?>
                                             <button type="submit" class="btn btn-default">
                                                 <i class="fas fa-search"></i>
                                             </button>

                                         </div>

                                     </div>
                                 </form>
                             </div>

                             <div class="input-group col-3" style="display: inline-flex;" hidden>
                                 <div class="input-group-prepend">
                                     <span class="input-group-text">
                                         <i class="far fa-calendar-alt"></i>
                                     </span>
                                 </div>
                                 <input type="text" class="form-control float-right" id="reservation">
                             </div>

                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $junlah_kontak ?></b></p>
                         </div>
                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->



                         <!-- /.input group -->

                         <table class="table table-head-fixed text-nowrap">
                             <thead>
                                 <tr>
                                     <th>#</th>
                                     <th>Nama File</th>
                                     <th>Keterangan</th>

                                     <th>Tanggal Download</th>
                                     <th>#</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $count = 0;
                                    foreach ($riwayat->result() as $row) :
                                        $count++;
                                        $tanggal = date('d/m/Y', strtotime($row->waktu));
                                    ?>
                                     <tr>
                                         <td> <?php echo $count; ?> </td>
                                         <td style="width: 2px;" hidden><input name="jenis" value="1" type="text"> </td>
                                         <td><?php echo $row->nama_file; ?></td>
                                         <td><?php echo $row->keterangan; ?></td>
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
 <!-- jQuery -->
 <script src="<?= base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- date-range-picker -->
 <script src="<?= base_url(); ?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
 <!-- AdminLTE App -->
 <script src="<?= base_url(); ?>assets/template/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?= base_url(); ?>assets/template/dist/js/demo.js"></script>
 <script>
     $(function() {
         //Initialize Select2 Elements
         $('.select2').select2()

         //Initialize Select2 Elements
         $('.select2bs4').select2({
             theme: 'bootstrap4'
         })

         //Datemask dd/mm/yyyy
         $('#datemask').inputmask('dd/mm/yyyy', {
             'placeholder': 'dd/mm/yyyy'
         })
         //Datemask2 mm/dd/yyyy
         $('#datemask2').inputmask('mm/dd/yyyy', {
             'placeholder': 'mm/dd/yyyy'
         })
         //Money Euro
         $('[data-mask]').inputmask()

         //Date range picker
         $('#reservationdate').datetimepicker({
             format: 'L'
         });
         //Date range picker
         $('#reservation').daterangepicker()
         //Date range picker with time picker
         $('#reservationtime').daterangepicker({
             timePicker: true,
             timePickerIncrement: 30,
             locale: {
                 format: 'MM/DD/YYYY hh:mm A'
             }
         })


     })
     // BS-Stepper Init

     // DropzoneJS Demo Code End
 </script>



 <!-- /.content -->

 <!-- /.content-wrapper -->