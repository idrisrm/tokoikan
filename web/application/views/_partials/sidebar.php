<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?= base_url('Dashboard') ?>">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>
                <div class="sidenav-menu-heading">Menu Transaksi</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePengaduan" aria-expanded="false" aria-controls="collapsePengaduan">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Penjualan
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapsePengaduan" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?= base_url('DataPenjualan/jember') ?>">
                            <span class="badge badge-success mr-1">  </span>
                            Penjualan Produk
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                        <a class="nav-link" href="<?= base_url('RevisiTransaksi') ?>">
                            <span class="badge badge-cyan mr-1">  </span>
                            Revisi Penjualan
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                        <!-- <a class="nav-link" href="<?= base_url('DataPenghutang/PengajuanHutang') ?>">
                            <span class="badge badge-warning mr-1">  </span>
                            Pengajuan Hutang
                        </a> -->
                    </nav>
                </div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePengaduan" aria-expanded="false" aria-controls="collapsePengaduan">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Transaksi Keuangan
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapsePengaduan" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?= base_url('Pengeluaran') ?>">
                            <span class="badge badge-success mr-1">  </span>
                            Arus kas
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                        <a class="nav-link" href="<?= base_url('RevisiTransaksi') ?>">
                            <span class="badge badge-cyan mr-1">  </span>
                            Hutang Ke Supplier
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                        <a class="nav-link" href="<?= base_url('DataPenghutang/') ?>">
                            <span class="badge badge-warning mr-1">  </span>
                            Piutang Pelanggan
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                    </nav>
                </div>

                <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseproduk" aria-expanded="false" aria-controls="collapseproduk">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Produk
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseproduk" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?= base_url('DataBarang/jember') ?>">
                            <span class="badge badge-success mr-1">  </span>
                            Stok Produk
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                        <a class="nav-link" href="<?= base_url('Peringkat') ?>">
                            <span class="badge badge-cyan mr-1">  </span>
                            Peringkat Produk Yang terjual
                            <!-- <span class="badge badge-primary-soft text-primary ml-auto">2</span> -->
                        </a>
                    </nav>
                </div>
                <a class="nav-link" href="#">
                    <div class="nav-link-icon"><i data-feather="shopping-bag"></i></div>
                    Pembelian Produk
                </a>
                <a class="nav-link" href="<?= base_url('DataPenghutang') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Data Penghutang
                </a>
                <a class="nav-link" href="<?= base_url('Karyawan') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Data Karyawan
                </a>
                <a class="nav-link" href="<?= base_url('DataKategori') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Data Kategori Barang
                </a>
                <a class="nav-link" href="<?= base_url('DataSatuan') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Data Satuan Barang
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
                <div class="sidenav-footer-title"><?= $this->session->userdata('nama'); ?></div>
            </div>
        </div>
    </nav>
</div>