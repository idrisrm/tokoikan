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
                                <div class="page-header-icon"><i data-feather="users"></i></div>
                                <span>Data Customer Kredit</span>
                            </h1>
                            <div class="page-header-subtitle">Master Data Customer Kredit</div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <!-- <div class="card-header">
                            <a class="btn btn-primary btn-sm shadow-sm" href="<?= base_url('Karyawan/tambah') ?>">
                                Tambah Karyawan
                            </a>
                        </div> -->
                        <div class="card-body">
                            <div class="col">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">No</th>
                                            <th>NIK</th>
                                            <th>Nama Customer Kredit</th>
                                            <th>Total Hutang</th>
                                            <th>Otlet</th>
                                            <th>Status</th>
                                            <th style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($penghutang as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['no_ktp'] ?></td>
                                                <td><?= $data['nama_penghutang'] ?></td>
                                                <td><?= $data['total_hutang'] ?></td>
                                                <td><?= $data['wilayah'] ?></td>
                                                <td><?= $data['status'] == 1 ? 'Bisa Hutang' : 'Tidak Bisa Hutang' ?></td>
                                                <td>
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= base_url('DataPenghutang/detail/' . $data['no_ktp']) ?>">
                                                        <i data-feather="eye"></i>
                                                    </a>

                                                    <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_modal('<?php echo base_url('Karyawan/hapus/' . $data['id'])  ?>')" data-toggle="modal" data-target="#modalDelete">
                                                        <i data-feather="trash-2"></i>
                                                    </a> -->
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url("DataKategori/tambah") ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="kategori">Nama Kategori</label>
                                                        <input class="form-control" id="kategori" name="kategori" type="text" placeholder="Masukkan Nama Kategori" />
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
                                        <form action="<?= base_url("DataKategori/edit") ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="kategori">Nama Kategori</label>
                                                        <input class="form-control" id="kategori" name="kategori" type="text" placeholder="Masukkan Nama Kategori" value="" />
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
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
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
</body>

</html>