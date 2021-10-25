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
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                <span>Tambah Data Kelurahan Baru</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Data Kelurahan Baru</div>
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="nama_kelurahan">Nama Kelurahan</label>
                                        <input class="form-control" id="nama_kelurahan" name="nama_kelurahan" type="text" placeholder="Masukkan Nama Kelurahan" />
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="kecamatan">Kecamatan</label>
                                        <select class="form-control" id="kecamatan" name="kecamatan">
                                            <?php foreach ($data as $d) { ?>
                                                <option value="<?= $d['id_area'] ?>"><?= $d['nm_area'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" href="<?= base_url('Kelurahan/tambah') ?>" class="btn btn-success mr-2">
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
    <script>
        $(document).ready(function() {
            $("#kecamatan").select2({
                data: getData()
            });
        });
        function getData() {
              $.ajax({
                url: "<?php echo base_url() . "Kecamatan/data_kecamatan" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kecamatan "+ '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_area + '">' + data[i].nm_area + '</option>';
                    }
                
                    $('#kecamatan').html(html);
                
                },
            });
        }
    </script>
</body>

</html>