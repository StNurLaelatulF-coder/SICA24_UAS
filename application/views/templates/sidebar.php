<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="<?= site_url('dashboard'); ?>">
        <div class="sidebar-brand-text mx-3">
            Sales Order
        </div>
    </a>

    <hr class="sidebar-divider">

    <!-- DASHBOARD (SEMUA ROLE) -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('dashboard'); ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <?php
    $role = $this->session->userdata('role');
    ?>

    <!-- MENU ADMIN -->
    <?php if($role == 'admin') : ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sales'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Sales</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('pelanggan'); ?>">
                <i class="fas fa-user-friends"></i>
                <span>Pelanggan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('produk'); ?>">
                <i class="fas fa-box"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sales_order'); ?>">
                <i class="fas fa-shopping-cart"></i>
                <span>Sales Order</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('detail_order'); ?>">
                <i class="fas fa-list"></i>
                <span>Detail Order</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('laporan'); ?>">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Yakin mau logout?')">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>

    <?php endif; ?>


    <!-- MENU SALES -->
    <?php if($role == 'sales') : ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sales_order'); ?>">
                <i class="fas fa-shopping-cart"></i>
                <span>Sales Order</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('detail_order'); ?>">
                <i class="fas fa-list"></i>
                <span>Detail Order</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Yakin mau logout?')">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>

    <?php endif; ?>


    <!-- MENU MANAGER -->
    <?php if($role == 'manager') : ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('laporan'); ?>">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link text-danger" href="<?= site_url('auth/logout'); ?>" onclick="return confirm('Yakin mau logout?')">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>

    <?php endif; ?>

</ul>