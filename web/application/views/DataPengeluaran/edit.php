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
                                <span>Edit Data Pengeluaran</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Edit Data Pengeluaran</div>
                            <div class="card-body">
                                <div class="row">
                                    <?php foreach ($pengeluaran as $p) : ?>
                                        <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <label class="small mb-1" for="biaya">Biaya</label>
                                            <input class="form-control" id="biaya" name="biaya" type="text" placeholder="Masukkan Biaya" value="<?= $p['biaya'] ?>" />
                                            <?= form_error('biaya', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <label class="small mb-1" for="keterangan">keterangan</label>
                                            <input class="form-control" id="keterangan" name="keterangan" type="text" placeholder="Masukkan keterangan" value="<?= $p['keterangan'] ?>" />
                                            <?= form_error('keterangan', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <select class="form-control" id="otlet" name="otlet">
                                                <option value="">Pilih Otlet</option>
                                                <?php foreach ($otlet as $data) { ?>
                                                    <option value="<?= $data['id_otlet'] ?>" <?= ($p['id_otlet'] == $data['id_otlet'] ? 'selected' : '') ?>><?= $data['wilayah'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('otlet', '<small class="text-danger pl-2">', '</small>'); ?>
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