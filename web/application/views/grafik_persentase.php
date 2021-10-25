<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_partials/head.php') ?>

<body class="nav-fixed">
    <?php $this->load->view('_partials/header.php') ?>
    <div id="layoutSidenav">
        <?php $this->load->view('_partials/sidebar.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon">
                                            <i data-feather="bar-chart-2"></i>
                                        </div>
                                        Grafik Persentase
                                    </h1>
                                    <div class="page-header-subtitle">Persentase Status Laporan Pengaduan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-n10">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-body">
                                <h4 class="small">
                                        Masuk
                                        <!-- (status : hoax/real (menunggu)) -->
                                        <span class="float-right font-weight-bold"><?= number_format($menungguDashboard !== 0 ? $menungguDashboard / $totalDashboard * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-blue" role="progressbar" style="width: <?= number_format($menungguDashboard !== 0 ? $menungguDashboard / $totalDashboard * 100 : 0) ?>%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Menunggu
                                        <!--  (status : disposisi + tindak lanjut) -->
                                        <span class="float-right font-weight-bold"> <?= number_format(($real + $prosesDashboard + $konfirmasiDashboard) !== 0 ? ($real + $prosesDashboard + $konfirmasiDashboard) / $totalDashboard * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= number_format(($real + $prosesDashboard + $konfirmasiDashboard) !== 0 ? ($real + $prosesDashboard + $konfirmasiDashboard) / $totalDashboard * 100 : 0) ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Selesai
                                        <!--  (statuse : online) -->
                                        <span class="float-right font-weight-bold"><?= number_format($selesaiDashboard !== 0 ? $selesaiDashboard / $totalDashboard * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= number_format($selesaiDashboard !== 0 ? $selesaiDashboard / $totalDashboard * 100 : 0) ?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
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
    <?php $this->load->view('_partials/js.php') ?>
</body>

</html>