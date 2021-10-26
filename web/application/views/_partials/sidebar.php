<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?= base_url('Dashboard') ?>">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <div class="sidenav-menu-heading">Menu Pengaduan</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePengaduan" aria-expanded="false" aria-controls="collapsePengaduan">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Transaksi
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapsePengaduan" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?= base_url('') ?>">
                            <span class="badge badge-danger mr-1">  </span>
                            Penjualan
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <a class="nav-link" href="<?= base_url('Pengaduan/data_real') ?>">
                            <span class="badge badge-cyan mr-1">  </span>
                            Revisi Transaksi
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <a class="nav-link" href="<?= base_url('Pengaduan/data_proses') ?>">
                            <span class="badge badge-warning mr-1">  </span>
                            Pengajuan Hutang
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <!-- <a class="nav-link" href="<?= base_url('Pengaduan/data_tindak_lanjut') ?>">
                            <span class="badge badge-blue mr-1">  </span>
                            Tindak Lanjut
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <a class="nav-link" href="<?= base_url('Pengaduan/data_selesai') ?>">
                            <span class="badge badge-success mr-1">  </span>
                            Selesai
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <a class="nav-link" href="<?= base_url('Pengaduan/data_tolak') ?>">
                            <span class="badge badge-indigo mr-1">  </span>
                            Tolak
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a>
                        <a class="nav-link" href="<?= base_url('Pengaduan/data_arsip') ?>">
                            Arsip
                            <span class="badge badge-primary-soft text-primary ml-auto">2</span>
                        </a> -->
                    </nav>
                </div>

                <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link" href="<?= base_url('DataBarang') ?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Data Barang
                </a>
                <a class="nav-link" href="<?= base_url('Pelapor/data') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Data Penghutang
                </a>
                <a class="nav-link" href="<?= base_url('DataOPD/data') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Data Karyawan
                </a>
                <a class="nav-link" href="<?= base_url('DataKategori/data') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Data Kategori Barang
                </a>
                <!-- <a class="nav-link" href="<?= base_url('Kecamatan/data') ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Kecamatan
                </a>
                <a class="nav-link" href="<?= base_url('Kelurahan/data') ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Kelurahan
                </a>
                <a class="nav-link" href="<?= base_url('KontakKami/data') ?>">
                    <div class="nav-link-icon"><i data-feather="phone"></i></div>
                    Kontak Kami
                </a> -->
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Log in sebagai:</div>
                <div class="sidenav-footer-title">Idris</div>
            </div>
        </div>
    </nav>
</div>