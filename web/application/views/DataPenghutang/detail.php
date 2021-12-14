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
                                        Detail Customer Kredit
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <nav class="nav nav-borders">
                        <a class="nav-link active" href="">Detail Customer Kredit</a>
                        <a class="nav-link " href="<?= base_url('DataPenghutang/DetailPembelian/' . $hutang['no_ktp']) ?>">Detail Pembelian</a>
                        <a class="nav-link " href="<?= base_url('DataPenghutang/DetailPembayaran/' . $hutang['no_ktp']) ?>">Detail Pembayaran</a>
                    </nav>

                    <hr class="mt-0 mb-4" />
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">Data Customer Kredit</div>
                        <div class="col">
                            <?php echo $this->session->flashdata('pesan') ?>
                        </div>
                        <div class="card-body">
                            <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label>NO KTP</label>
                                            <p><b><?= $hutang['no_ktp'] ?></b></p>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label>Nama Calon Customer Kredit</label>
                                            <p><b><?= $hutang['nama_penghutang'] ?></b></p>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label>Otlet</label>
                                            <p><b><?= $hutang['wilayah'] ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label>Foto KTP Customer Kredit</label>
                                            <div>
                                                <img class="img-fluid mb-2" style="width: 600px;" src="<?= base_url($hutang['foto_ktp']) ?>" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Konfirmasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Mengkonfirmasi Pengajuan Ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                            <a href="<?= base_url('DataPenghutang/konfirmasi/' . $hutang['no_ktp']) ?>" class="btn btn-primary">Simpan</a>
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