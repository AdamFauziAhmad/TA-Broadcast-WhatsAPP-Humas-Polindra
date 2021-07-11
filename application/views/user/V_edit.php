 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <?php if ($this->session->userdata('role') == 'admin') { ?>
                         <h1>Ganti Password</h1>
                     <?php } else { ?>
                         <h1>Edit admin</h1>
                     <?php } ?>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="<?= base_url('welcome');  ?>">Dashboard</a></li>
                         <?php if ($this->session->userdata('role') == 'admin') { ?>
                             <li class="breadcrumb-item active">Ganti Password</li>
                         <?php } else { ?>
                             <li class="breadcrumb-item active">Edit Admin</li>
                         <?php } ?>

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
                     <div class="card card-success">
                         <div class="card-header">
                             <?php if ($this->session->userdata('role') == 'admin') { ?>
                                 <h3 class="card-title">Silahkan isi form dibawah untuk mengganti password </h3>
                             <?php } else { ?>
                                 <h3 class="card-title">Silahkan isi form dibawah untuk mengedit data admin </h3>
                             <?php } ?>

                         </div>

                         <div class="card-body">
                             <form action="<?php echo site_url('admin/edit_admin'); ?>" method="post">
                                 <?php foreach ($data as $row) { ?>

                                     <div class="card-body">
                                         <div class="form-group">
                                             <input type="text" value="<?php echo $row->id_admin; ?>" class="form-control col-6" id="id_admin" name="id_admin" hidden>
                                         </div>

                                         <?php if ($this->session->userdata('role') == 'admin') { ?>
                                             <div class="form-group" hidden>
                                                 <label for="nama_admin">Nama Admin</label>
                                                 <input type="text" value="<?php echo $row->nama_admin; ?>" class="form-control col-6" id="nama_admin" name="nama_admin" placeholder="Mauskan Nama Admin">
                                             </div>
                                             <div class="form-group" hidden>
                                                 <label for="username">Username</label>
                                                 <input type="text" value="<?php echo $row->username; ?>" class="form-control col-6" id="username" name="username">
                                             </div>
                                             <div class="form-group">
                                                 <label for="username">Password Baru</label>
                                                 <input type="password" value="" class="form-control col-6" id="new_password" name="new_password" placeholder="Mauskan password baru" required>
                                             </div>
                                             <?php echo form_error('new_password', '<div class="alert alert-danger alert-dismissible col-6" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')  ?>
                                             <div class="form-group">
                                                 <label for="username">Konfirmasi Password Baru</label>
                                                 <input type="password" value="" class="form-control col-6" id="password_confirm" name="password_confirm" placeholder="Masukan ulang password baru" required>
                                             </div>
                                             <?php echo form_error('password_confirm', '<div class="alert alert-danger alert-dismissible col-6" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')  ?>
                                         <?php } else { ?>
                                             <div class="form-group">
                                                 <label for="nama_admin">Nama Admin</label>
                                                 <input type="text" value="<?php echo $row->nama_admin; ?>" class="form-control col-6" id="nama_admin" name="nama_admin" placeholder="Mauskan Nama Admin" required>
                                             </div>

                                             <div class="form-group">
                                                 <label>role </label>
                                                 <select class="form-control col-6" id="role" name="role">
                                                     <option value="1" <?php echo ($row->role == 'superadmin' ?  'selected' : ''); ?>>Superadmin</option>
                                                     <option value="2" <?php echo ($row->role == 'admin' ? 'selected' : ''); ?>>Admin</option>

                                                 </select>
                                             </div>
                                             <div class="form-group">
                                                 <label for="username">Username</label>
                                                 <input type="text" value="<?php echo $row->username; ?>" class="form-control col-6" id="username" name="username" readonly>
                                             </div>
                                             <div class="form-group">
                                                 <label for="username">Ganti Username</label>
                                                 <input type="text" value="" class="form-control col-6" id="username_edit" name="username_edit" placeholder="SIlahkan di isi jika ingin ganti username(boleh kosong)">
                                             </div>
                                             <?php echo form_error('username_edit', '<div class="alert alert-danger alert-dismissible col-6" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')  ?>
                                             <div class="form-group">
                                                 <label for="username">Password Baru</label>
                                                 <input type="password" value="" class="form-control col-6" id="new_password" name="new_password" placeholder="Mauskan password baru">
                                             </div>
                                             <?php echo form_error('new_password', '<div class="alert alert-danger alert-dismissible col-6" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>')  ?>
                                             <div class="form-group">
                                                 <label for="username">Konfirmasi Password Baru</label>
                                                 <input type="password" value="" class="form-control col-6" id="password_confirm" name="password_confirm" placeholder="Masukan ulang password baru">
                                             </div>

                                         <?php  } ?>




                                     </div>
                                 <?php  }  ?>
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