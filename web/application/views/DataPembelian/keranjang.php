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
                                        <div class="page-header-icon mt-2 ml-2">
                                            <i data-feather="file-text"></i>
                                        </div>
                                        Data Keranjang
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">
                            Data Keranjang
                            <?php if ($keranjang) : ?>
                                <div class="card-header">
                                    <div class="page-header-icon mt-2">
                                        <a class="btn btn-primary btn-sm shadow-sm" href="" onclick="confirm_kirim('')" data-toggle="modal" data-target="#modalCheckout">
                                            Checkout
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
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
                                            <th>Supplier</th>
                                            <th>Nama Produk</th>
                                            <th>Qty</th>
                                            <th>Harga Satuan</th>
                                            <th>Total Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($keranjang as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama_supplier']; ?></td>
                                                <td><?= $data['nama_barang'] ?></td>
                                                <td><?= $data['qty'] ?></td>
                                                <td>Rp. <?= number_format($data['harga_satuan'], 0, ",", ".") ?></td>
                                                <td>Rp. <?= number_format($data['total_harga'], 0, ",", ".") ?></td>
                                                <td>
                                                    <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?= base_url('DataPembelian/editkeranjang/' . $data['id_detail_pembelian']) ?>">
                                                        <i data-feather="edit-2"></i>
                                                    </a> -->
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_modal('<?php echo base_url('DataPembelian/hapuskeranjang/' . $data['id_detail_pembelian'])  ?>')" data-toggle="modal" data-target="#modalDelete">
                                                        <i data-feather="trash-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
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
                                                <a class="btn btn-danger" name="delete_link" id="delete_link" type="button" href="">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Checkout Data</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <label class="small mb-1" for="metode">Pilih Metode Pembayaran</label>
                                                        <select class="form-control" id="metode" name="metode">
                                                            <option value="">Pilih metode pembayaran</option>
                                                            <option value="1">Cash</option>
                                                            <option value="2">Hutang</option>
                                                        </select>
                                                        <?= form_error('metode', '<small class="text-danger pl-2">', '</small>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-primary" name="kirim_link" id="kirim_link" type="button" href="">Lanjut</a>
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
    <?php $this->load->view("_partials/js.php") ?>
    <script type="text/javascript">
        function confirm_modal(delete_url) {
            console.log(delete_url);
            document.getElementById('delete_link').setAttribute('href', delete_url);

            $('#hapusModal').modal('show', {
                backdrop: 'static'
            });
        }

        function confirm_kirim(checkout_url) {
            console.log(checkout_url);
            document.getElementById('kirim_link').setAttribute('href', checkout_url);

            $('#checkoutModal').modal('show', {
                backdrop: 'static'
            });
        }
    </script>
</body>

</html>