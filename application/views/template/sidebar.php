<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed; height: 100%;">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>assets/template/index3.html" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">WA Broadcast</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"> <i class="nav-icon fas fa-user"></i> <?php echo ucwords($this->session->userdata('nama_admin')); ?> <?php //echo ucwords($this->session->userdata('role')); 
                                                                                                                                                    ?>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>welcome" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>kontakwa" class="nav-link">
                        <i class="nav-icon fas fa-phone-square-alt"></i>
                        <p>
                            kontak
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>grup" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            grup
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url(); ?>history" class="nav-link">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            riwayat
                        </p>
                    </a>
                </li>
                <?php if ($this->session->userdata('role') != 'admin') { ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>admin" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                <?php  }  ?>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>