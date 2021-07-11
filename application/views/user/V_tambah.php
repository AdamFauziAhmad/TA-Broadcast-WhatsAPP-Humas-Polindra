 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Tambah admin</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
                         <li class="breadcrumb-item active">Tambah Admin</li>
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
                             <h3 class="card-title">Silahkan isi form dibawah untuk menambah data admin </h3>
                         </div>

                         <div class="card-body">
                             <form action="<?php echo site_url('admin/tambah_admin'); ?>" method="post">
                                 <div class="card-body">
                                     <div class="form-group">
                                         <?php echo $this->session->flashdata('message'); ?>
                                     </div>
                                     <div class="form-group">
                                         <label for="nama_kontak">Nama Admin</label>
                                         <input type="text" value="<?= set_value('nama_admin'); ?>" class="form-control col-6" id="nama_admin" name="nama_admin" placeholder="Mauskan Nama Admin" required>
                                     </div>
                                     <div class="form-group">
                                         <label for="username">Username</label>
                                         <input type="text" value="<?= set_value('username');  ?>" class="form-control col-6" id="username" name="username" placeholder="Mauskan Username" required>
                                     </div>
                                     <?php echo form_error('username', '<div class="alert alert-danger alert-dismissible col-6" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')  ?>
                                     <div class="form-group">
                                         <label for="password">Password</label>
                                         <input type="password" class="form-control col-6" id="password" name="password" placeholder="Mauskan Password" required>
                                     </div>


                                     <div class="form-group">
                                         <label>role </label>
                                         <select class="form-control col-6" id="role" name="role">
                                             <option value="">pilih role </option>
                                             <option value="1">Superadmin</option>
                                             <option value="2">Admin</option>

                                         </select>
                                     </div>

                                 </div>
                                 <!-- /.card-body -->

                                 <div class="card-footer">

                                     <a href="<?php echo base_url('admin')  ?>" class="btn btn-inline btn-danger col-6" style="display: inline; ">Batal</a>
                                     <button type="submit" class="btn btn-inline btn-primary">Simpan</button>
                                 </div>
                             </form>

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