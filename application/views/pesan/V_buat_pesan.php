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
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
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
                             <?php
                                if ($jenis == '1') { ?>
                                 <h3 class="card-title">Form Pembuatan Pesan Broadcast</h3>
                                 <?php  } else {
                                    foreach ($nama_grup as $nama_grup) : ?>
                                     <h3 class="card-title">Form Pembuatan Pesan Broadcast <?php echo $nama_grup->nama_grup  ?></h3>
                             <?php endforeach;
                                }    ?>
                         </div>

                         <div class="card-body">
                             <form id="buat-pesan" action="<?php echo base_url('pesan_bc/generate_AHK'); ?>" method="post">
                                 <input class="form-control col-6" value="<?php echo $jenis; ?>" id="jenis" name="jenis" type="text" hidden>
                                 <div class="form-group">
                                     <label for="nama_file">Nama File</label>
                                     <input class="form-control col-6" id="nama_file" name="nama_file" type="text" placeholder="Masukan nama File">
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan</label>
                                     <?php if ($jenis == 1) { ?>
                                         <input value="KONTAK" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File" disabled>
                                     <?php } else { ?>
                                         <input value="GRUP" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File" disabled>
                                     <?php  } ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="pesan">Pesan</label>
                                     <textarea class="form-control col-7" rows="5" id="keterangan" name="pesan" placeholder="Masukan Pesan Anda ..." required></textarea>
                                     <label for="pesan">Aktifkan Hotkey (CTRL+V) paste untuk gambar</label>
                                     <input name="paste_active[]" id="paste_active" value="active" type="checkbox" checked>
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
                                                foreach ($data_kontak as $row) :
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
                             <?php if ($jenis == 1) {

                                ?>
                                 <a href="<?php echo base_url('Kontakwa')  ?>" class="btn btn-block bg-gradient-danger col-6" style="display: inline; ">kembali</a>
                             <?php } else { ?>
                                 <a href="<?php echo base_url('grup')  ?>" class="btn btn-block bg-gradient-danger col-6" style="display: inline; ">kembali</a>
                             <?php  } ?>

                             <button form="buat-pesan" type="submit" class="btn btn-primary col-lg-1 col-3 col-sm-3  ">Simpan</button>

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