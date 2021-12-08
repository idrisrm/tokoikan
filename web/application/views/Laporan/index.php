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
                                <span>laporan Laba Rugi</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">laporan Laba Rugi</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="bulan">Bulan</label>
                                        <select class="form-control" id="bulan" name="bulan">
                                            <option value="">--Pilih Bulan--</option>

                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>

                                        </select>
                                        <?= form_error('bulan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="tahun">Tahun</label>
                                        <select class="form-control" id="tahun" name="tahun">
                                            <option value="">--Pilih tahun--</option>

                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>

                                        </select>
                                        <?= form_error('tahun', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <a class="btn btn-danger" href="javascript:history.go(-1)">
                                    Batal
                                </a>
                                <button type="submit" href="" class="btn btn-success mr-2">
                                    <span class="text">Kirim</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container-fluid">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <center>
                                                <label>laporan Laba/Rugi</label><br>
                                                <label>Untuk Periode November 2021</label>

                                            </center>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-md-6">Penjualan</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($penjualan['totalpenjualan'], 0, ",", ".") ?></div>
                                    </div>
                                    <div class="row border-bottom">
                                        <div class="col-md-6">Harga Pokok Penjualan</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($pokok['totalnya'], 0, ",", ".") ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">Laba Kotor</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($penjualan['totalpenjualan'] - $pokok['totalnya'], 0, ",", ".") ?></div>
                        
                                    </div>
<br><br>

                                    <div class="row">
                                        <div class="col-md-6">Laba Kotor</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($penjualan['totalpenjualan'] - $pokok['totalnya'], 0, ",", ".") ?></div>
                                    </div>
                                    <div class="row border-bottom">
                                        <div class="col-md-6">Biaya Usaha</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($biaya['total'], 0, ",", ".") ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">Laba Bersih</div>
                                        <div class="col-md-6 text-right">Rp. <?= number_format($penjualan['totalpenjualan'] - $pokok['totalnya'] - $biaya['total'], 0, ",", ".") ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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