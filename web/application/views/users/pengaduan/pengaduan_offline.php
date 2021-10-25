<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php")
    ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar_users.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                <span>Tambah Data Pengaduan Offline</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">
                                Data Pengaduan
                            </div>
                            <div class="card-body">
                                <div class="col">
                                    <?php echo $this->session->flashdata('pesan') ?>
                                </div>
                                <div class="sbp-preview-content">
                                    <div class="row">
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="nama_lengkap">Nama Lengkap</label>
                                            <input class="form-control" name="nama_lengkap" id="nama_lengkap" type="text" placeholder="Masukkan Nama Lengkap Pelapor" />
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control" name="email" id="email" type="text" placeholder="Masukkan Email Pelapor" />
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="no_telepon">Nomor Telepon</label>
                                            <input class="form-control" name="no_telepon" id="no_telepon" type="text" placeholder="Masukkan Nomor Telepon Pelapor" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="tanggal_pengaduan">Tanggal Pengaduan</label>
                                            <input class="form-control" name="tanggal_pengaduan" id="tanggal_pengaduan" type="date" placeholder="Masukkan Tanggal Pengaduan" />
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="kategori">Kategori Pengaduan</label>
                                            <select class="form-control" id="kategori" name="kategori">
                                                <option value="" selected hidden>Pilih Kategori</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="judul_pengaduan">Judul Pengaduan</label>
                                            <input class="form-control" name="judul_pengaduan" id="judul_pengaduan" type="text" placeholder="Masukkan Judul Pengaduan" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="alamat_lengkap">Alamat Lengkap</label>
                                            <input class="form-control" name="alamat_lengkap" id="alamat_lengkap" type="text" placeholder="Masukkan Alamat Lengkap" />
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="kecamatan">Kecamatan</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan">
                                                <option value="" selected hidden>Pilih Kecamatan</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="kelurahan">Kelurahan</label>
                                            <select class="form-control" id="kelurahan" name="kelurahan">
                                                <option value="" selected hidden>Pilih Kelurahan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                            <label class="small mb-1" for="deskripsi_pengaduan">Deskripsi Pengaduan</label>
                                            <textarea name="deskripsi_pengaduan" id="deskripsi_pengaduan" class="form-control" id="" cols="30" rows="10"></textarea>
                                        </div>
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
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('deskripsi_pengaduan');
        CKEDITOR.config.autoParagraph = false;
    </script>
    <script>
        $(document).ready(function() {
            var idKey;
            $("#kecamatan").select2({
                data: getData()
            }).on('change', function(e) {
                idKey = $("#kecamatan").val();
                console.log(idKey);
                $("#kelurahan").select2({
                    data: getKelurahan(idKey)
                });
            });

            $("#kategori").select2({
                data: getKategori()
            });

        });

        function getData() {
            $.ajax({
                url: "<?php echo base_url() . "Kecamatan/data_kecamatan" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kecamatan " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_area + '">' + data[i].nm_area + '</option>';
                    }

                    $('#kecamatan').html(html);

                },
            });
        }

        function getKategori() {
            $.ajax({
                url: "<?php echo base_url() . "DataKategori/data_kategori" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kategori " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kategori + '">' + data[i].nm_kategori + '</option>';
                    }
                    $('#kategori').html(html);
                    console.log(html)
                },
            });
        }

        function getKelurahan(idKey) {
            $.ajax({
                url: "<?= base_url(); ?>Kecamatan/data_kelurahan_ajax",
                method: "POST",
                data: {
                    id_area: idKey
                },
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kelurahan " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].area1 + '">' + data[i].kelurahan + '</option>';
                    }
                    $('#kelurahan').html(html);
                    console.log("ini", html)
                }
            });
        }
    </script>
    <style>
        #cke_deskripsi_pengaduan {
            width: 100% !important;
        }
    </style>
</body>

</html>