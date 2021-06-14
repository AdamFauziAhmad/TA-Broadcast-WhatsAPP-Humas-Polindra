 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <?php foreach ($data as $grup) : ?>
         <!-- Content Header (Page header) -->
         <section class="content-header">
             <div class="container-fluid">
                 <div class="row mb-2">
                     <div class="col-sm-6">
                         <h1>Grup <?php echo $grup->nama_grup ?></h1>
                     </div>
                     <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                             <li class="breadcrumb-item"><a href="#">Home</a></li>
                             <li class="breadcrumb-item active">Grup <?php echo $grup->nama_grup; ?></li>
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
                                 <h3 class="card-title">Disini Terdapat Informasi Detail Grup : <?php echo $grup->nama_grup; ?></h3>
                             </div>

                             <div class="card-body">
                                 <form id="buat-pesan" action="<?php echo site_url('pesan_bc/generate_AHK'); ?>" method="post">
                                     <div class="form-group">
                                         <label for="nama_file">Nama grup</label>
                                         <input value="<?php echo $grup->nama_grup; ?>" class="form-control col-6" id="nama_grup" name="nama_grup" type="text" placeholder="Masukan nama File" disabled>
                                         <input value="<?php echo $grup->id; ?>" class="form-control col-6" id="id" name="id" type="text" placeholder="Masukan nama File" hidden>
                                     </div>
                                     <div class="form-group">
                                         <label for="keterangan">Keterangan</label>
                                         <input value="<?php echo $grup->keterangan; ?>" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File" disabled>
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
                                                    foreach ($kontak as $row) :
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
                                     <div class="form-group">
                                         <label for="keterangan">Jumlah Anggota</label>
                                         <input value="<?php echo $grup->item_grup; ?>" class="form-control col-6" id="jumlah" name="jumlah" type="text" placeholder="Masukan Keterangan File" disabled>
                                     </div>
                                 </form>

                             </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                                 <a href="<?php echo base_url('grup')  ?>" class="btn btn-block bg-gradient-danger col-3" style="display: inline; ">kembali</a>
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
     <?php endforeach; ?>
 </div>


 <!-- /.content -->

 <!-- /.content-wrapper -->