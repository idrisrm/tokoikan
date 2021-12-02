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
                                        Data Pembelian
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">Data Pembelian
                            <div class="no-caret">
                                <div class="page-header-icon mt-2 ml-2">
                                    <?php foreach ($keranjang as $k) : ?>
                                        <?php if ($k['total'] > 0) : ?>
                                            <a href="<?= base_url("DataPembelian/keranjang"); ?>">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                            <div style="position: absolute; right: 8px; top: 8px; width: 20px; height: 20px; line-height: 20px; text-align: center; border-radius: 50%; font-size: 10px; color: #fff; background-color: #f53302;"><?= $k['total']; ?></div>
                                        <?php else : ?>
                                            <a href="<?= base_url("DataPembelian/keranjang"); ?>">
                                                <i data-feather="shopping-cart"></i>
                                            </a>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <a class="btn btn-primary btn-sm shadow-sm" href="<?= base_url('DataPembelian/tambah') ?>">
                                Tambah Pembelian
                            </a>
                            <!-- <select class="col-lg-2 col-md-6 col-sm-6 form-control" id="supplier" name="supplier">
                                <option value="">Pilih Supplier</option>
                                <?php foreach ($supplier as $s) : ?>
                                    <option value="<?= $s['id_supplier']; ?>"><?= $s['nama_supplier']; ?></option>
                                <?php endforeach; ?>
                            </select> -->
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
                                            <th>Tanggal</th>
                                            <th>Total Harga</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($pembelian as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['created_at'] ?></td>
                                                <td>Rp. <?= number_format($data['subtotal'], 0, ",", ".") ?></td>
                                                <?php if ($data['status'] == 1) : ?>
                                                    <td>
                                                        <p style="color: green">Sudah terbayar</p>
                                                    </td>
                                                <?php else : ?>
                                                    <td>
                                                        <p style="color: red;">Belum terbayar</p>
                                                    </td>
                                                <?php endif; ?>
                                                <td>
                                                    <a class="btn btn-datatable btn-icon btn-transparent-dark" href="#">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="<?= base_url("LaporanPenjualan/jember") ?>" method="post">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="tambahModalLabel">Laporan Penjualan Wilayah Jember</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="daritanggal">Dari Tanggal</label>
                                                        <input class="form-control" id="daritanggal" name="daritanggal" type="date" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="sampaitanggal">Sampai Tanggal</label>
                                                        <input class="form-control" id="sampaitanggal" name="sampaitanggal" type="date" placeholder="Masukkan Nama Kategori" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="metode">Metode Pembayaran</label>
                                                        <select class="form-control" id="metode" name="metode" required>
                                                            <option value="">--Pilih Metode Pembayaran--</option>
                                                            <option value="1">Cash</option>
                                                            <option value="2">Hutang</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="aksi">Setelah Export</label>
                                                        <select class="form-control" id="aksi" name="aksi" required>
                                                            <option value="">--Pilih Aksi--</option>
                                                            <option value="1">Jangan Dihapus</option>
                                                            <option value="2">Hapus</option>
                                                        </select>
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

                            </div>
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
            $("#supplier").select2({
                data: getData()
            }).on('change', function(e) {
                idKey = $("#supplier").val();
                console.log(idKey)
            });
        });

        function getData() {
            $.ajax({
                url: "<?php echo base_url() . "DataPembelian/index" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Supplier " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_supplier + '">' + data[i].nama_supplier + '</option>';
                    }

                    $('#supplier').html(html);

                },
            });
        }
    </script>
</body>

</html>