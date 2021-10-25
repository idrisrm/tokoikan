<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<?php //$this->load->view("_partials/modal/delete.php") 
?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                <span>Data Kecamatan</span>
                            </h1>
                            <div class="page-header-subtitle">Master Data Kecamatan</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">
                            <a class="btn btn-primary btn-sm shadow-sm" href="onclick=" confirm_modal() data-toggle="modal" data-target="#modalTambah">
                                Tambah Kecamatan
                            </a>
                        </div>
                        <div class="col">
                            <?php echo $this->session->flashdata('pesan') ?>
                        </div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">No</th>
                                            <th>Kecamatan</th>
                                            <th style="width: 40px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="target">
                                        <!-- <?php
                                                $no = 1;
                                                foreach ($data as $d) { ?>
                                            <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $d['nm_area'] ?></td>
                                            <td>
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('Kelurahan/edit') ?>"><i data-feather="edit-2"></i></a>
                                                <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?> -->

                                    </tbody>
                                </table>
                                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Kecamatan/tambah') ?>" method="post">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="nama_kecamatan">Nama Kecamatan</label>
                                                        <input class="form-control" id="nama_kecamatan" name="nama_kecamatan" type="text" placeholder="Masukkan Nama Kecamatan" />
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url('Kecamatan/edit') ?>" method="post">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="nama_kecamatan">Nama Kecamatan</label>
                                                        <input class="form-control" id="nama_kecamatan" name="nama_kecamatan" type="text" placeholder="Masukkan Nama Kecamatan" />
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin untuk menghapus data?</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-danger" name="delete_link" id="delete_link" type="button" href="">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </main>
            <script type="text/javascript">
                function confirm_modal(delete_url) {
                    console.log(delete_url);
                    document.getElementById('delete_link').setAttribute('href', delete_url);
                    $('#hapusModal').modal('show', {
                        backdrop: 'static'
                    });
                }
            </script>
            <?php $this->load->view("_partials/js.php") ?>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>

</body>
<script>
    $.ajax({
        url: "<?php echo base_url() . "Kecamatan/data_kecamatan" ?>",
        dataType: "json",
        success: function(data) {
            var baris = '';
            var no = 1;
            for (var i = 0; i < data.length; i++) {
                baris += '<tr>' +
                    '<td>' + (no + i) + '</td>' +
                    '<td>' + data[i].nm_area + '</td>' +
                    '<td><a href="edit/' + data[i].id_area + '"  class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fa fa-pencil-alt"></i></a><a onclick="confirm_modal(' + "'hapus/" + data[i].id_area + "'" + ')" href=""  data-toggle="modal" data-target="#modalDelete"class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-trash"></i></a></td>'
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
</script>

</html>