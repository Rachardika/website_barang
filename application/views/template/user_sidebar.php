<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/user/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Pegawai</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <div class="sidebar-heading">
        Dashboard
    </div>
    <li class="nav-item <?= ($aktif == 'dashboard') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/user/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard Pegawai</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>
    <li class="nav-item <?= ($aktif == 'profil') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/user/profil'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Pribadi</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Stock Produk
    </div>
    <li class="nav-item <?= ($aktif == 'item') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/user/item'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Item</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Stock Barang
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= ($aktif == 'stockin') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/user/stockIn'); ?>">
            <i class="fas fa-fw fa-file"></i>
            <span>Barang Masuk</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($aktif == 'stockout') ? 'active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('/user/stockOut'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Barang Keluar</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->