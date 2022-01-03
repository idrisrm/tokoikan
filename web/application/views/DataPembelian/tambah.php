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
                                <div class="page-header-icon"><i data-feather="plus"></i></div>
                                <span>Tambah Data Pembelian</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" autocomplete="off">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Data Pembelian</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <label class="small mb-1" for="invoice">No Invoice</label>
                                        <?php $adasupplier = $this->db->query("SELECT * FROM pembelian, supplier, otlet WHERE pembelian.id_supplier = supplier.id_supplier AND pembelian.id_otlet = otlet.id_otlet AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
                                        ?>
                                        <?php if ($adasupplier) : ?>
                                            <?php foreach ($adasupplier as $as) : ?>
                                                <input class="form-control" id="invoice" name="invoice" type="text" placeholder="Masukkan no invoice" value="<?= $as['id_pembelian']; ?>" readonly />
                                                <?= form_error('invoice', '<small class="text-danger pl-2">', '</small>'); ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <input class="form-control" id="invoice" name="invoice" type="text" placeholder="Masukkan no invoice" value="" />
                                            <?= form_error('invoice', '<small class="text-danger pl-2">', '</small>'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="supplier">Supplier</label>
                                        <?php $adasupplier = $this->db->query("SELECT * FROM pembelian, supplier, otlet WHERE pembelian.id_supplier = supplier.id_supplier AND pembelian.id_otlet = otlet.id_otlet AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
                                        ?>
                                        <?php if ($adasupplier) : ?>
                                            <?php foreach ($adasupplier as $as) : ?>
                                                <input class="form-control" id="supplier" name="supplier" type="text" placeholder="Masukkan supplier" value="<?= $as['nama_supplier']; ?>" readonly />
                                                <?= form_error('supplier', '<small class="text-danger pl-2">', '</small>'); ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <select class="form-control" id="supplier" name="supplier">
                                                <option value="">Pilih supplier</option>
                                                <?php foreach ($supplier as $data) { ?>
                                                    <option value="<?= $data['id_supplier'] ?>"><?= $data['nama_supplier'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('supplier', '<small class="text-danger pl-2">', '</small>'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="otlet">Otlet</label>
                                        <?php $adasupplier = $this->db->query("SELECT * FROM pembelian, supplier, otlet WHERE pembelian.id_supplier = supplier.id_supplier AND pembelian.id_otlet = otlet.id_otlet AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
                                        ?>
                                        <?php if ($adasupplier) :  ?>
                                            <?php foreach ($adasupplier as $ad) : ?>
                                                <input class="form-control" id="otlet" name="otlet" type="text" placeholder="Masukkan Otlet" value="<?= $ad['wilayah']; ?>" readonly />
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <select class="form-control" id="otlet" name="otlet">
                                                <option value="">Pilih Otlet</option>
                                                <?php foreach ($otlet as $data) { ?>
                                                    <option value="<?= $data['id_otlet'] ?>"><?= $data['wilayah'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('otlet', '<small class="text-danger pl-2">', '</small>'); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="barang">Barang</label>
                                        <?php $adasupplier = $this->db->query("SELECT * FROM pembelian, supplier, otlet WHERE pembelian.id_supplier = supplier.id_supplier AND pembelian.id_otlet = otlet.id_otlet AND pembelian.id_admin = '1' AND pembelian.status = 0")->result_array();
                                        ?>
                                        <?php if ($adasupplier) : ?>
                                            <?php foreach ($adasupplier as $as) : ?>
                                                <?php $barangotlet = $as['id_otlet']; ?>
                                                <?php $barangnya = $this->db->query("SELECT * FROM barang WHERE id_otlet = '$barangotlet'")->result_array() ?>
                                                <select class="form-control" id="barang" name="barang">
                                                    <option value="">Pilih Barang</option>
                                                    <?php foreach ($barangnya as $data) { ?>
                                                        <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?= form_error('supplier', '<small class="text-danger pl-2">', '</small>'); ?>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <select class="form-control" id="barang" name="barang">
                                                <option value="">Pilih Barang</option>
                                                <?php foreach ($barang as $data) { ?>
                                                    <option value="<?= $data['id_barang'] ?>"><?= $data['nama_barang'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <?= form_error('barang', '<small class="text-danger pl-2">', '</small>'); ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="qty">Qty</label>
                                        <input class="form-control" id="qty" name="qty" type="number" placeholder="Masukkan Qty" value="<?= set_value('qty') ?>" />
                                        <?= form_error('qty', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="hargasatuan">Harga Satuan</label>
                                        <input class="form-control" id="hargasatuan" name="hargasatuan" type="number" placeholder="Masukkan Harga Satuan" value="<?= set_value('hargasatuan') ?>" />
                                        <?= form_error('hargasatuan', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <label class="small mb-1" for="totalharga">Total Harga</label>
                                        <input class="form-control" id="totalharga" name="totalharga" type="number" placeholder="Masukkan Total Harga" value="<?= set_value('totalharga') ?>" />
                                        <?= form_error('totalharga', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" href="" class="btn btn-success mr-2">
                                    <span class="text">Simpan</span>
                                </button>
                                <a class="btn btn-danger" href="<?= base_url('DataPembelian'); ?>">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="container mt-4">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">
                            Data Keranjang
                            <?php if ($keranjang) : ?>
                                <div class="card-header">
                                    <div class="page-header-icon mt-2">
                                        <a class="btn btn-primary btn-sm shadow-sm" data-toggle="modal" data-target="#modalCheckout">
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
                                            <form action="<?= base_url('DataPembelian/checkout'); ?>" method="post">
                                                <input type="hidden" id="id_pembeliannya" name="id_pembeliannya" value="<?= $data['id_pembelian']; ?>">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                            <label class="small mb-1" for="metode">Pilih Metode Pembayaran</label>
                                                            <select class="form-control" id="metode" name="metode">
                                                                <option value="1">Cash</option>
                                                                <option value="2">Hutang</option>
                                                            </select>
                                                            <?= form_error('metode', '<small class="text-danger pl-2">', '</small>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Lanjut</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <footer class="footer mt-auto footer-light">
        <?php $this->load->view('_partials/footer.php') ?>
    </footer>
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
        $(document).ready(function() {
            $('#otlet').change(function() {
                var id_otlet = $(this).val();
                console.log(id_otlet);
                $.ajax({
                    url: "<?= base_url(); ?>DataPembelian/getBarang",
                    method: "POST",
                    data: {
                        id_otlet: id_otlet
                    },
                    async: false,
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var html = '';
                        for (i = 0; i < data.length; i++) {
                            html += '<option value="' + data[i].id_barang + '">' + data[i].nama_barang + '</option>';
                        }
                        $('#barang').html(html);
                        console.log(html);
                    }
                });
            });
        });
    </script>
</body>

</html>