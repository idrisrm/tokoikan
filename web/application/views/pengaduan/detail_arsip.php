<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon mt-1">
                                            <a href="javascript:history.go(-1)">
                                                <i data-feather="arrow-left" class="text-black mr-3"></i>
                                            </a>
                                            <i data-feather="file-text"></i>
                                        </div>
                                        Pengaduan - Detail Arsip
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <?php foreach ($data as $d) { ?>
                        <nav class="nav nav-borders">
                            <a class="nav-link active ml-0" href="<?= base_url('Pengaduan/detail_arsip/' . $d['id_arsip']) ?>">Detail Pengaduan</a>
                            <a class="nav-link" href="<?= base_url('Pengaduan/komentar_arsip/' . $d['id_pengaduan']) ?>">Komentar</a>
                            <a class="nav-link" href="<?= base_url('Pengaduan/tindak_lanjut_arsip/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                      
                        </nav>
                        <hr class="mt-0 mb-4" />
                        <form action="" method="post" autocomplete="off">
                            <div class="card card-header-actions mx-auto mb-4">
                                <div class="card-header">Data Pengaduan</div>
                                <div class="col">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                </div>
                                <div class="card-body">

                                    <div class="sbp-preview">
                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>ID Pengaduan</label>
                                                    <p><b><?= $d['id_pengaduan'] ?></b></p>

                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Nama Pelapor</label>
                                                    <p><b><?= $d['nm_pelapor'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Tanggal / Jam Pengaduan</label>
                                                    <p><b><?= $d['tgl_pengaduan'] ?> / <?= $d['jam_pengaduan'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Status</label><br>
                                                    <b class="text-warning">Arsip</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Email</label>
                                                    <p><b><?= $d['email'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>No. Telepon</label>
                                                    <p><b><?= $d['telepon'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Kategori Pengaduan</label>
                                                    <p><b><?= $d['nm_kategori'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Tanggal Arsip</label>
                                                    <p><b><?= $d['tgl_arsip'] ?></b></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Judul Pengaduan</label>
                                                    <p><b><?= $d['judul'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Deskripsi Pengaduan</label>
                                                    <p><b><?= $d['deskripsi'] ?></b></p>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Foto Pengaduan</label>
                                                    <div>
                                                        <img class="img-fluid mb-2" src="<?= base_url($d['foto']) ?>" alt="" />
                                                        <!-- <p><b><?= $d['foto'] ?></b></p> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sbp-preview mt-4 mb-4">
                                        <div class="card-header">
                                            Data Lokasi Pengaduan
                                            <div class="no-caret">
                                                <a class="btn btn-sm btn-primary" href="#">
                                                    Lihat Maps
                                                </a>
                                            </div>
                                        </div>
                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Alamat</label>
                                                    <p><b><?= $d['alamat'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Langitude</label>
                                                    <p><b><?= $d['langitude'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Longitude</label>
                                                    <p><b><?= $d['longitude'] ?></b></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    <?php } ?>
                </div>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
</body>

</html>