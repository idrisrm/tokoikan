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
                                        Data Detail Pembelian
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">
                            <p>Data Detail Pembelian</p>
                        </div>
                        <div class="col">
                            <div id="pesan">
                                <?php echo $this->session->flashdata('pesan') ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">No</th>
                                            <th>No. Invoice</th>
                                            <th>Tanggal</th>
                                            <th>Otlet</th>
                                            <th>Barang</th>
                                            <th>Total Harga</th>
                                            <th>Kekurangan Piutang</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="hasil_supplier">
                                        <?php $i = 1;
                                        foreach ($pembelian as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['id_pembelian']; ?></td>
                                                <td><?= $data['created_at'] ?></td>
                                                <td><?= $data['wilayah'] ?></td>
                                                <td>
                                                    <?php
                                                    $id = $data['id_pembelian'];
                                                    $barang = $this->db->query("SELECT detail_pembelian.*, barang.nama_barang FROM detail_pembelian, barang WHERE detail_pembelian.id_pembelian = '$id' AND detail_pembelian.id_barang = barang.id_barang")->result_array();
                                                    ?>
                                                    <?php foreach ($barang as $b) : ?>
                                                        <table>
                                                            <td><?= $b['nama_barang']; ?> x <?= $b['qty']; ?> <br> Harga satuan : Rp.<?= number_format($b['harga_satuan'], 0, ",", ".") ?> </td>
                                                        </table>
                                                    <?php endforeach; ?>
                                                </td>
                                                <td>Rp.<?= number_format($data['subtotal'], 0, ",", ".") ?></td>
                                                <td>
                                                    <?php
                                                    $id = $data['id_pembelian'];
                                                    $bayar = $this->db->query("SELECT SUM(bayar) as bayar FROM bayar_hutang_admin WHERE id_pembelian = '$id'")->row_array();
                                                    ?>
                                                    <?php if ($bayar['bayar'] == null) : ?>
                                                        -
                                                    <?php else : ?>
                                                        Rp.<?= number_format($data['subtotal'] - $bayar['bayar'], 0, ",", ".") ?>
                                                    <?php endif; ?>
                                                </td>
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
                                                    <?php if ($data['status'] == 1) : ?>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" id="lunasmodal" data-id="<?= $data['id_pembelian']; ?>" data-toggle="modal" data-target="#modalLunas">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    <?php else : ?>
                                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" id="bayarmodal" data-toggle="modal" data-target="#modalBayar" data-id="<?= $data['id_pembelian']; ?>" data-total="<?= $data['subtotal']; ?>">
                                                            <i data-feather="eye"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div>
                    <div class="modal fade" id="modalLunas" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Data Pembelian</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Data dengan no. invoice <span id="idnya2"></span> kepada supplier <?= $data['nama_supplier']; ?> telah terbayar <span style="color: green;">LUNAS</span>
                                </div>
                                <p style="margin-left: 10px;">Berikut ini adalah detail pembayaran piutang</p>
                                <div style="margin: 10px;">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal</th>
                                                <th>Jumlah bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bayarhutanglunas">
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modalBayar" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Bayar Piutang</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <form action="<?= base_url('DataPembelian/bayar'); ?>" method="post">
                                    <div class="modal-body">
                                        <span hidden id="idnya"><?= $data['id_pembelian']; ?></span>
                                        <input type="hidden" id="supplier" name="supplier" value="<?= $data['id_supplier']; ?>">
                                        <input type="hidden" id="pembelian" name="pembelian" value="">
                                        <input type="hidden" id="total" name="total" value="">
                                        <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                            <label class="small mb-1" for="bayar">Input jumlah Pembayaran</label>
                                            <input class="form-control" id="bayar" name="bayar" type="text" placeholder="Masukkan Harga Satuan" required />
                                        </div>
                                        <p style="margin-left: 10px;">Berikut ini adalah detail pembayaran piutang</p>
                                        <div style="margin: 10px;">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Tanggal</th>
                                                        <th>Jumlah bayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bayarhutangbelum">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                        <button class="btn btn-primary" type="submit">Yakin</a>
                                    </div>
                                </form>
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
        $(document).on("click", "#bayarmodal", function() {
            var id_pembelian = $(this).data('id');
            var total = $(this).data('total');
            var span = document.getElementById('idnya');
            document.getElementById('total').value = total;
            document.getElementById('pembelian').value = id_pembelian;
            while (span.firstChild) {
                span.removeChild(span.firstChild);
            }
            span.appendChild(document.createTextNode(id_pembelian));
            $.ajax({
                type: "POST",
                url: "<?= base_url('DataPembelian/databayar'); ?>",
                data: {
                    'id': id_pembelian,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var baris = '';

                    for (var i = 0; i < data.length; i++) {
                        baris +=
                            '<tr>' +
                            '<td> ' + (i + 1) + ' </td>' +
                            '<td> ' + data[i].created_at + ' </td>' +
                            '<td> ' + 'Rp.' + number_format(data[i].bayar, 0, ",", ".") + ' </td>' +
                            '</tr>'

                    }

                    $('#bayarhutangbelum').html(baris)
                },
            });
        });
        $(document).on("click", "#lunasmodal", function() {
            var id_pembelian = $(this).data('id');
            var span2 = document.getElementById('idnya2');

            while (span2.firstChild) {
                span2.removeChild(span2.firstChild);
            }
            span2.appendChild(document.createTextNode(id_pembelian));
            $.ajax({
                type: "POST",
                url: "<?= base_url('DataPembelian/databayar'); ?>",
                data: {
                    'id': id_pembelian,
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var baris = '';

                    for (var i = 0; i < data.length; i++) {
                        baris +=
                            '<tr>' +
                            '<td> ' + (i + 1) + ' </td>' +
                            '<td> ' + data[i].created_at + ' </td>' +
                            '<td> ' + 'Rp.' + number_format(data[i].bayar, 0, ",", ".") + ' </td>' +
                            '</tr>'

                    }

                    $('#bayarhutanglunas').html(baris)
                },
            });
        });
    </script>
</body>

</html>