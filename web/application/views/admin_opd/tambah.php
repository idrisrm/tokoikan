<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("_partials/head.php") ?>
<!-- <?php $this->load->view("_partials/modal/simpan.php") ?> -->

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
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                <span>Tambah Admin OPD Baru</span>
                            </h1>
                        </div>
                    </div>

                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Tambah Admin Organisasi Perangkat Daerah Baru</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="nama_user">Nama User</label>
                                        <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Masukkan Email OPD" />
                                        <?= form_error('nama_user', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="email_opd">Email OPD</label>
                                        <input class="form-control" id="email_opd" name="email_opd" type="text" placeholder="Masukkan Email OPD" />
                                        <?= form_error('email_opd', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="pass1">Password</label>
                                        <input class="form-control" id="pass1" name="pass1" type="password" placeholder="Masukkan Password" />
                                        <?= form_error('pass1', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="pass2">Konfirmasi Password</label>
                                        <input class="form-control" id="pass2" name="pass2" type="password" placeholder="Konfirmasi Password" />
                                        <?= form_error('pass2', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="opd">OPD</label>
                                        <select class="form-control" id="opd" name="opd">
                                            <option value="" selected hidden>Pilih OPD</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="telp">Nomor Telepon</label>
                                        <input class="form-control" id="telp" name="telp" type="text" placeholder="Masukkan Nomor Telepon" />
                                        <?= form_error('telp', '<small class="text-danger pl-2">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="foto">Logo OPD</label>
                                        <input class="form-control" id="foto" name="foto" type="file" />
                                    </div>
                                    <div class="form-group col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <label class="small mb-1" for="preview_foto">Preview Logo OPD</label>
                                        <br>
                                        <img src="" id="preview_foto" style="width:200px" />
                                    </div>
                                </div>
                                <button type="submit" href="" class="btn btn-success mr-2">
                                    <span class="text">Simpan</span>
                                </button>
                                <a class="btn btn-danger" href="javascript:history.go(-1)">
                                    Batal
                                </a>
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
        $(document).ready(function() {
            $("#opd").select2({
                data: getData()
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#preview_foto').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#foto").change(function() {
            readURL(this);
        });


        function getData() {
            $.ajax({
                url: "<?php echo base_url() . "AdminOPD/get_opd" ?>",
                dataType: "json",
                success: function(data) {
                    var html = '<option value="">' + " Pilih OPD " + '</option>';
                    var no = 1;
                    for (var i = 0; i < data.length; i++) {
                        html += '<option value="' + data[i].id_opd + '">' + data[i].nm_opd + '</option>';
                    }

                    $('#opd').html(html);

                },
            });
        }
    </script>

</body>

</html>