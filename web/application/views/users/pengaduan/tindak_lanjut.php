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
                            <?php if($d['st_pengaduan'] == 'offline'){?>
                                <a class="nav-link" href="<?= base_url('PengaduanOPD/detail/' . $d['id_pengaduan']) ?>">Detail Pengaduan</a>
                                <a class="nav-link active" href="<?= base_url('PengaduanOPD/tindak_lanjut/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                            <?php } else {?>
                                <a class="nav-link" href="<?= base_url('PengaduanOPD/detail/' . $d['id_pengaduan']) ?>">Detail Pengaduan</a>
                            <a class="nav-link" href="<?= base_url('PengaduanOPD/komentar/' . $d['id_pengaduan']) ?>">Komentar</a>
                            <a class="nav-link active" href="<?= base_url('PengaduanOPD/tindak_lanjut/' . $d['id_pengaduan']) ?>">Tindak Lanjut</a>
                                <?php } ?>
                           
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
                                            <hr>
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
                        <div class="card card-header-actions mx-auto mb-4">

                        <?php foreach($data as $data){?>
                            <div class="card-header">Data Tindak Lanjut</div>
                            <div class="card-body">

                            <?php if($data['status']== 'proses'){?>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="foto">Foto Tindak Lanjut</label>
                                        <input class="form-control" id="foto" name="foto" type="file" accept="image/*" />
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="preview_foto">Preview Foto</label>
                                        <br>
                                        <img src="" id="preview_foto" style="width:200px" />
                                    </div>
                                </div>
                                <div class="input-group mb-4">
                                    <textarea name="tambah_komentar" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            <?php } ?>
                                    <?php if($data['st_pengaduan'] == 'offline'){?>
                                        <?php if($data['status'] == 'proses'){?>
                                            <button class="btn btn-blue mr-2" type="submit" name="selesai" id="selesai">
                                                <span class="text">Selesai</span>
                                            </button>
                                        <?php }?>
                                    <?php } else {?>
                                    <?php if($data['status'] == 'proses'){?>

                                    <button class="btn btn-success mr-2" type="submit" name="kirim_tindak_lanjut" id="kirim_tindak_lanjut">
                                        <span class="text">Kirim Tindak Lanjut</span>
                                    </button>
                                    <?php } ?>
                                <?php } ?>
                                
                            </div>
                        </div>
                        <?php } ?>
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