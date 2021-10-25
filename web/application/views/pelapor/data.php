<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<!-- <?php $this->load->view("_partials/modal/delete.php") ?> -->

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
                                <div class="page-header-icon"><i data-feather="users"></i></div>
                                <span>Daftar Akun Pelapor Aplikasi Pengaduan</span>
                            </h1>
                            <div class="page-header-subtitle">Master Data Akun Pelapor Aplikasi Pengaduan</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">

                    <form action="" method="post">
                        <div class="card mb-4">
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th style="width: 100px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data as $d) { ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $d['email'] ?></td>
                                                    <td><?= $d['nm_pelapor'] ?></td>
                                                    <td>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('Pelapor/detail/' . $d['id_pelapor']) ?>"><i data-feather="zoom-in"></i></a>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_modal('<?php echo base_url('Pelapor/hapus/' . $d['id_pelapor'])  ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                                                      </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
                                                    <a class="btn btn-danger" id="delete_link" type="button" href="">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
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
</body>
<script type="text/javascript">
    function confirm_modal(delete_url) {
        $('#hapusModal').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
    }
</script>
</html>