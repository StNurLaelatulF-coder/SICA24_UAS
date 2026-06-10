<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <span class="nav-link text-gray-600">
                Selamat Datang,
                <?= $this->session->userdata('username'); ?>
            </span>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('auth/logout') ?>">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </li>

    </ul>

</nav>