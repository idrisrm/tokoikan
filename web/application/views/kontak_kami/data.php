<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/modal/simpan.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar.php") ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-primary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="phone"></i></div>
                                <span>Kontak Kami</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <?php foreach ($data as $d) { ?>
                            <div class="card mb-4">
                                <div class="card-header">Edit Data Kontak Kami</div>
                                <div class="card-body">
                                    <div class="col">
                                        <?php echo $this->session->flashdata('pesan') ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-sm-12">
                                            <label>Alamat</label>
                                            <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat Lengkap" value="<?= $d['alamat'] ?>" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-sm-12">
                                            <label>Email</label>
                                            <input class="form-control" id="email" name="email" type="text" placeholder="Masukkan Alamat Email" value="<?= $d['email'] ?>" disable />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-12 col-sm-12">
                                            <label>Nomor Telepon</label>
                                            <input class="form-control" id="nomor_telepon" name="nomor_telepon" type="text" placeholder="Masukkan Nomor Telepon" value="<?= $d['telepon'] ?>" />
                                        </div>
                                    </div>
                                    <!-- <a class="btn btn-primary mr-2" href="#" data-toggle="modal" data-target="#modalSave">
                                Simpan
                            </a> -->
                                    <button class="btn btn-success mr-2" type="submit" name="simpan" id="simpan">
                                        <span class="text">Simpan</span>
                                    </button>
                                    <a class="btn btn-danger" href="javascript:history.go(-1)">
                                        Batal
                                    </a>
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
</body>

</html>