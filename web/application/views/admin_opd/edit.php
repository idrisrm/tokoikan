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
                                <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                <span>Edit Data Admin OPD</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <div class="card mb-4">
                        <div class="card-header">Edit Data Admin Organisasi Perangkat Daerah</div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <?php foreach ($data as $d) { ?>
                                    <div class="row">
                                        <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="nama_user">Nama User</label>
                                            <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Masukkan Username OPD" value="<?= $d->nm_user ?>" />
                                            <?= form_error('nama_user', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="email_opd">Email OPD</label>
                                            <input class="form-control" id="email_opd" name="email_opd" type="text" placeholder="Masukkan Email OPD" value="<?= $d->email ?>" />
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
                                                <?php foreach ($opd as $row) { ?>
                                                    <option value="<?php echo $row['id_opd']; ?>" <?= ($d->id_opd == $row['id_opd'] ? 'selected' : '') ?>>
                                                        <?php echo $row['nm_opd']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-xxl-6 col-xl-6 col-md-6 col-sm-12">
                                            <label class="small mb-1" for="telp">Nomor Telepon</label>
                                            <input class="form-control" id="telp" name="telp" type="text" value="<?= $d->telepon ?>" />
                                            <input class="form-control" id="level" name="level" type="text" value="<?= $d->level ?>" hidden />
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
                                            <img src="" id="preview_foto" name="preview_foto" style="width:200px" />
                                        </div>
                                    </div>
                                <?php } ?>
                                <button type="submit" href="<?= base_url('AdminOPD/tambah') ?>" class="btn btn-success mr-2">
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
            var list_opd = [

            ];
            $("#opd").select2({
                data: list_opd
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
    </script>
</body>

</html>