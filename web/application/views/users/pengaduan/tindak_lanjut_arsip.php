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
                                        Pengaduan - Tindak Lanjut
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <nav class="nav nav-borders">
                        <?php foreach ($data as $d) { ?>
                            <a class="nav-link" href="<?= base_url('PengaduanOPD/detail_arsip/' . $d['id_arsip']) ?>">Detail Pengaduan</a>
                            <a class="nav-link active" href="<?= base_url('PengaduanOPD/tindak_lanjut/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                        <?php } ?>
                    </nav>
                    <hr class="mt-0 mb-4" />
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                        <div class="card mb-4">
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <div class="card-header">Tindak Lanjut OPD</div>
                            <?php foreach ($tindak as $t) { ?>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12 col-sm-12">
                                            <h5 class="mb-1"><?= $t['nm_opd'] ?></h5>
                                            <p class="small"><?= $t['tindakan'] ?></p>
                                            <p class="small"><?= $t['tgl_tindakan'] ?> / <?= $t['jam_tindakan'] ?> </p>
                                            <hr class="my-4" />
                                        </div>
                                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                            <?php if ($t['foto'] != '') { ?>
                                                <img src="<?= base_url($t['foto']) ?>" id="preview_foto_tindak_lanjut" style="height: 70px;" />
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview_foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#foto").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>