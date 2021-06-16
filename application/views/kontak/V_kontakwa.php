 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Data Kontak</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Data Kontak</li>
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

                             <button data-toggle="modal" data-target="#addNewModal" type="button" class="btn btn-block bg-gradient-primary" style="width: 20%; display: inline;">Tambah Data</button>
                             <button form="kontak-checkbox" type="submit" class="btn btn-block bg-gradient-secondary" style="width: 20%; display: inline; margin-bottom: 5px;">Buat Pesan Broadcast</button>


                             <div class="card-tools">
                                 <form action="<?php echo site_url('kontakwa'); ?>" method="get">
                                     <div class="input-group input-group-sm" style="width: 150px; margin-top: 5px;">

                                         <input type="text" name="table_search" value="<?php echo $table_search;  ?>" class="form-control float-right" placeholder="Search">

                                         <div class="input-group-append">

                                             <?php
                                                if ($table_search <> '') {
                                                ?>
                                                 <a href="<?php echo site_url('kontakwa'); ?>" class="btn btn-default">X</a>
                                             <?php
                                                }
                                                ?>
                                             <button type="submit" class="btn btn-default">
                                                 <i class="fas fa-search"></i>
                                             </button>

                                         </div>

                                     </div>
                                 </form>
                             </div>
                             <?php echo $this->session->flashdata('message'); ?>
                         </div>
                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <form id="kontak-checkbox" action="<?php echo site_url('pesan_bc'); ?>" method="post">
                                 <table class="table table-head-fixed text-nowrap">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th colspan="2">Nama</th>
                                             <th>Nomor Kontak</th>
                                             <th>Kelas</th>
                                             <th>Tahun Masuk</th>
                                             <th>Status</th>
                                             <th>#</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php
                                            $count = 0;
                                            foreach ($kontak->result() as $row) :
                                                $count++;
                                            ?>
                                             <tr>
                                                 <td> <?php echo $count; ?> </td>
                                                 <td style="width: 2px;"><input name="id_kontak[]" value="<?php echo $row->id_kontak ?>" type="checkbox"> </td>
                                                 <td style="width: 2px;" hidden><input name="jenis" value="1" type="text"> </td>
                                                 <td><?php echo $row->nama_kontak; ?></td>
                                                 <td><?php echo $row->nomor_kontak; ?></td>
                                                 <td><?php echo $row->kelas ?></td>
                                                 <td><?php echo $row->tahun_masuk; ?></td>
                                                 <td><?php echo $row->status; ?></td>
                                                 <td>
                                                     <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_kontak; ?>">Edit</a>
                                                     <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id_kontak; ?>">Delete</a>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>

                                     </tbody>
                                 </table>
                             </form>
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

         <!-- //modal tambah -->
         <div class="modal fade" id="addNewModal" role="dialog">
             <div class="modal-dialog" role="dokumen">
                 <div class="modal-content card card-primary">

                     <div class="card-header">
                         <h3 class="card-title">Tambah Kontak</h3>
                     </div>
                     <!-- /.card-header -->

                     <!-- form start -->
                     <form action="<?php echo site_url('kontakwa/tambah_kontak'); ?>" method="post">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="nama_kontak">Nama Kontak</label>
                                 <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Mauskan Nama Kontak WA">
                             </div>
                             <div class="form-group">
                                 <label for="nomor_kontak">Nomor Kontak</label>
                                 <input type="number" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                             </div>
                             <div class="form-group">
                                 <label for="kelas">Kelas</label>
                                 <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                             </div>
                             <div class="form-group">
                                 <label for="tahun_masuk">Tahun Masuk</label>
                                 <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                             </div>
                             <div class="form-group">
                                 <label for="status">Status</label>
                                 <input type="text" class="form-control" id="status" name="status" placeholder="Masukan status">
                             </div>

                             <!-- <div class="form-group">
                                 <label for="exampleInputFile">File input</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Upload</span>
                                     </div>
                                 </div>
                             </div> -->
                             <!-- <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             </div> -->
                         </div>
                         <!-- /.card-body -->

                         <div class="card-footer">
                             <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- //modal tambah -->



         <!-- //modal Edit -->
         <?php foreach ($kontak->result() as $row) : ?>
             <div class="modal fade" id="modal_edit<?php echo $row->id_kontak; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-success">

                         <div class="card-header">
                             <h3 class="card-title">Edit Kontak</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('kontakwa/edit_kontak'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="nama_kontak">Nama Kontak</label>
                                     <input type="text" value="<?php echo $row->nama_kontak; ?>" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Mauskan Nama Kontak WA">
                                 </div>
                                 <div class="form-group">
                                     <input type="text" value="<?php echo $row->id_kontak; ?>" class="form-control" id="id_kontak" name="id_kontak" hidden>
                                 </div>
                                 <div class="form-group">
                                     <label for="nomor_kontak">Nomor Kontak</label>
                                     <input type="number" value="<?php echo $row->nomor_kontak; ?>" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                                 </div>
                                 <div class="form-group">
                                     <label for="kelas">Kelas</label>
                                     <input type="text" value="<?php echo $row->kelas; ?>" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                                 </div>
                                 <div class="form-group">
                                     <label for="tahun_masuk">Tahun Masuk</label>
                                     <input type="text" value="<?php echo $row->tahun_masuk; ?>" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                                 </div>
                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <input type="text" value="<?php echo $row->status; ?>" class="form-control" id="status" name="status" placeholder="Masukan status">
                                 </div>

                                 <!-- <div class="form-group">
                                 <label for="exampleInputFile">File input</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Upload</span>
                                     </div>
                                 </div>
                             </div> -->
                                 <!-- <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             </div> -->
                             </div>
                             <!-- /.card-body -->

                             <div class="card-footer">
                                 <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <!-- //End modal Edit -->


             <!-- //modal hapus -->
             <div class="modal fade" id="modal_hapus<?php echo $row->id_kontak; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-danger">

                         <div class="card-header">
                             <h3 class="card-title">Hapus Kontak</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('kontakwa/hapus_kontak'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <p>Apakah Anda Yakin Ingin Menghapus Kontak WA <?php echo $row->nama_kontak  ?> ini ?</p>
                                     <input type="hidden" value="<?php echo $row->id_kontak; ?>" name="id_kontak">
                                 </div>

                                 <!-- <div class="form-group">
                                 <label for="exampleInputFile">File input</label>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="exampleInputFile">
                                         <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                     </div>
                                     <div class="input-group-append">
                                         <span class="input-group-text">Upload</span>
                                     </div>
                                 </div>
                             </div> -->
                                 <!-- <div class="form-check">
                                 <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                 <label class="form-check-label" for="exampleCheck1">Check me out</label>
                             </div> -->
                             </div>
                             <!-- /.card-body -->

                             <div class="card-footer">
                                 <button type="button" class="btn btn-primary" data-dismiss="modal">Batal</button>
                                 <button type="submit" class="btn btn-danger">Ya</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>
         <!-- //End modal hapus -->
         <!-- /.card -->
     </section>
 </div>


 <!-- /.content -->

 <!-- /.content-wrapper -->