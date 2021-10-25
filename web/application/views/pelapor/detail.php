<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>

<body class="nav-fixed">
    <?php $this->load->view("_partials/header.php") ?>
    <div id="layoutSidenav">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="page-header pb-10 page-header-dark bg-primary">
                    <div class="container-fluid">
                        <div class="page-header-content">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                <span>Detail Akun Pelapor</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post">
                        <?php foreach ($data as $d) { ?>
                            <div class="card card-header-actions mx-auto mb-4">
                                <div class="card-header">Detail Akun Pelapor</div>
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <label>ID Pelapor</label>
                                                <p><b><?= $d['id_pelapor'] ?></b></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label>Nama Pelapor</label>
                                                <p><b><?= $d['nm_pelapor'] ?></b></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label>Email</label>
                                                <p><b><?= $d['email'] ?></b></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label>No. Telepon</label>
                                                <p><b><?= $d['telepon'] ?></b></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-12">
                                                <label>Alamat</label>
                                                <p><b><?= $d['alamat'] ?></b></p>
                                            </div>
                                            <div class="col-lg-3 col-sm-12">
                                                <label>Status Akun</label>
                                                <?php if ($d['blokir'] == 'N') { ?>
                                                    <p><b class="text-success">Aktif</b></p>
                                                <?php } else { ?>
                                                    <p><b class="text-danger">Nonaktif</b></p>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($d['blokir'] == 'N') { ?>
                                        <a class="btn btn-danger" href="" data-toggle="modal" onclick="confirm_modal('<?php echo base_url('Pelapor/blokirON/' . $d['id_pelapor'])  ?>')" data-target="#modalNonaktif">
                                            Nonaktifkan Akun
                                        </a>
                                    <?php } else { ?>
                                        <a class="btn btn-success" href="" data-toggle="modal" onclick="confirm_modal('<?php echo base_url('Pelapor/blokirOff/' . $d['id_pelapor'])  ?>')" data-target="#modalNonaktif">
                                            Aktifkan Akun
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>

                    </form>
                </div>
            </main>

            <div class="modal fade" id="modalNonaktif" tabindex="-1" role="dialog" aria-labelledby="nonaktifModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="nonaktifModalLabel">Akun</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah Anda yakin untuk merubah akun ini?</div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                            <a class="btn btn-danger" name="delete_link" id="delete_link" type="button" href="">Ya</a>
                        </div>
                    </div>
                </div>
            </div>




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