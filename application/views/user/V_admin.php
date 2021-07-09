 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Data Admin</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Data Admin</li>

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


                             <!-- <button data-toggle="modal" data-target="#addNewModal" type="button" class="btn btn-inline btn-outline-primary col-2">Tambah Data</button> -->
                             <form action="<?php echo base_url('admin/form_tambah')  ?>">
                                 <button type="submit" class="btn btn-inline btn-outline-primary col-2">Tambah Data</button>
                             </form>


                             <div class="card-tools">
                                 <form action="<?php echo site_url('admin'); ?>" method="get">
                                     <div class="input-group input-group-sm" style="width: 150px; margin-top: 5px;">

                                         <input type="text" name="table_search" value="<?php echo $table_search;  ?>" class="form-control float-right" placeholder="Search">

                                         <div class="input-group-append">

                                             <?php
                                                if ($table_search <> '') {
                                                ?>
                                                 <a href="<?php echo site_url('admin'); ?>" class="btn btn-default">X</a>
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
                             <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
                             <!-- <?php if ($this->session->flashdata('flash') != null) { ?>
                                 <div class="alert alert-danger alert-dismissible col-6" role="alert">
                                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                     Data Berhasil <b><?= $this->session->flashdata('flash'); ?></b>
                                 </div>
                             <?php } ?>
                             <?php echo $this->session->flashdata('message'); ?> -->
                             <p style="margin-bottom: 1px;"><b> Jumlah Data : <?php echo $junlah_kontak ?></b></p>
                         </div>

                         <!-- /.card-header -->
                         <!-- tampilan tabel Kontak -->
                         <div class="card-body table-responsive p-0" style="height: 300px;">

                             <table class="table table-head-fixed text-nowrap">
                                 <thead>
                                     <tr>
                                         <th>#</th>
                                         <th>Nama Admin</th>
                                         <th>Username</th>
                                         <th>role</th>
                                         <th>Last Login</th>
                                         <th>#</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $count = 0;
                                        foreach ($admin->result() as $row) :
                                            $count++;
                                        ?>
                                         <tr>
                                             <td> <?php echo $count; ?> </td>
                                             <td><?php echo $row->nama_admin; ?></td>
                                             <td><?php echo $row->username; ?></td>
                                             <td><?php echo $row->role; ?></td>
                                             <td><?php echo $row->last_login; ?></td>

                                             <td>
                                                 <a href="#" class="btn btn-block bg-gradient-success btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_edit<?php echo $row->id_admin; ?>">Edit</a>
                                                 <a href="<?php echo base_url('admin/form_edit/') . $row->id_admin; ?> " class="btn btn-block bg-gradient-success btn-sm" style="display: inline;">Edit</a>
                                                 <a href="#" class="btn btn-block bg-gradient-danger btn-sm" style="display: inline;" data-toggle="modal" data-target="#modal_hapus<?php echo $row->id_admin; ?>">Delete</a>
                                             </td>
                                         </tr>
                                     <?php endforeach; ?>

                                 </tbody>

                             </table>


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
                         <h3 class="card-title">Tambah Admin</h3>
                     </div>
                     <!-- /.card-header -->

                     <!-- form start -->
                     <form action="<?php echo site_url('admin/tambah_admin'); ?>" method="post">
                         <div class="card-body">
                             <div class="form-group">
                                 <?php echo $this->session->flashdata('message'); ?>
                             </div>
                             <div class="form-group">
                                 <label for="nama_kontak">Nama Admin</label>
                                 <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Mauskan Nama Admin" required>
                             </div>
                             <div class="form-group">
                                 <label for="username">Username</label>
                                 <input type="text" class="form-control" id="username" name="username" placeholder="Mauskan Username" required>
                             </div>
                             <div class="form-group">
                                 <label for="password">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" placeholder="Mauskan Password" required>
                             </div>


                             <div class="form-group">
                                 <label>role </label>
                                 <select class="form-control" id="role" name="role">
                                     <option value="">pilih role </option>
                                     <option value="1">Superadmin</option>
                                     <option value="2">Admin</option>

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




         <?php foreach ($admin->result() as $row) : ?>



             <!-- //modal Edit -->

             <div class="modal fade" id="modal_edit<?php echo $row->id_admin; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-success">

                         <div class="card-header">
                             <h3 class="card-title">Edit Admin</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('admin/edit_admin'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="nama_admin">Nama Admin</label>
                                     <input type="text" value="<?php echo $row->nama_admin; ?>" class="form-control" id="nama_admin" name="nama_admin" placeholder="Mauskan Nama Admin">
                                 </div>

                                 <div class="form-group">
                                     <input type="text" value="<?php echo $row->id_admin; ?>" class="form-control" id="id_admin" name="id_admin" hidden>
                                 </div>

                                 <div class="form-group">
                                     <label>role </label>
                                     <select class="form-control" id="edit_keterangan" name="keterangan">
                                         <option value="1" <?php echo ($row->role == 'superadmin' ?  'selected' : ''); ?>>Superadmin</option>
                                         <option value="2" <?php echo ($row->role == 'admin' ? 'selected' : ''); ?>>Admin</option>

                                     </select>
                                 </div>
                                 <!-- <div class="form-group">
                                     <label for="username">Username</label>
                                     <input type="text" value="<?php echo $row->username; ?>" class="form-control" id="username" name="username" >
                                 </div>
                                 <div class="form-group">
                                     <label for="username">Password Sekarang</label>
                                     <input type="password" value="<?php echo $row->password; ?>" class="form-control" id="now_password" name="now_password" >
                                 </div>
                                 <div class="form-group">
                                     <label for="username">Password Baru</label>
                                     <input type="password" value="<?php echo $row->password; ?>" class="form-control" id="now_password" name="now_password" >
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
             <div class="modal fade" id="modal_hapus<?php echo $row->id_admin; ?>" role="dialog">
                 <div class="modal-dialog" role="dokumen">
                     <div class="modal-content card card-danger">

                         <div class="card-header">
                             <h3 class="card-title">Hapus Admin</h3>
                         </div>
                         <!-- /.card-header -->

                         <!-- form start -->
                         <form action="<?php echo site_url('admin/hapus_admin'); ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <p>Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama_admin  ?> ini ?</p>
                                     <input type="hidden" value="<?php echo $row->id_admin; ?>" name="id_admin">
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
 <!-- SweetAlert2 -->
 <script src="<?php echo base_url(); ?>assets/template/plugins/sweetalert2/sweetalert2.min.js"></script>

 <!-- /.content-wrapper -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


 <script>
     document.addEventListener("DOMContentLoaded", function() {

         var elements = document.getElementsByTagName("input");
         for (var i = 0; i < elements.length; i++) {
             elements[i].oninvalid = function(e) {
                 e.target.setCustomValidity("");
                 if (!e.target.validity.valid) {
                     e.target.setCustomValidity("Mohon isi kolom tersebut");
                 }
             };
             elements[i].oninput = function(e) {
                 e.target.setCustomValidity("");
             };
         }
     })
     //  $(document).ready(function() {

     //      $(function() {

     //          $('#addNewModal').submit(function(event) {
     //              event.preventDefault();
     //              var custemail = $('#username').val();
     //              var custname = $('#password').val();

     //              $.ajax({
     //                  type: 'POST',
     //                  url: "<?php echo site_url('admin/get_admin'); ?>",
     //                  data: {
     //                      username: custname,
     //                      password: custemail

     //                  },
     //                  dataType: 'html',
     //                  success: function(results) {
     //                      if (results != null || results != "") {
     //                          $('.error_msg').html('error msg');
     //                          return false;
     //                      }
     //                  }
     //              });


     //          });

     //      });



     //  })
 </script>