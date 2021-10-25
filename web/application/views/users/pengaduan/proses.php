<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar_users.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                                <span>Data Proses Pengaduan</span>
                            </h1>
                            <div class="page-header-subtitle">Master Data Pengaduan</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="col">
                            <?php echo $this->session->flashdata('pesan') ?>
                        </div>
                        <div class="card-header">
                            <div class="row">
                                <div class="dropdown btn-padding">
                                    <select class="btn btn-sm form-control" id="kategori" name="kategori" aria-placeholder="">
                                        <option class="mr-3">Pilih Kategori</option>
                                    </select>
                                </div>
                                <a class="btn btn-sm btn-primary" href="#">
                                    <i data-feather="refresh-ccw"></i>
                                </a>
                            </div>
                            <div class="no-caret">
                                <a class="btn btn-sm btn-primary print_kategori" target="_blank" href="<?= base_url(); ?>export/getPengaduanOPD/proses/">
                                    <i data-feather="printer"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">No</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Judul</th>
                                            <th>Alamat</th>
                                            <th>Dinas</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                            <th style="width: 20px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">

                                    </tbody>
                                </table>
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
<script>
    $(document).ready(function() {
        var list_kategori = [];
        $("#kategori").select2({
            data: getData()
        }).on('change', function(e) {
            idKey = $("#kategori").val();
            console.log(idKey);
            $('.print_kategori').attr('href', '<?= base_url(); ?>export/getPengaduanOPD/proses/' + idKey);
            getFilter(idKey);
        });
    });
    $.ajax({
        url: "<?php echo base_url() . "PengaduanOPD/data_proses_ajax" ?>",
        dataType: "json",
        success: function(data) {
            var baris = '';
            var no = 1;
            for (var i = 0; i < data.length; i++) {
                if (data[i].st_pengaduan === "offline") {
                    var msg = 'danger';
                } else {
                    var msg = 'success';
                }
                baris += '<tr>' +
                    '<td>' + (no + i) + '</td>' +
                    '<td>' + data[i].tgl_pengaduan + '</td>' +
                    '<td>' + data[i].nm_pelapor + '</td>' +
                    '<td>' + data[i].judul + '</td>' +
                    '<td>' + data[i].alamat + '</td>' +
                    '<td>' + data[i].nm_opd + '</td>' +
                    '<td>' + data[i].nm_kategori + '</td>' +
                    '<td>' + '<div class="badge badge-' + msg + ' badge-pill">' + data[i].st_pengaduan + '</div>' + '</td>' +
                    '<td> <a href="detail/' + data[i].id_pengaduan + '" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-search-plus"></i></a></td>'
                '</tr>'
            }
            $('#dataTable').dataTable().fnDestroy();
            $('#target').html(baris);
            $("#dataTable").dataTable({
                "paging": true,
                "searching": true
            });
        },
    });

    function getData() {
        $.ajax({
            url: "<?php echo base_url() . "Pengaduan/getKategoriOPD" ?>",
            dataType: "json",
            success: function(data) {
                var html = '<option value="">' + " Pilih Kategori " + '</option>';
                var no = 1;
                for (var i = 0; i < data.length; i++) {
                    html += '<option value="' + data[i].id_kategori + '">' + data[i].nm_kategori + '</option>';
                }
                $('#kategori').html(html);
            },
        });
    }

    function getFilter(idKey) {
        $.ajax({
            url: "<?= base_url(); ?>Pengaduan/getFilterProsesOPD",
            method: "POST",
            data: {
                id_kategori: idKey
            },
            async: false,
            dataType: "json",
            success: function(data) {
                console.log(data)
                var baris = '';
                var no = 1;
                for (var i = 0; i < data.length; i++) {
                    baris += '<tr>' +
                        '<td>' + (no + i) + '</td>' +
                        '<td>' + data[i].tgl_pengaduan + '</td>' +
                        '<td>' + data[i].nm_pelapor + '</td>' +
                        '<td>' + data[i].judul + '</td>' +
                        '<td>' + data[i].alamat + '</td>' +
                        '<td>' + data[i].nm_opd + '</td>' +
                        '<td>' + data[i].nm_kategori + '</td>' +
                        '<td>' + '<div class="badge badge-danger badge-pill">' + data[i].st_pengaduan + '</div>' + '</td>' +
                        '<td> <a href="detail/' + data[i].id_pengaduan + '" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-search-plus"></i></a></td>'
                    '</tr>'
                }
                $('#dataTable').dataTable().fnDestroy();
                $('#target').html(baris);
                $("#dataTable").dataTable({
                    "paging": true,
                    "searching": true
                });
            }
        });
    }
</script>

</html>