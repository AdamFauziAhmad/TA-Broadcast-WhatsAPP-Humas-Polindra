<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user"></i>
                <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image"> -->
                <span class="d-none d-md-inline"><?php echo ucwords($this->session->userdata('nama_admin')); ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <!-- User image -->
                <li class="user-body">
                    <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->

                    <p>
                        <?php echo ucwords($this->session->userdata('nama_admin')); ?> - <?php echo ucwords($this->session->userdata('role')); ?><br />
                        <small>Terahir Login : </small>
                        <small> <?php echo ucwords($this->session->userdata('last_login')); ?></small>
                    </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?php echo base_url('admin/form_edit/') . $this->session->userdata('id_admin'); ?>" class="btn btn-success btn-flat ">Ganti Password</a>
                    <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-danger btn-flat float-right">Logout</a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>-->


        </li>
    </ul>
</nav>
<!-- /.navbar -->