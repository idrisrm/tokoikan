<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<?php $this->load->view("_partials/modal/tolak.php") ?>
<?php $this->load->view("_partials/modal/disposisi.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <div class="row align-items-center justify-content-between pt-3">
                                <div class="col-auto mb-3">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon mt-2">
                                            <a href="javascript:history.go(-1)">
                                                <i data-feather="arrow-left" class="text-black mr-3"></i>
                                            </a>
                                            <i data-feather="file-text"></i>
                                        </div>
                                        laporan Laba/Rugi Bulanan
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <nav class="nav nav-borders">
                        <a class="nav-link " href="<?= base_url('Laporan/index/' )?>">Laporan Laba/Rugi harian</a>
                        <a class="nav-link active" href="<?= base_url('Laporan/bulanan' )?>">laporan Laba/Rugi Bulanan</a>
                    </nav>

                    <hr class="mt-0 mb-4" />
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">Laba/Rugi</div>
                        <div class="col">
                            <?php echo $this->session->flashdata('pesan') ?>
                        </div>

                        <form action="" method="post" autocomplete="off">
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
                                                    <label>Untuk Periode <?= date('F', mktime(0, 0, 0, $bulan));?></label>

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
                    </div>
                </div>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
    <script>
        $(document).ready(function() {
            var idKey, datakey;
            datakey = $("#id_kategori").val()
            $("#opd").select2({
                data: get(datakey)
            });

            $("#kategori_pengaduan").select2({
                data: getData()
            }).on('change', function(e) {
                idKey = $("#kategori_pengaduan").val();
                console.log(idKey);
                $("#opd").select2({
                    data: getOPD(idKey)
                });
            });
        });

        function getData() {
            $.ajax({
                url: "<?php echo base_url() . "Pengaduan/getKategori" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kategori " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kategori + '">' + data[i].nm_kategori + '</option>';
                    }
                    $('#kategori_pengaduan').html(html);
                },
            });
        }

        function get(datakey) {
            $.ajax({
                url: "<?= base_url(); ?>Pengaduan/getOPD",
                method: "POST",
                data: {
                    id_kategori: datakey
                },
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih OPD " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_opd + '">' + data[i].nm_opd + '</option>';
                    }
                    $('#opd').html(html);
                    console.log("ini", html)
                }
            });
        }

        function getOPD(idKey) {
            $.ajax({
                url: "<?= base_url(); ?>Pengaduan/getOPDterkait",
                method: "POST",
                data: {
                    id_opd: idKey
                },
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih OPD " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_opd + '">' + data[i].nm_opd + '</option>';
                    }
                    $('#opd').html(html);
                    console.log("ini", html)
                }
            });
        }
    </script>
</body>

</html>