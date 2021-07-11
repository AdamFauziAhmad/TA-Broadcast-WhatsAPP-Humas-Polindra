 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Export AHK</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active">Export AHK</li>
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
                             <p> Silahkan tekan tombol export untuk mendownload file ahk yang berisi Pesan Broadcast ! </p>
                             <form id="buat-pesan" action="<?php echo site_url('pesan_bc/download_AHK'); ?>" method="post" hidden>
                                 <div class="form-group">
                                     <label for="nama_file">Nama File</label>
                                     <?php if ($jenis == "[GRUP]") { ?>
                                         <input value="<?php echo $jenis . " " . $nama_file  ?>" class="form-control col-6" id="nama_file" name="nama_file" type="text" placeholder="Masukan nama File">
                                     <?php } else { ?>
                                         <input value="<?php echo $nama_file  ?>" class="form-control col-6" id="nama_file" name="nama_file" type="text" placeholder="Masukan nama File">
                                     <?php  } ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan</label>
                                     <?php if ($jenis == "[GRUP]") {
                                            $jenis = "GRUP"; ?>
                                         <input value="<?php echo $jenis ?>" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File">
                                     <?php  } else {
                                            $jenis = "KONTAK";
                                        ?>
                                         <input value="<?php echo $jenis ?>" class="form-control col-6" id="keterangan" name="keterangan" type="text" placeholder="Masukan Keterangan File">
                                     <?php  } ?>
                                 </div>
                                 <div class="form-group">
                                     <label for="pesan">Pesan</label>
                                     <textarea class="form-control col-7" rows="0" id="keterangan" name="pesan" placeholder="Masukan Pesan Anda ..."><?php echo $pesan ?></textarea>
                                 </div>


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

                             </form>

                         </div>
                         <!-- /.card-body -->
                         <div class="card-footer">
                             <?php if ($jenis == 1) {

                                ?>
                                 <a href="<?php echo base_url('Kontakwa')  ?>" class="btn btn-inline bg-gradient-danger col-3">kembali</a>
                             <?php } else { ?>
                                 <a href="<?php echo base_url('grup')  ?>" class="btn btn-inline bg-gradient-danger col-3">kembali</a>
                             <?php  } ?>
                             <!-- <a href="<?php //echo base_url('pesan_bc/download_AHK') . "BCWA" . "_" . $nama_file . "_" . $tanggal . ".ahk";
                                            ?>" class="btn btn-block bg-gradient-secondary col-6" style="display: inline;" download>Export</a> -->


                             <button form="buat-pesan" type="submit" class="btn btn-inline bg-gradient-primary col-3">Export</button>
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