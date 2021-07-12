<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate Web AHK Polindra | Hummas)</title>
    <link rel="shortcut icon" href="<?= base_url();  ?>assets/img/Logo.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/login.css">


</head>

</head>

<body class="hold-transition login-page" style="background: radial-gradient(#00FFFF, #6495ED);">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary" style="opacity: 0.87;">
            <div class="card-header text-center">
                <a href="<?php echo base_url(); ?>assets/template/index2.html" class="h1"><b>Generate Script AHK</b><br /><b>Broadcast WA</b></br />HUMMAS POLINDRA</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <?php echo $this->session->flashdata('message'); ?>



                <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                    </div>



                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" value="Login">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>