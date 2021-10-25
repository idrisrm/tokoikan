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
                                        <div class="page-header-icon mt-1">
                                            <a href="javascript:history.go(-1)">
                                                <i data-feather="arrow-left" class="text-black mr-3"></i>
                                            </a>
                                            <i data-feather="file-text"></i>
                                        </div>
                                        Pengaduan - Detail
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <nav class="nav nav-borders">
                        <a class="nav-link active" href="">Detail Pengaduan</a>
                    </nav>

                    <hr class="mt-0 mb-4" />
                    <form action="" method="post" autocomplete="off">
                        <div class="card card-header-actions mx-auto mb-4">
                            <div class="card-header">Data Pengaduan</div>
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <?php foreach ($data as $d) { ?>

                                <div class="card-body">
                                    <div class="sbp-preview">

                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-12">
                                                    <label>ID Pengaduan</label>
                                                    <p><b><?= $d['id_pengaduan'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Nama Pelapor</label>
                                                    <p><b><?= $d['nm_pelapor'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Tanggal / Jam Pengaduan</label>
                                                    <p><b><?= $d['tgl_pengaduan'] ?> / <?= $d['jam_pengaduan'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Status</label><br>
                                                    <b class="text-danger">Tolak</b>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Email</label>
                                                    <p><b><?= $d['email'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>No. Telepon</label>
                                                    <p><b><?= $d['telepon'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Kategori Pengaduan</label>
                                                    <p><b><?= $d['nm_kategori'] ?></b></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Judul Pengaduan</label>
                                                    <p><b><?= $d['judul'] ?></b></p>
                                                </div>
                                                <div class="col-lg-3 col-sm-12">
                                                    <label>Deskripsi Pengaduan</label>
                                                    <p><b><?= $d['deskripsi'] ?></b></p>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <label>Foto Pengaduan</label>
                                                    <div>
                                                        <img class="img-fluid mb-2" src="<?= base_url($d['foto']) ?>" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sbp-preview mt-4 mb-4">
                                        <div class="card-header">
                                            Data Lokasi Pengaduan
                                            <!-- <div class="no-caret">
                                                <a class="btn btn-sm btn-primary" href="<?= base_url('Pengaduan/detailmaps/' . $d['id_pengaduan']) ?>" target="_blank">
                                                    Lihat Maps
                                                </a>
                                            </div> -->
                                        </div>
                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Alamat</label>
                                                    <p><b><?= $d['alamat'] ?></b></p>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Langitude</label>
                                                    <p><b><?= $d['langitude'] ?></b></p>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label>Longitude</label>
                                                    <p><b><?= $d['longitude'] ?></b></p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <div class="sbp-preview mt-4 mb-4">
                                        <div class="card-header">
                                            Data OPD
                                        </div>
                                        <div class="sbp-preview-content">
                                            <div class="row">
                                                <div class="col-lg-4 col-sm-12">
                                                    <label class="mb-1" for="kategori_pengaduan">Kategori Pengaduan</label>
                                                    <select class="form-control" id="kategori_pengaduan" name="kategori_pengaduan">
                                                        <option value="" selected hidden>Pilih Kategori Pengaduan</option>
                                                    <?php foreach ($kategori as $row) { ?>
                                                        <option value="<?php echo $row['id_kategori']; ?>" <?= ($d['id_kategori'] == $row['id_kategori'] ? 'selected' : '') ?>>
                                                        <?php echo $row['nm_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                                </div>
                                                <div class="col-lg-4 col-sm-12">
                                                    <label class="mb-1" for="opd">OPD Terkait</label>
                                                    <select class="form-control" id="opd" name="opd">
                                                        <option value="" selected hidden>Pilih OPD</option>
                                                    <?php foreach ($opd as $row) { ?>
                                                        <option selected value="<?php echo $row['id_opd']; ?>" <?= ($d['id_opd'] == $row['id_opd'] ? 'selected' : '') ?>>
                                                        <?php echo $row['nm_opd']; ?></option>
                                                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                                </div>
                            <?php } ?>
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
    <script>
        $(document).ready(function() {
            var idKey;
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