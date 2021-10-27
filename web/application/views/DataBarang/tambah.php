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
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                                <span>Tambah Data Barang</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Data Barang</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="kode">Kode Barang</label>
                                        <input class="form-control" id="kode" name="kode" type="text" placeholder="Masukkan Kode Barang" value="<?= set_value('kode') ?>" />
                                        <?= form_error('kode', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="nama">Nama Barang</label>
                                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan Nama Barang" value="<?= set_value('nama') ?>" />
                                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="otlet">Otlet</label>
                                        <select class="form-control" id="otlet" name="otlet">
                                            <option value="">--Pilih Otlet--</option>
                                            <?php foreach ($otlet as $data) { ?>
                                                <option value="<?= $data['id_otlet'] ?>"><?= $data['wilayah'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('otlet', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="kategori">Kategori barang</label>
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option value="">--Pilih Kategori</option>
                                            <?php foreach ($kategori as $data) { ?>
                                                <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('kategori', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="stok">Stok</label>
                                        <input class="form-control" id="stok" name="stok" type="number" placeholder="Masukkan Stok" value="<?= set_value('stok') ?>" />
                                        <?= form_error('stok', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="harga">Harga</label>
                                        <input class="form-control" id="harga" name="harga" type="number" placeholder="Masukkan Harga" value="<?= set_value('harga') ?>" />
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