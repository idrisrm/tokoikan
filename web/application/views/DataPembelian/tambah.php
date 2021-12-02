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
                                <span>Tambah Data Pembelian</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Data Pembelian</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="supplier">Supplier</label>
                                        <?php $adasupplier = $this->db->query("SELECT * FROM pembelian, supplier WHERE pembelian.id_supplier = supplier.id_supplier AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
                                        ?>
                                        <?php if ($adasupplier) : ?>
                                            <label class="small mb-1" for="supplier">supplier</label>
                                            <?php foreach ($adasupplier as $as) : ?>
                                                <input class="form-control" id="supplier" name="supplier" type="text" placeholder="Masukkan supplier" value="<?= $as['nama_supplier']; ?>" readonly />
                                                <?= form_error('supplier', '<small class="text-danger pl-2">', '</small>'); ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <select class="form-control" id="supplier" name="supplier">
                                                <option value="">Pilih supplier</option>
                                                <?php foreach ($supplier as $data) { ?>
                                                    <option value="<?= $data['id_supplier'] ?>"><?= $data['nama_supplier'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('supplier', '<small class="text-danger pl-2">', '</small>'); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="barang">Barang</label>
                                        <select class="form-control" id="barang" name="barang">
                                            <option value="">Pilih Barang</option>
                                            <?php foreach ($barang as $data) { ?>
                                                <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <?= form_error('barang', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="qty">Qty</label>
                                        <input class="form-control" id="qty" name="qty" type="text" placeholder="Masukkan Qty" />
                                        <?= form_error('qty', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="hargasatuan">Harga Satuan</label>
                                        <input class="form-control" id="hargasatuan" name="hargasatuan" type="text" placeholder="Masukkan Harga Satuan" value="<?= set_value('hargasatuan') ?>" />
                                        <?= form_error('hargasatuan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="totalharga">Total Harga</label>
                                        <input class="form-control" id="totalharga" name="totalharga" type="text" placeholder="Masukkan Total Harga" value="<?= set_value('totalharga') ?>" />
                                        <?= form_error('totalharga', '<small class="text-danger pl-2">', '</small>'); ?>
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