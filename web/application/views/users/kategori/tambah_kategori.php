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
                                <div class="page-header-icon"><i data-feather="grid"></i></div>
                                <span>Tambah Kategori Pengaduan Baru</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                        </div>

                        <div class="card-header">
                            <div class="col-lg-12 col-sm-12">
                                <form action="" method="post" autocomplete="off" class="row">
                                    <div class="col-lg-4 col-sm-4">
                                        <select class="form-control" id="nama_kategori" name="nama_kategori">
                                        <option value="0" class="mr-4">Pilih Kategori</option>
                                            <?php foreach ($ku as $d) { ?>
                                                <option value="<?= $d['id_kategori'] ?>"><?= $d['nm_kategori'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <button class="btn btn-primary" type="submit" name="tambah" id="tambah">
                                            <span class="text">Tambah</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataProduk" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">No</th>
                                            <th>Nama Kategori</th>
                                            <th style="width: 80px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kategoriku as $k) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $k['nm_kategori'] ?></td>
                                                <td>
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_modal('<?php echo base_url('Kategori_Users/hapus/' . $k['id_detail'])  ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            console.log(delete_url);
            document.getElementById('delete_link').setAttribute('href', delete_url);
            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
        }
        $(document).ready(function() {
            var list_kecamatan = [
                
            ];
            $("#nama_kategori").select2({
                data: list_kecamatan
            });
        });
    </script>
</body>

</html>