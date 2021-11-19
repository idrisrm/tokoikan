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
                                        <div class="page-header-icon mt-2">
                                            <a href="javascript:history.go(-1)">
                                                <i data-feather="arrow-left" class="text-black mr-3"></i>
                                            </a>
                                            <i data-feather="file-text"></i>
                                        </div>
                                        Detail Pengajuan Revisi Transaksi
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-4">
                    <nav class="nav nav-borders">
                        <a class="nav-link active" href="">Detail Pengajuan Revisi Transaksi</a>
                    </nav>

                    <hr class="mt-0 mb-4" />
                    <div class="card card-header-actions mx-auto mb-4">
                        <div class="card-header">Detail Pengajuan Revisi Transaksi</div>
                        <div class="col">
                            <?php echo $this->session->flashdata('pesan') ?>
                        </div>
                        <div class="card-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 20px;">No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($detail as $data) { ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $data['nama_barang'] ?></td>
                                                <td><?= $data['qty'] ?> <?= $data['satuan']?></td>
                                                <td>Rp. <?= number_format($data['total_harga'], 0, ",", ".") ?></td>
                                            </tr>
                                        <?php $i++;
                                        } ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="tambahModalLabel">Konfirmasi</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Apakah Anda yakin Ingin Mengkonfirmasi Pengajuan Ini?</div>
                                            <div class="modal-footer">
                                                <a class="btn btn-primary" href="<?= base_url('RevisiTransaksi/konfirmasi/' . $id['id_penjualan']) ?>">Konfirmasi</a>
                                                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
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
                                                <div class="modal-body">Apakah Anda yakin Ingin Mengkonfirmasi Pengajuan Ini?</div>
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
                            <!-- <div class="sbp-preview">
                                <div class="sbp-preview-content">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <label>NO KTP</label>
                                            <p><b><?= $hutang['no_ktp'] ?></b></p>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label>Nama Calon Penghutang</label>
                                            <p><b><?= $hutang['nama_penghutang'] ?></b></p>
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <label>Otlet</label>
                                            <p><b><?= $hutang['wilayah'] ?></b></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label>Foto Pengaduan</label>
                                            <div>
                                                <img class="img-fluid mb-2" style="width: 600px;" src="<?= base_url($hutang['foto_ktp']) ?>" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tambahModalLabel">Konfirmasi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda Yakin Ingin Mengkonfirmasi Pengajuan Ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                                            <a href="<?= base_url('DataPenghutang/konfirmasi/' . $hutang['no_ktp']) ?>" class="btn btn-primary">Simpan</a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->


                            <button class="btn btn-success mr-2 mt-2" href="onclick=" confirm_modal() data-toggle="modal" data-target="#modalTambah">
                                <span class="text">Konfirmasi</span>
                            </button>

                        </div>
                    </div>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>

            <!-- <div class="modal fade" id="modalTambahKomentar" tabindex="-1" role="dialog" aria-labelledby="tambahKomentarModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="<?= base_url("Pengaduan/tolakdata") ?>" method="post">
                    <?php foreach ($data as $d) { ?>
                        <input class="form-control" id="id_pengaduan" name="id_pengaduan" value="<?= $d['id_pengaduan'] ?>" disable hidden />
                        <input class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $d['id_pelapor'] ?>" disable hidden />
                        <input class="form-control" id="judul" name="judul" value="<?= $d['judul'] ?>" disable hidden />
                        <input class="form-control" id="deskripsi" name="deskripsi" value="<?= $d['deskripsi'] ?>" disable hidden />
                        <input class="form-control" id="alamat" name="alamat" value="<?= $d['alamat'] ?>" disable  hidden/>
                        <input class="form-control" id="id_kecamatan" name="id_kecamatan" value="<?= $d['id_kecamatan'] ?>" disable  hidden/>
                        <input class="form-control" id="id_kelurahan" name="id_kelurahan" value="<?= $d['id_kelurahan'] ?>" disable  hidden/>
                        <input class="form-control" id="langitude" name="langitude" value="<?= $d['langitude'] ?>" disable hidden />
                        <input class="form-control" id="longitude" name="longitude" value="<?= $d['longitude'] ?>" disable hidden />
                        <input class="form-control" id="tgl_pengaduan" name="tgl_pengaduan" value="<?= $d['tgl_pengaduan'] ?>" disable hidden />
                        <input class="form-control" id="jam_pengaduan" name="jam_pengaduan" value="<?= $d['jam_pengaduan'] ?>" disable hidden />
                        <input class="form-control" id="id_opd" name="id_opd" value="<?= $d['id_opd'] ?>" disable hidden />
                        <input class="form-control" id="id_kategori" name="id_kategori" value="<?= $d['id_kategori'] ?>" disable  hidden/>
                        <input class="form-control" id="foto" name="foto" value="<?= $d['foto'] ?>" disable hidden />
                        <input class="form-control" id="id_pengaduan" name="id_pengaduan" value="<?= $d['id_pengaduan'] ?>" disable hidden />
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahKomentarModalLabel">Tolak Pengaduan</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="small mb-1" for="nama_kecamatan">Alasan Penolakan Pengaduan</label>
                                    <input class="form-control" id="alasan_penolakan" name="alasan_penolakan" type="text" placeholder="Masukkan Alasan Penolakan Pengaduan" />
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                       
                    <?php } ?>
                    </form>
                </div>
            </div> -->

        </div>
    </div>
    <?php $this->load->view("_partials/js.php") ?>
    <script>
        $(document).ready(function() {
            var idKey, datakey;
            datakey = $("#id_kategori").val()
            $("#opd").select2({
                data: get(datakey)
            });

            $("#kategori_pengaduan").select2({
                data: getData()
            }).on('change', function(e) {
                idKey = $("#kategori_pengaduan").val();
                console.log(idKey);
                $("#opd").select2({
                    data: getOPD(idKey)
                });
            });
        });

        function getData() {
            $.ajax({
                url: "<?php echo base_url() . "Pengaduan/getKategori" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih Kategori " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_kategori + '">' + data[i].nm_kategori + '</option>';
                    }
                    $('#kategori_pengaduan').html(html);
                },
            });
        }

        function get(datakey) {
            $.ajax({
                url: "<?= base_url(); ?>Pengaduan/getOPD",
                method: "POST",
                data: {
                    id_kategori: datakey
                },
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih OPD " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_opd + '">' + data[i].nm_opd + '</option>';
                    }
                    $('#opd').html(html);
                    console.log("ini", html)
                }
            });
        }

        function getOPD(idKey) {
            $.ajax({
                url: "<?= base_url(); ?>Pengaduan/getOPDterkait",
                method: "POST",
                data: {
                    id_opd: idKey
                },
                async: false,
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih OPD " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_opd + '">' + data[i].nm_opd + '</option>';
                    }
                    $('#opd').html(html);
                    console.log("ini", html)
                }
            });
        }
    </script>
</body>

</html>