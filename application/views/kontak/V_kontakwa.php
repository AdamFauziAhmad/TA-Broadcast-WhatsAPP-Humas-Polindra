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


                             <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                 Tambah Data
                             </button>
                             <div class="dropdown-menu" role="menu">
                                 <a data-toggle="modal" data-target="#addNewModal" class="btn btn-block btn-outline-primary btn-sm" href="#">Tambah Kontak</a>
                                 <div class="dropdown-divider"></div>
                                 <a data-toggle="modal" data-target="#addImport" class="btn btn-block btn-outline-success btn-sm" href="#">Import Kontak</a>
                             </div>

                             <!-- <button data-toggle="modal" data-target="#addNewModal" type="button" class="btn btn-block bg-gradient-primary" style="width: 20%; display: inline;">Tambah Data</button> -->
                             <button form="kontak-checkbox" type="submit" class="btn btn-inline btn-outline-secondary col-2">Buat Pesan Broadcast</button>


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
                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $junlah_kontak ?></b></p>
                         </div>

                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <form id="kontak-checkbox" action="<?php echo site_url('pesan_bc'); ?>" method="post">
                                 <table class="table table-head-fixed text-nowrap">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th><input onchange="checkall(this)" type="checkbox"></th>
                                             <th>Nama</th>
                                             <th>Nomor Kontak</th>
                                             <!-- <th>Kelas</th>
                                             <th>Tahun Masuk</th> -->
                                             <th>keterngan</th>
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
                                                 <!-- <td><?php //echo $row->kelas 
                                                            ?></td>
                                                 <td><?php // echo $row->tahun_masuk; 
                                                        ?></td> -->
                                                 <td><?php echo $row->keterangan; ?></td>
                                                 <td>
                                                     <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_kontak; ?>">Edit</a>
                                                     <a href="#" class="btn btn-block bg-gradient-primary btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_detail<?php echo $row->id_kontak; ?>">Detail</a>
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
                                 <label>Keterangan </label>
                                 <select class="form-control" id="keterangan" name="keterangan">
                                     <option value="Lainnya">Lainnya</option>
                                     <option value="Mahasiswa">Mahasiswa</option>
                                     <option value="Dosen">Dosen</option>
                                     <option value="Pegawai Polindra">Pegawai Polindra</option>
                                 </select>
                             </div>
                             <div class="form-group" name="kelas_tag" id="kelas_tag">
                                 <label for="kelas">Kelas</label>
                                 <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas">
                             </div>
                             <div class="form-group" name="tahun_masuk_tag" id="tahun_masuk_tag">
                                 <label for="tahun_masuk">Tahun Masuk</label>
                                 <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk">
                             </div>
                             <div class="form-group" id="jurusan_tags">
                                 <label>Jurusan</label>
                                 <select class="form-control" id="jurusan" name="jurusan">
                                     <option value="Teknik Mesin">Teknik Mesin</option>
                                     <option value="Teknik Pendigin">Teknik Pendigin</option>
                                     <option value="Teknik Informatika">Teknik Informatika</option>
                                     <option value="Keperawatan">Keperawatan</option>

                                 </select>

                             </div>






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
         <!-- //modal tambah Import Excel -->
         <div class="modal fade" id="addImport" role="dialog">
             <div class="modal-dialog" role="dokumen">
                 <div class="modal-content card card-success">

                     <div class="card-header">
                         <h3 class="card-title">Import Excel</h3>
                     </div>
                     <!-- /.card-header -->

                     <!-- form start -->
                     <form action="<?php echo site_url('kontakwa/import_excel'); ?>" method="post" enctype="multipart/form-data">
                         <div class="card-body">


                             <div class="form-group">
                                 <label for="file">File input</label>
                                 <a class="btn btn-inline btn-outline-success btn-sm float-right" href="<?php echo base_url();  ?>assets/file/format_excel_import/Format Import Excel_BCWA.xlsx" download>Download Fromat</a>
                                 <div class="input-group">
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="file" name="file">
                                         <label class="custom-file-label" for="file">Choose file</label>
                                     </div>
                                 </div>
                             </div>

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
         <!-- //modal tambah import excel-->



         <?php foreach ($kontak->result() as $row) : ?>

             <!-- //modal Detail -->
             <div class="modal fade" id="modal_detail<?php echo $row->id_kontak; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-Primary">

                         <div class="card-header">
                             <h3 class="card-title">Detail Kontak</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="nama_kontak">Nama Kontak</label>
                                     <input type="text" value="<?php echo $row->nama_kontak; ?>" class="form-control" id="nama_kontak" name="nama_kontak" disabled>
                                 </div>
                                 <div class="form-group">
                                     <input type="text" value="<?php echo $row->id_kontak; ?>" class="form-control" id="id_kontak" name="id_kontak" hidden>
                                 </div>
                                 <div class="form-group">
                                     <label for="nomor_kontak">Nomor Kontak</label>
                                     <input type="number" value="<?php echo intval($row->nomor_kontak);  ?>" class="form-control" id="nomor_kontak" name="nomor_kontak" disabled>
                                 </div>
                                 <div class="form-group">
                                     <label>Keterangan </label>
                                     <select class="form-control" id="edit_keterangan" name="keterangan" disabled>
                                         <option value="Lainnya" <?php echo ($row->keterangan == 'Lainnya' ?  'selected' : ''); ?>>Lainnya</option>
                                         <option value="Mahasiswa" <?php echo ($row->keterangan == "Mahasiswa" ? 'selected' : ''); ?>>Mahasiswa</option>
                                         <option value="Dosen" <?php echo ($row->keterangan ==  'Dosen' ? 'selected' : ''); ?>>Dosen</option>
                                         <option value="Pegawai Polindra" <?php echo ($row->keterangan == 'Pegawai Polindra' ? 'selected' : ''); ?>>Pegawai Polindra</option>
                                     </select>
                                 </div>
                                 <div class="form-group" name="kelas_tag" id="kelas_tag">
                                     <label for="kelas">Kelas</label>
                                     <?php if ($row->kelas == null) { ?>
                                         <input type="text" value="<?php echo "-"; ?>" class="form-control" id="kelas" name="kelas" disabled>
                                     <?php } else { ?>
                                         <input type="text" value="<?php echo $row->kelas; ?>" class="form-control" id="kelas" name="kelas" disabled>
                                     <?php } ?>
                                 </div>
                                 <div class="form-group" name="tahun_masuk_tag" id="tahun_masuk_tag">
                                     <label for="tahun_masuk">Tahun Masuk</label>
                                     <?php if ($row->tahun_masuk == null) { ?>
                                         <input value="<?php echo "-"; ?>" type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" disabled>
                                     <?php } else { ?>
                                         <input value="<?php echo $row->tahun_masuk  ?>" type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" disabled>
                                     <?php } ?>

                                 </div>

                                 <div class="form-group" id="jurusan_tags_edit">
                                     <label>Jurusan </label>
                                     <?php if ($row->jurusan == null) { ?>
                                         <input value="<?php echo "-"; ?>" type="text" class="form-control" id="jurusan" name="jurusan" disabled>
                                     <?php  } else { ?>
                                         <input value="<?php echo $row->jurusan; ?>" type="text" class="form-control" id="jurusan" name="jurusan" disabled>
                                     <?php  } ?>

                                 </div>
                             </div>
                             <!-- /.card-body -->

                             <div class="card-footer">
                                 <button type="button" class="btn btn-danger" data-dismiss="modal">kembali</button>

                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <!-- end modal detail -->

             <!-- //modal Edit -->

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
                                     <input type="number" value="<?php echo intval($row->nomor_kontak);  ?>" class="form-control" id="nomor_kontak" name="nomor_kontak" placeholder="Masukan Nomor Kontak WA">
                                 </div>
                                 <div class="form-group">
                                     <label>Keterangan </label>
                                     <select class="form-control" id="edit_keterangan" name="keterangan">
                                         <option value="Lainnya" <?php echo ($row->keterangan == 'Lainnya' ?  'selected' : ''); ?>>Lainnya</option>
                                         <option value="Mahasiswa" <?php echo ($row->keterangan == "Mahasiswa" ? 'selected' : ''); ?>>Mahasiswa</option>
                                         <option value="Dosen" <?php echo ($row->keterangan ==  'Dosen' ? 'selected' : ''); ?>>Dosen</option>
                                         <option value="Pegawai Polindra" <?php echo ($row->keterangan == 'Pegawai Polindra' ? 'selected' : ''); ?>>Pegawai Polindra</option>
                                     </select>
                                 </div>
                                 <div class="form-group" name="kelas_tag" id="kelas_tag">
                                     <label for="kelas">Kelas</label>
                                     <input type="text" value="<?php echo $row->kelas; ?>" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas (Boleh Dikosongkan)">
                                 </div>
                                 <div class="form-group" name="tahun_masuk_tag" id="tahun_masuk_tag">
                                     <label for="tahun_masuk">Tahun Masuk</label>
                                     <input value="<?php echo $row->tahun_masuk;  ?>" type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Masukan Tahun Masuk (Boleh Dikosongkan)">
                                 </div>

                                 <div class="form-group" id="jurusan_tags_edit">
                                     <label>Jurusan </label>
                                     <select class="form-control" id="jurusan" name="jurusan">
                                         <option value="">Pilih Jurusan(Boleh Dikosongkan)</option>
                                         <option value="Teknik Mesin">Teknik Mesin</option>
                                         <option value="Teknik Pendigin">Teknik Pendigin</option>
                                         <option value="Teknik Informatika">Teknik Informatika</option>
                                         <option value="Keperawatan">Keperawatan</option>
                                     </select>
                                 </div>


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

 <!-- /.content-wrapper -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


 <script>
     $(document).ready(function() {
         $('#file').on('change', function() {
             // Ambil nama file 
             let fileName = $(this).val().split('\\').pop();
             // Ubah "Choose a file" label sesuai dengan nama file yag akan diupload
             $(this).next('.custom-file-label').addClass("selected").html(fileName);
         });

         //  $("#keterangan").change(function() {
         //      console.log($("#keterangan option:selected").val());
         //      if ($("#keterangan option:selected").val() == 'Lainnya' || $("#keterangan option:selected").val() == 'Pegawai Polindra') {
         //          $('#kelas_tag').prop('hidden', true);
         //          $('#tahun_masuk_tag').prop('hidden', true);
         //          $('#jurusan_tags').prop('hidden', true);

         //          $('#jurusan').prop('hidden', true);
         //      } else if ($("#keterangan option:selected").val() == 'Mahasiswa') {
         //          $('#kelas_tag').prop('hidden', false);
         //          $('#tahun_masuk_tag').prop('hidden', false);
         //          $('#jurusan_tags').prop('hidden', false);

         //      } else if ($("#keterangan option:selected").val() == 'Dosen') {

         //      }
         //  });







         //  console.log($("#edit_keterangan option:selected").val());


         //  $("#edit_keterangan").change(function() {
         //      console.log($("#edit_keterangan option:selected").val());
         //      if ($("#edit_keterangan option:selected").val() == 'Lainnya') {
         //          $('#tahun_masuk_tag_edit').prop('hidden', true);

         //      } else if ($("#edit_keterangan option:selected").val() == 'Mahasiswa') {
         //          $('#tahun_masuk_tag_edit').prop('hidden', false);

         //      }
         //  });
     });
 </script>