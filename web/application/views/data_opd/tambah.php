<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<!-- <?php $this->load->view("_partials/modal/simpan.php") ?> -->

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
                                <div class="page-header-icon"><i data-feather="command"></i></div>
                                <span>Tambah Data OPD Baru</span>
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Data Organisasi Perangkat Daerah Baru</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="nama_opd">Nama OPD</label>
                                        <input class="form-control" id="nama_opd" name="nama_opd" type="text" placeholder="Masukkan Nama OPD" />
                                        <?= form_error('nama_opd', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="alamat">Alamat</label>
                                        <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Masukkan Alamat" />
                                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="kecamatan">Kecamatan</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <option value="" selected hidden>Pilih Kecamatan</option>
                                        </select>
                                        <?= form_error('kecamatan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="kelurahan">Kelurahan</label>
                                        <select class="form-control" id="kelurahan" name="kelurahan">
                                            <option value="" selected hidden>Pilih Kelurahan</option>
                                        </select>
                                        <?= form_error('kelurahan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" href="<?= base_url('DataOPD/tambah') ?>" class="btn btn-success mr-2">
                                    <span class="text">Simpan</span>
                                </button>
                                <a class="btn btn-danger" href="javascript:history.go(-1)">
                                    Batal
                                </a>
                            </div>
                        </div>
                        <div class="modal fade" id="modalSimpan" tabindex="-1" role="dialog" aria-labelledby="simpanModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="simpanModalLabel">Simpan Data</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah Anda yakin untuk menyimpan data?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-success" id="save_link" type="button" href="">Simpan</a>
                                    </div>
                                </div>
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
    <script>
        $(document).ready(function() {
            $('#dataProduk').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });

        function confirm_tambah(add) {
            $('#modalSimpan').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('save_link').setAttribute('href', add);
        }
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
</body>

</html>