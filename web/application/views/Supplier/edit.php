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
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                <span>Edit Data Supplier</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Edit Data Supplier</div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($supplier as $s) : ?>
                                        <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="nama">Nama Supplier</label>
                                            <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan Nama Supplier" value="<?= $s['nama_supplier'] ?>" />
                                            <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="alamat">Alamat</label>
                                            <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" value="<?= $s['alamat'] ?>" />
                                            <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="status">Status</label>
                                            <select class="form-control" id="status" name="status">
                                                <option value="on" <?= ($s['status'] == 'on' ? 'selected' : '') ?>>on</option>
                                                <option value="off" <?= ($s['status'] == 'off' ? 'selected' : '') ?>>off</option>
                                            </select>
                                            <?= form_error('status', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="submit" href="" class="btn btn-success mr-2">
                                    <span class="text">Simpan</span>
                                </button>
                                <a class="btn btn-danger" href="javascript:history.go(-1)">
                                    Batal
                                </a>
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
</body>

</html>