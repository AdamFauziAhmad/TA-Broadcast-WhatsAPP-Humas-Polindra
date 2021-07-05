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


                             <!-- <a href="#" class="btn btn-block bg-gradient-primary" style="width: 20%; display: inline;" data-toggle="modal" data-target="#addNewModal">Tambah Data</a>
                             <a href="#" form="kontak-checkbox" type="submit" class="btn btn-block bg-gradient-secondary" style="width: 20%; display: inline;">Buat Pesan Broadcast</a> -->


                             <!-- <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                 Tambah Data
                             </button> -->
                             <!-- <div class="dropdown-menu" role="menu">
                                 <a data-toggle="modal" data-target="#addNewModal" class="btn btn-block btn-outline-primary btn-sm" href="#">Tambah Kontak</a>
                                 <div class="dropdown-divider"></div>
                                 <a data-toggle="modal" data-target="#addImport" class="btn btn-block btn-outline-success btn-sm" href="#">Import Kontak</a>
                             </div> -->

                             <!-- <button data-toggle="modal" data-target="#addNewModal" type="button" class="btn btn-block bg-gradient-primary" style="width: 20%; display: inline;">Tambah Data</button> -->
                             <!-- <button form="kontak-checkbox" type="submit" class="btn btn-inline btn-outline-secondary col-2">Buat Pesan Broadcast</button> -->


                             <div class="card-tools">
                                 <form action="<?php echo site_url('history'); ?>" method="get">
                                     <div class="input-group input-group-sm" style="width: 150px; margin-top: 5px;">

                                         <input type="text" name="table_search" value="" class="form-control float-right" placeholder="Search">

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
                             <?php echo $this->session->flashdata('message'); ?>
                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $junlah_kontak ?></b></p>
                         </div>
                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <!-- <form id="kontak-checkbox" action="<?php //echo site_url('pesan_bc'); 
                                                                        ?>" method="post"> -->
                             <table class="table table-head-fixed text-nowrap">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama File</th>
                                         <th>Keterangan</th>
                                         <!-- <th>Kelas</th>
                                             <th>Tahun Masuk</th> -->
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


 <!-- /.content -->

 <!-- /.content-wrapper -->