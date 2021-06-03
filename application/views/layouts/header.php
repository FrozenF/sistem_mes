<?php if(!isset($login)): ?>
<!--start content wrapper-->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url();?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-house-user"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SISTEM MES</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?=$dashboard ?? ''?>">
            <a class="nav-link" href="<?=base_url();?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Beranda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master
        </div>

        <li class="nav-item <?=$department_menu ?? ''?>">
            <a class="nav-link" href="<?=base_url();?>department">
                <i class="fas fa-fw fa-building"></i>
                <span>Departemen</span></a>
        </li>
        <li class="nav-item <?=$employee_menu ?? ''?>">
            <a class="nav-link" href="<?=base_url();?>employee">
                <i class="fas fa-fw fa-users"></i>
                <span>Karyawan</span></a>
        </li>
        <li class="nav-item <?=$mes_menu ?? ''?>">
            <a class="nav-link" href="<?=base_url();?>mes">
                <i class="fas fa-fw fa-home"></i>
                <span>Mes</span></a>
        </li>
        <li class="nav-item <?=$room_menu ?? ''?>">
            <a class="nav-link" href="<?=base_url();?>room">
                <i class="fas fa-fw fa-door-closed"></i>
                <span>Kamar</span></a>
        </li>


        <div class="sidebar-heading">
            Data Penghuni
        </div>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?=$room_detail_menu ?? ''?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-user-tag"></i>
                <span>Data Penghuni</span>
            </a>
            <div id="collapseTwo" class="collapse <?=(isset($room_detail_menu)) ? 'show':'';?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item <?=$room_detail_menu_active ?? ''?>" href="<?=base_url();?>room_transaction">Penghuni Aktif</a>
                    <a class="collapse-item <?=$room_detail_menu_new ?? ''?>" href="<?=base_url();?>room_transaction/new">Penghuni Baru</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$this->session->userdata('name');?></span>
                            <img class="img-profile rounded-circle"
                                 src="<?=base_url();?>assets/img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
<?php endif ?>
