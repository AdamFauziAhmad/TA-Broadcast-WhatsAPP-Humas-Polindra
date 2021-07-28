 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Data Grup</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active">Data Grup</li>
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
                             <a href="#" class="btn btn-block bg-gradient-secondary" style="width: 20%; display: inline;" data-toggle="modal" data-target="#newBCWA">Buat Pesan Broadcast</a> -->
                             <?php if ($jenis != null || $jenis != "") {
                                } else { ?>
                                 <button data-toggle="modal" data-target="#addNewModal" type="button" class="btn btn-inline btn-primary col-lg-2 col-5 col-xl-2 col-sm-3">Tambah Data</button>
                             <?php  } ?>
                             <!-- <button form="kontak-checkbox" type="submit" class="btn btn-block bg-gradient-secondary" style="width: 20%; display: inline; margin-bottom: 5px;">Buat Pesan Broadcast</button> -->
                             <button form="kontak-checkbox" type="submit" class="btn btn-inline btn-secondary col-lg-2 col-xl-2 col-6 col-sm-3">Broadcast WA <i class="fas fa-comment-dots"></i></button>

                             <div class="card-tools">
                                 <form action="<?php echo base_url('grup'); ?>" method="get">
                                     <div class="input-group input-group-sm" style="width: 150px; margin-top: 5px;">

                                         <input type="text" name="table_search" value="<?php echo $table_search;  ?>" class="form-control float-right" placeholder="Search">

                                         <div class="input-group-append">

                                             <?php
                                                if ($table_search <> '') {
                                                ?>
                                                 <a href="<?php echo base_url('grup'); ?>" class="btn btn-danger">X</a>
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
                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $jumlah_grup ?></b></p>



                             <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>

                         </div>
                         <!-- /.card-header -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">
                             <?php echo $this->session->flashdata('bc'); ?>
                             <form id="kontak-checkbox" action="<?php echo base_url('pesan_bc'); ?>" method="post">
                                 <table class="table table-head-fixed text-nowrap">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th colspan="2">Nama Grup</th>
                                             <th>Dekskripsi Grup</th>
                                             <th>Jumlah Anggota</th>
                                             <?php if ($jenis != null || $jenis != "") {
                                                } else { ?>
                                                 <th>#</th>
                                             <?php  } ?>
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
                                                 <td style="width: 2px;"><input name="id_grup" value="<?php echo $row->id ?>" type="radio"> </td>
                                                 <td style="width: 2px;" hidden><input name="jenis" value="2" type="text"> </td>
                                                 <td><?php echo $row->nama_grup; ?></td>
                                                 <td><?php echo $row->keterangan; ?></td>
                                                 <td><?php echo $row->item_grup; ?></td>
                                                 <td>
                                                     <?php if ($jenis != null || $jenis != "") {
                                                        } else { ?>
                                                         <a href="#" class="btn btn-block bg-gradient-success btn-sm edit_grup" style="display: inline;" data-id="<?php echo $row->id; ?>" data-keterangan="<?php echo $row->keterangan; ?>" data-nama_grup=" <?php echo $row->nama_grup; ?>">Edit</a>
                                                         <a href="<?php echo base_url('grup/detail_grup/') . $row->id; ?> " class="btn btn-block bg-gradient-info btn-sm" style="display: inline;">Detail</a>
                                                         <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id ?>">Delete</a>
                                                     <?php  } ?>
                                                 </td>
                                             </tr>
                                         <?php endforeach; ?>

                                     </tbody>
                                 </table>
                             </form>
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
             <div class="modal-dialog modal-lg" role="dokumen">
                 <div class="modal-content card card-primary">

                     <div class="card-header">
                         <h3 class="card-title">Tambah Grup</h3>
                     </div>
                     <!-- /.card-header -->

                     <!-- form start -->
                     <form action="<?php echo site_url('grup/tambah_grup'); ?>" method="post">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="nama_grup">Nama Grup</label>
                                 <input type="text" class="form-control col-6" id="nama_grup" name="nama_grup" placeholder="Mauskan Nama Grup" required>
                             </div>
                             <div class="form-group">
                                 <label for="keterangan">Keterangan</label>
                                 <input type="text" class="form-control col-6" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Grup">
                             </div>
                             <div class="form-group">
                                 <label for="kelas">Kontak</label>
                                 <div class="col-sm-12">
                                     <select class="select2" data-live-search="true" name="kontak[]" id="kontak" multiple="multiple" data-placeholder="pilih kontak" style="width: 100%;">

                                         <?php foreach ($kontak->result() as $row) : ?>
                                             <option value="<?php echo $row->id_kontak; ?>"><?php echo $row->nama_kontak . "( " . $row->nomor_kontak . ")" ?> </option>
                                         <?php endforeach; ?>

                                     </select>

                                 </div>
                                 <table class="table table-head-fixed text-nowrap">
                                     <!-- <thead>
                                         <tr>

                                             <th>Nama Grup</th>
                                             <th>Nomor Kontak</th>

                                         </tr>
                                     </thead> -->

                                     <!-- <tbody id="demo" name="demo">


                                         <tr>
                                             <td></td>
                                             <td></td>


                                         </tr>
                                     </tbody> -->

                                 </table>
                                 <!-- <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas"> -->
                             </div>



                         </div>

                         <div class="card-footer">
                             <button type="reset" class="btn btn-danger" data-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- //End modal tambah -->




         <!-- modal Edit -->

         <div class="modal fade" id="modal_edit" role="dialog">
             <div class="modal-dialog modal-lg" role="dokumen">
                 <div class="modal-content card card-success">

                     <div class="card-header">
                         <h3 class="card-title">Edit Grup</h3>
                     </div>
                     <!-- /.card-header -->

                     <!-- form start -->
                     <form action="<?php echo site_url('grup/update'); ?>" method="post">
                         <div class="card-body">
                             <div class="form-group">
                                 <label for="nama_grup">Nama Grup</label>
                                 <input type="text" class="form-control col-6" id="nama_edit" name="nama_edit" placeholder="Mauskan Nama Grup">
                             </div>
                             <input type="text" class="form-control" id="grup_id" name="grup_id" hidden>
                             <div class="form-group">
                                 <label for="keterangan">Keterangan</label>
                                 <input type="text" class="form-control col-6" id="keterangan_edit" name="keterangan_edit" placeholder="Masukan Keterangan Grup">
                             </div>
                             <div class="form-group">
                                 <label for="kelas">Kontak</label>
                                 <div class="col-sm-12">
                                     <select class="select2 strings" data-live-search="true" name="kontak_edit[]" id="kontak_edit[]" multiple="multiple" data-placeholder="pilih kontak" style="width: 100%;">

                                         <?php foreach ($kontak->result() as $row) : ?>
                                             <option value="<?php echo $row->id_kontak; ?>"><?php echo $row->nama_kontak . "( " . $row->nomor_kontak . ")" ?> </option>
                                         <?php endforeach; ?>

                                     </select>

                                 </div>
                                 <table class="table table-head-fixed text-nowrap">


                                     <tbody id="demo" name="demo">


                                         <tr>
                                             <td></td>
                                             <td></td>


                                         </tr>
                                     </tbody>

                                 </table>
                                 <!-- <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukan Kelas"> -->
                             </div>
                         </div>



                         <div class="card-footer">

                             <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                             <button type="submit" class="btn btn-primary">Simpan</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <!-- End modal Edit -->



         <?php foreach ($grup->result() as $row) :
            ?>

             <!-- Modal hapus -->


             <div class="modal fade" id="modal_hapus<?php echo $row->id; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-danger">

                         <div class="card-header">
                             <h3 class="card-title">Hapus Grup</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('grup/hapus_grup'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <p>Apakah Anda Yakin Ingin Menghapus Grup Kontak <?php echo $row->nama_grup; ?> ini ?</p>
                                     <input type="hidden" value="<?php echo $row->id; ?>" name="id">
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
         <?php endforeach;
            ?>
         <!-- //End modal hapus -->
         <!-- /.card -->
 </div>
 <!-- /.container-fluid -->

 <!-- /.content -->
 </div>


 <!-- /.content-wrapper -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
 <!-- Select2 -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/select2/js/select2.full.min.js"></script>

 <!-- Bootstrap 4 -->
 <!-- <script src="<?php echo base_url(); ?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
 <script>
     $(document).ready(function() {
         $(".select2").select2();

         //select kontak dari data kontak
         $('#kontak').change(function() {
             var id = $(this).val();


             $.ajax({
                 url: "<?php echo site_url('grup/get_kontak_by_id'); ?>",
                 method: "POST",
                 data: {
                     id: id
                 },
                 async: true,
                 dataType: 'json',
                 success: function(data) {
                     if (data != null) {
                         var html = '';
                         var i;
                         for (i = 0; i < data.length; i++) {
                             html += '<tr>';

                             html += '<td >' + data[i].nama_kontak + '</td>';
                             html += '<td >' + data[i].nomor_kontak + '</td>';

                             html += '<tr>';
                         }
                         $('#demo').html(html);
                         return false;

                     } else {
                         var html = '';
                         $('#demo').html(html);
                         return false;

                     }



                 }
             });

         });
         //GET UPDATE

         $('.edit_grup').on('click', function() {
             var grup_id = $(this).data('id');
             var nama_grup = $(this).data('nama_grup');
             var keterangan = $(this).data('keterangan');
             $(".strings").val('');
             $('#modal_edit').modal('show');
             $('[name="grup_id"]').val(grup_id);
             $('[name="nama_edit"]').val(nama_grup);
             $('[name="keterangan_edit"]').val(keterangan);
             //AJAX REQUEST TO GET SELECTED PRODUCT
             $.ajax({
                 url: "<?php echo site_url('grup/get_kontak_by_grup'); ?>",
                 method: "POST",
                 data: {
                     grup_id: grup_id
                 },
                 cache: false,
                 success: function(data) {
                     //  console.log(data);
                     var item = data;
                     console.log(item);
                     var val1 = item.replace("[", "");
                     var val2 = val1.replace("]", "");
                     var values = val2;
                     var values2 = values.split(",");


                     $.each(values2, function(i, e) {
                         var c1 = e.replace("\"", "")
                         var c2 = c1.replace("\"", "")
                         console.log(c2)

                         //  $("#kontak_edit").val([e]);
                         //  console.log($coba);
                         //  $("#kontak_edit[" + e + "]").prop("selected", true).trigger('change');
                         //  $("#kontak_edit").select2('refresh');
                         $(".strings option[value='" + c2 + "']").prop("selected", true).trigger('change');
                         //   $(".strings").select2('refresh');
                         //  $('#kontak_edit').change(function() {
                         //      var id = $("#kontak_edit option:selected").val();
                         //      if ($("#kontak_edit option:selected").val() == e) {
                         //          $.ajax({
                         //              url: "<?php echo site_url('grup/get_kontak_by_id'); ?>",
                         //              method: "POST",
                         //              data: {
                         //                  id: id
                         //              },
                         //              async: true,
                         //              dataType: 'json',
                         //              success: function(data) {
                         //                  if (data != null) {
                         //                      var html = '';
                         //                      var i;
                         //                      for (i = 0; i < data.length; i++) {
                         //                          html += '<tr>';

                         //                          html += '<td >' + data[i].nama_kontak + '</td>';
                         //                          html += '<td >' + data[i].nomor_kontak + '</td>';

                         //                          html += '<tr>';
                         //                      }
                         //                      $('#demo').html(html);
                         //                      return false;

                         //                  } else {
                         //                      var html = '';
                         //                      $('#demo').html(html);
                         //                      return false;
                         //                  }

                         //              }
                         //          });
                         //      }

                         //  });


                     });
                 }

             });
             return false;

         });


     });
 </script>