<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        </li>
        <li class="nav-item">
            <a href="<?= base_url() ?>user/beranda" class="nav-link  <?= $title == 'beranda' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Beranda
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url() ?>user/deteksi" class="nav-link <?= $title == 'deteksi' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Mulai Deteksi
                </p>
            </a>
        <li class="nav-item">
            <a href="<?= base_url() ?>user/riwayat" class="nav-link  <?= $title == 'riwayat' ? 'active' : '' ?>">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Riwayat
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= base_url() ?>user/pengguna" class="nav-link  <?= $title == 'pengguna' ? 'active' : '' ?>">
                <i class="nav-icon far fa-user"></i>
                <p>
                    Profil
                </p>
            </a>
        </li>

        <li class="nav-header">User</li>
        <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Keluar</p>
            </a>
        </li>
    </ul>
</nav>