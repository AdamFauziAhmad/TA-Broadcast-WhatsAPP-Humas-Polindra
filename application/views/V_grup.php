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

                             <a href="#" class="btn btn-block bg-gradient-primary" style="width: 20%; display: inline;" data-toggle="modal" data-target="#addNewModal">Tambah Data</a>
                             <a href="#" class="btn btn-block bg-gradient-secondary" style="width: 20%; display: inline;" data-toggle="modal" data-target="#newBCWA">Buat Pesan Broadcast</a>



                             <div class="card-tools">
                                 <div class="input-group input-group-sm" style="width: 150px;">
                                     <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                     <div class="input-group-append">
                                         <button type="submit" class="btn btn-default">
                                             <i class="fas fa-search"></i>
                                         </button>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <table class="table table-head-fixed text-nowrap">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama Grup</th>
                                         <th>Jumlah Anggota</th>
                                         <th>Keterangan</th>
                                         <th>#</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $count = 0;
                                        foreach ($grup->result() as $row) :
                                            $count++;
                                        ?>
                                         <tr>
                                             <td><?php echo $count; ?></td>
                                             <td><?php echo $row->nama_grup; ?></td>
                                             <td><?php echo $row->keterangan; ?></td>
                                             <td><?php echo $row->item_grup; ?></td>
                                             <td>
                                                 <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit<?php ?>">Edit</a>
                                                 <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id ?>">Delete</a>
                                             </td>
                                         </tr>
                                     <?php endforeach; ?>

                                 </tbody>
                             </table>
                         </div>
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
                     <form action="<?php echo site_url('grup/tambah_grup'); ?>" method="post">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="nama_grup">Nama Kontak</label>
                                 <input type="text" class="form-control" id="nama_grup" name="nama_grup" placeholder="Mauskan Nama Grup">
                             </div>
                             <div class="form-group">
                                 <label for="keterangan">Keterangan</label>
                                 <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Grup">
                             </div>
                             <div class="form-group">
                                 <label for="kelas">Kelas</label>
                                 <div class="col-sm-12">
                                     <select class="bootstrap-select" name="kontak[]" data-width="100%" data-live-search="true" multiple required>
                                         <?php foreach ($kontak->result() as $row) : ?>
                                             <option value="<?php echo $row->id_kontak; ?>"><?php echo $row->nama_kontak; ?></option>
                                         <?php endforeach; ?>
                                     </select>
                                 </div>
                                 <!-- <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas"> -->
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
         <?php foreach ($grup->result() as $row) :
            ?>
             <div class="modal fade" id="modal_edit<?php //echo $row->id_kontak; 
                                                    ?>" role="dialog">
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
                                     <input type="text" value="<?php //echo $row->nama_kontak; 
                                                                ?>" class="form-control" id="nama_kontak" name="nama_kontak" placeholder="Mauskan Nama Kontak WA">
                                 </div>
                                 <div class="form-group">
                                     <input type="text" value="<?php //echo $row->id_kontak; 
                                                                ?>" class="form-control" id="id_kontak" name="id_kontak" hidden>
                                 </div>
                                 <div class="form-group">
                                     <label for="nomor_kontak">Nomor Kontak</label>
                                     <input type="number" value="<?php //echo $row->nomor_kontak; 
                                                                    ?>" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                                 </div>
                                 <div class="form-group">
                                     <label for="kelas">Kelas</label>
                                     <input type="text" value="<?php //echo $row->kelas; 
                                                                ?>" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                                 </div>
                                 <div class="form-group">
                                     <label for="tahun_masuk">Tahun Masuk</label>
                                     <input type="text" value="<?php //echo $row->tahun_masuk; 
                                                                ?>" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                                 </div>
                                 <div class="form-group">
                                     <label for="status">Status</label>
                                     <input type="text" value="<?php //echo $row->status; 
                                                                ?>" class="form-control" id="status" name="status" placeholder="Masukan status">
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
             <!-- //End modal Edit -->


             <!-- //modal hapus -->
             <div class="modal fade" id="modal_hapus<?php echo $row->id; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-danger">

                         <div class="card-header">
                             <h3 class="card-title">Hapus Kontak</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('grup/hapus_grup'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <p>Apakah Anda Yakin Ingin Menghapus Grup Kontak <?php echo $row->nama_grup; ?> ini ?</p>
                                     <input type="hidden" value="<?php echo $row->id; ?>" name="id">
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
         <?php endforeach;
            ?>
         <!-- //End modal hapus -->
         <!-- /.card -->
 </div>
 <!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->