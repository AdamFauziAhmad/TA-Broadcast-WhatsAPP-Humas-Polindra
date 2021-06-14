 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Pesan Broadcast</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Pesan Broadcast</li>
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
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Form Pembuatan Pesan Broadcast</h3>
                         </div>

                         <div class="card-body">
                             <form id="buat-pesan" action="<?php echo site_url('pesan_bc/generate_AHK'); ?>" method="post">
                                 <div class="form-group">
                                     <label for="nama_file">Nama File</label>
                                     <input class="form-control col-6" id="nama_file" name="nama_file" type="text" placeholder="Masukan nama File">
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan</label>
                                     <input class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File">
                                 </div>
                                 <div class="form-group">
                                     <label for="pesan">Pesan</label>
                                     <textarea class="form-control col-7" rows="0" id="keterangan" name="pesan" placeholder="Masukan Pesan Anda ..."></textarea>
                                 </div>
                                 <div class="card-body table-responsive p-0 col-6" style="height: 300px;">
                                     <table class="table table-head-fixed text-nowrap">
                                         <thead>
                                             <tr>
                                                 <th>#</th>
                                                 <th>Nama</th>
                                                 <th>Nomor Kontak</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php
                                                $count = 0;
                                                foreach ($data_kontak->result() as $row) :
                                                    $count++;
                                                ?>

                                                 <tr>
                                                     <td> <?php echo $count; ?> </td>
                                                     <td hidden> <input name="id_kontak[]" id="id_kontak" type="text" value="<?php echo $row->id_kontak ?>"> </td>
                                                     <td><?php echo $row->nama_kontak; ?></td>
                                                     <td><?php echo $row->nomor_kontak; ?></td>
                                                 </tr>
                                             <?php endforeach; ?>
                                         </tbody>
                                     </table>


                                 </div>
                             </form>

                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <button form="buat-pesan" type="reset" class="btn btn-danger col-3">Batal</button>
                             <button form="buat-pesan" type="submit" class="btn btn-primary col-3">Simpan</button>
                         </div>

                     </div>
                     <!-- /.card -->
                     <!-- /.card -->
                 </div>
             </div>

             <!-- /.col -->
         </div>
         <!-- /.row -->






         <!-- /.card -->
     </section>
 </div>


 <!-- /.content -->

 <!-- /.content-wrapper -->