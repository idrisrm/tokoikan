<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar_users.php") ?>
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
                                        Pengaduan - Detail
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <?php foreach ($data as $d) { ?>
                        <nav class="nav nav-borders">
                        <?php if ($d['st_pengaduan'] == 'offline') { ?>
                            <a class="nav-link active" href="<?= base_url('PengaduanOPD/detail/' . $d['id_pengaduan']) ?>">Detail Pengaduan</a>
                            <a class="nav-link" href="<?= base_url('PengaduanOPD/tindak_lanjut/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                        <?php }else { ?>
                            <a class="nav-link active" href="<?= base_url('PengaduanOPD/detail/' . $d['id_pengaduan']) ?>">Detail Pengaduan</a>
                            <a class="nav-link" href="<?= base_url('PengaduanOPD/komentar/' . $d['id_pengaduan']) ?>">Komentar</a>
                            <a class="nav-link" href="<?= base_url('PengaduanOPD/tindak_lanjut/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                        <?php } ?>
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
                                                    <?php if ($d['status'] == 'menunggu') { ?>
                                                        <b class="text-danger">Menunggu</b>
                                                    <?php } else if ($d['status'] == 'proses') { ?>
                                                        <b class="text-warning">Diproses</b>
                                                    <?php } else if ($d['status'] == 'selesai') { ?>
                                                        <b class="text-success">Selesai</b>
                                                    <?php } else if ($d['status'] == 'konfirmasi') { ?>
                                                        <b class="text-warning">Konfirmasi OPD</b>
                                                    <?php } else { ?>
                                                        <b class="text-danger">Tolak</b>
                                                    <?php } ?>
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
                                                <?php if ($d['st_pengaduan'] == 'online') { ?>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <label>Foto Pengaduan</label>
                                                        <div>
                                                            <img class="img-fluid mb-2" src="<?= base_url($d['foto']) ?>" alt="" />
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sbp-preview mt-4 mb-4">
                                        <?php if ($d['st_pengaduan'] == 'online') { ?>
                                            <div class="card-header">
                                                Data Lokasi Pengaduan
                                                <div class="no-caret">
                                                    <a class="btn btn-sm btn-primary" href="<?= base_url('Pengaduan/map/') . $d['id_pengaduan'] ?>" target="_blank">
                                                        Lihat Maps
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Alamat</label>
                                                    <p><b><?= $d['alamat'] ?></b></p>
                                                </div>
                                                <?php if ($d['st_pengaduan'] == 'online') { ?>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Langitude</label>
                                                    <p><b><?= $d['langitude'] ?></b></p>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Longitude</label>
                                                    <p><b><?= $d['longitude'] ?></b></p>
                                                </div>
                                                <?php } ?>
                                                
                                            </div>
                                            <input class="form-control" id="id_pengaduan" name="id_pengaduan" value="<?= $d['id_pengaduan'] ?>" hidden />
                                            <input class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $d['id_pelapor'] ?>" hidden />
                                            <input class="form-control" id="judul" name="judul" value="<?= $d['judul'] ?>" hidden />
                                            <input class="form-control" id="deskripsi" name="deskripsi" value="<?= $d['deskripsi'] ?>" hidden />
                                            <input class="form-control" id="alamat" name="alamat" value="<?= $d['alamat'] ?>" hidden />
                                            <input class="form-control" id="id_kecamatan" name="id_kecamatan" value="<?= $d['id_kecamatan'] ?>" hidden />
                                            <input class="form-control" id="id_kelurahan" name="id_kelurahan" value="<?= $d['id_kelurahan'] ?>" hidden />
                                            <input class="form-control" id="langitude" name="langitude" value="<?= $d['langitude'] ?>" hidden />
                                            <input class="form-control" id="longitude" name="longitude" value="<?= $d['longitude'] ?>" hidden />
                                            <input class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" value="<?= $d['tgl_pengaduan'] ?>" hidden />
                                            <input class="form-control" id="jam_pengaduan" name="jam_pengaduan" value="<?= $d['jam_pengaduan'] ?>" hidden />
                                            <input class="form-control" id="id_opd" name="id_opd" value="<?= $d['id_opd'] ?>" hidden />
                                            <input class="form-control" id="id_kategori" name="id_kategori" value="<?= $d['id_kategori'] ?>" hidden />
                                            <input class="form-control" id="foto" name="foto" value="<?= $d['foto'] ?>" hidden />
                                            <input class="form-control" id="st_pengaduan" name="st_pengaduan" value="<?= $d['st_pengaduan'] ?>" hidden />

                                        </div>
                                    </div>
                                    <?php if ($d['st_pengaduan'] == 'offline') { ?>
                                        <?php if ($d['status'] == 'selesai') { ?>
                                            <button class="btn btn-success mr-2" type="submit" name="arsip" id="arsip">
                                                <span class="text">Arsip</span>
                                            </button>
                                        <?php } ?>
                                    <?php } ?>

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