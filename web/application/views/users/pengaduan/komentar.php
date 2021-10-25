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
                                        Pengaduan - Komentar
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <div class="col">
                        <?php echo $this->session->flashdata('pesan') ?>
                    </div>
                    <form action="" method="post" autocomplete="off">
                        <?php foreach ($dataku as $dataku) { ?>
                            <nav class="nav nav-borders">
                                <a class="nav-link" href="<?= base_url('PengaduanOPD/detail/' . $dataku['id_pengaduan']) ?>">Detail Pengaduan</a>
                                <a class="nav-link active" href="<?= base_url('PengaduanOPD/komentar/' . $dataku['id_pengaduan']) ?>">Komentar</a>
                                <a class="nav-link" href="<?= base_url('PengaduanOPD/tindak_lanjut/'. $dataku['id_pengaduan']) ?>">Tindak Lanjut</a>
                            </nav>
                            <input class="form-control" id="id_pelapor" name="id_pelapor" type="text" value="<?= $dataku['id_pelapor'] ?>" hidden />
                        <?php } ?>
                        <hr class="mt-0 mb-4" />
                        <div class="card mb-4">
                            <div class="card-header">Komentar Pelapor</div>
                            <div class="card-body">
                                <?php foreach ($data as $d) { ?>
                                    <h5 class="mb-1"><?= $d['nm_pelapor'] ?></h5>
                                    <p class="small"><?= $d['komentar'] ?></p>

                                <?php } ?>
                                <hr class="my-4" />
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">Komentar OPD</div>
                            <div class="card-body">
                                <?php foreach ($opd as $o) { ?>
                                    <h5 class="mb-1"><?= $o['nm_opd'] ?></h5>
                                    <p class="small"><?= $o['komentar'] ?></p>
                                    <hr class="my-4" />
                                <?php } ?>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">Tambah Komentar Sebagai Admin OPD</div>
                            <div class="card-body">
                                <div class="input-group mb-4">
                                    <textarea name="tambah_komentar" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" href="" class="btn btn-success">
                                    <span class="text">Post Komentar</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('tambah_komentar');
        CKEDITOR.config.autoParagraph = false;
    </script>
    <style>
        #cke_tambah_komentar {
            width: 100% !important;
        }
    </style>
</body>

</html>