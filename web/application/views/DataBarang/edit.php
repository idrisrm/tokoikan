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
                                <span>Edit Data Kategori Pengaduan</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Edit Data Kategori Pengaduan</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="nama">Nama barang</label>
                                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan Nama Barang" value="<?= $barang['nama_barang'] ?>" />
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="small mb-1" for="kategori">Kategori barang</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <?php foreach ($kategori as $data) { ?>
                                                <option value="<?= $data['id_kategori'] ?>" <?= ($barang['id_kategori'] == $data['id_kategori'] ? 'selected' : '') ?>><?= $data['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="stok">Stok</label>
                                        <input class="form-control" id="stok" name="stok" type="number" placeholder="Masukkan Stok Barang" value="<?= $barang['stok'] ?>" />
                                        <?= form_error('stok', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="harga">Harga</label>
                                        <input class="form-control" id="harga" name="harga" type="number" placeholder="Masukkan Harga Barang" value="<?= $barang['harga'] ?>" />
                                        <?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
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