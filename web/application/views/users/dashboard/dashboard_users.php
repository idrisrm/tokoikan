<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('_partials/head.php') ?>

<body class="nav-fixed">
    <?php $this->load->view('_partials/header.php') ?>
    <div id="layoutSidenav">
        <?php $this->load->view('_partials/sidebar_users.php') ?>
        <div id="layoutSidenav_content">
            <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                    <div class="container">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon">
                                            <i data-feather="activity"></i>
                                        </div>
                                        Dashboard
                                    </h1>
                                    <div class="page-header-subtitle">Dashboard Grafik Pengaduan</div>
                                </div>
                                <!-- <div class="col-12 col-xl-auto mt-4">
                                    <button class="btn btn-white p-3" id="reportrange">
                                        <i class="mr-2 text-primary" data-feather="calendar"></i>
                                        <span></span>
                                        <i class="ml-1" data-feather="chevron-down"></i>
                                    </button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-n10">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-6" hidden>
                            <div class="card bg-blue text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Total Pengaduan</div>
                                            <div class="text-lg font-weight-bold"><?= $total ?></div>
                                            <input class="form-control" id="proses" name="proses" type="text" value="<?= $proses ?>" hidden />
                                            <input class="form-control" id="selesai" name="selesai" type="text" value="<?= $selesai ?>" hidden />
                                            <input class="form-control" id="tindak" name="tindak" type="text" value="<?= $konfirmasi ?>" hidden />
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="file-text"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Pengaduan Diproses</div>
                                            <div class="text-lg font-weight-bold"><?= $proses ?></div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('PengaduanOPD/data_proses') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Tindak Lanjut</div>
                                            <div class="text-lg font-weight-bold"><?= $konfirmasi ?></div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('PengaduanOPD/data_tindak_lanjut') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Pengaduan Selesai</div>
                                            <div class="text-lg font-weight-bold"><?= $selesai ?></div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('PengaduanOPD/data_selesai') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Progres Pengaduan Berdasarkan Status
                                </div>
                                <div class="card-body">
                                    <h4 class="small">
                                        Proses
                                        <span class="float-right font-weight-bold"><?= number_format($proses != 0 ? $proses / $total * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= number_format($proses != 0 ? $proses / $total * 100 : 0) ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Tindak Lanjut
                                        <span class="float-right font-weight-bold"><?= number_format($konfirmasi != 0 ? $konfirmasi / $total * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= number_format($konfirmasi != 0 ? $konfirmasi / $total * 100 : 0) ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small">
                                        Selesai
                                        <span class="float-right font-weight-bold"><?= number_format($selesai ? $selesai / $total * 100 : 0) ?>%</span>
                                    </h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= number_format($selesai ? $selesai / $total * 100 : 0) ?>%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Grafik Total Pengaduan
                                </div>
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart" width="100%" height="30"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    10 Besar Kategori Pengaduan Tertinggi
                                </div>
                                <div class="col-12 card-pie">
                                    <div class="chart-pie" style="position: relative; height:280px; width:100%">
                                        <canvas class="canvas-pie" id="OPD_kategori" width="100%" height="50" style="position: relative; width: 100%; height: 360px"></canvas>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-auto mt-2">
                                    <button class="btn btn-white p-3" id="reportrange">
                                        <i class="mr-2 text-primary" data-feather="calendar"></i>
                                        <span></span>
                                        <i class="ml-1" data-feather="chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4" hidden>
                            <div class="card h-100">
                                <div class="card-header">
                                    Laporan Kategori Pengaduan
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie mb-4">
                                        <canvas id="opdSemuaKategori" width="100%" height="960"></canvas>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div class="col-2 small">
                                            <div class="row">
                                                <div class="mr-3">
                                                    <i class="fas fa-circle fa-sm mr-1 text-danger"></i>
                                                    Proses
                                                </div>
                                                <div class="font-weight-500 text-dark">100%</div>
                                            </div>
                                        </div>
                                        <div class="col-2 small">
                                            <div class="row">
                                                <div class="mr-3">
                                                    <i class="fas fa-circle fa-sm mr-1 text-warning"></i>
                                                    Proses
                                                </div>
                                                <div class="font-weight-500 text-dark">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    Grafik Pengaduan Proses-Tindak Lanjut
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie mb-4">
                                        <canvas id="opdProses_TindakLanjut" width="100%" height="960"></canvas>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-danger"></i>
                                                Proses
                                            </div>
                                            <div class="font-weight-500 text-dark"><?= number_format($proses != 0 ? $proses * 100 / ($proses + $konfirmasi) : 0) ?>%</div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-warning"></i>
                                                Tindak Lanjut
                                            </div>
                                            <div class="font-weight-500 text-dark"><?= number_format($konfirmasi != 0 ? $konfirmasi * 100 / ($proses + $konfirmasi) : 0) ?>%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4">
                            <div class="card h-100">
                                <div class="card-header">
                                    Grafik Pengaduan Tindak Lanjut-Selesai
                                </div>
                                <div class="card-body">
                                    <div class="chart-pie mb-4">
                                        <canvas id="opdTindakLanjut_Selesai" width="100%" height="960"></canvas>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-warning"></i>
                                                Tindak Lanjut
                                            </div>
                                            <div class="font-weight-500 text-dark"><?= number_format($konfirmasi != 0 ? $konfirmasi * 100 / ($konfirmasi + $selesai) : 0) ?>%</div>
                                        </div>
                                        <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                            <div class="mr-3">
                                                <i class="fas fa-circle fa-sm mr-1 text-success"></i>
                                                Selesai
                                            </div>
                                            <div class="font-weight-500 text-dark"><?= number_format($selesai != 0 ? $selesai * 100 / ($konfirmasi + $selesai) : 0) ?>%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-xl-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Grafik Pengaduan (Nama Kategori)
                                    <div class="no-caret">
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalFilterKategori">
                                            <i data-feather="filter"></i>
                                        </a>
                                        <a class="btn btn-success" id="reportrange">
                                            <i class="mr-2" data-feather="calendar"></i>
                                            <span></span>
                                            <i class="ml-1" data-feather="chevron-down"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="chartBarKategori" width="100%" height="30"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </main>
            <footer class="footer mt-auto footer-light">
                <?php $this->load->view('_partials/footer.php') ?>
            </footer>
        </div>
    </div>
    <?php $this->load->view('_partials/js.php') ?>
    <script>
        var getproses = document.getElementById("proses").value;
        var gettindak = document.getElementById("tindak").value;
        var getselesai = document.getElementById("selesai").value;

        //PROSESTINDAKLANJUT
        var totalMP1 = parseInt(getproses) + parseInt(gettindak);
        var proses = parseInt(getproses) * 100 / totalMP1;
        var tindakpersen = parseInt(gettindak) * 100 / totalMP1;
        console.log(gettindak);
        console.log(proses);
        console.log(tindakpersen);
        //END PROSESTINDAKLANJUT

        //Tindak Lanjut-Selesai
        var totalMP2 = parseInt(gettindak) + parseInt(getselesai);
        var tindak = parseInt(gettindak) * 100 / totalMP2;
        var selesai = parseInt(getselesai) * 100 / totalMP2;
        //END Tindak Lanjut-Selesai


        $(function() {
            window.base_url = <?php echo json_encode(base_url()); ?>;
            var start = moment();
            var end = moment();

            function cb(start, end) {
                $("#reportrange span").html(
                    start.format("MMMM YYYY") + " - " + end.format("MMMM YYYY")
                );
            }

            $("#reportrange").daterangepicker({
                    startDate: start,
                    endDate: end,
                    format: "MM yyyy",
                    startView: "months",
                    minViewMode: "months"
                },
                function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                cb
                window.location = window.base_url + 'Dashboard_Users/filtering?tgl_mulai=' + start.format('YYYY-MM-DD') + '&' + 'tgl_selesai=' + end.format('YYYY-MM-DD');
            });
            cb(start, end);
        });

        var ctx = document.getElementById("OPD_kategori");
        var cData2 = JSON.parse(`<?php echo $pie; ?>`);
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: cData2.name,
                datasets: [{
                    data: cData2.data,
                    backgroundColor: [
                        "#e81500", //danger
                        "#f4a100", //warning
                        "#0061f2", //blue
                        "#00ac69", //success
                        "#6900c7", //secondary
                        "#00cfd5", //info
                        "#e30059", //pink
                        "#00ba94", //teal
                        "#f76400", //orange
                        "#5800e8", //indigo
                    ]
                }]
            },
            options: {
                resizeable: true,
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false,
                },
                legend: {
                    display: false
                },
                zoomOutPercentage: 100,
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 70,
                        bottom: 30
                    }
                },
                plugins: {
                    datalabels: {
                        formatter: (value, ctx) => {
                            let sum = 0;
                            let dataArr = ctx.chart.data.datasets[0].data;
                            dataArr.map(data => {
                                sum += data;
                            });
                            let percentage = (value * 100 / sum).toFixed(2) + "%";
                            return percentage;
                        },
                        color: '#fff',
                    },
                    legend: false,
                    outlabels: {
                        text: '%l %p',
                        color: 'white',
                        stretch: 20,
                        font: {
                            resizable: true,
                            minSize: 12,
                            maxSize: 16
                        }
                    }
                },
                cutoutPercentage: 0
            }
        });

        var ctx = document.getElementById("opdSemuaKategori");
        var cData3 = JSON.parse(`<?php echo $pie; ?>`);
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: cData3.name,
                datasets: [{
                    data: cData3.data,
                    backgroundColor: [
                        "#0061f2", //blue
                        "#5800e8", //indigo
                        "#6900c7", //purple
                        "#e30059", //pink
                        "#e81500", //red
                        "#f76400", //orange
                        "#f4a100", //yellow
                        "#00ac69", //green
                        "#00ba94", //teal
                        "#00cfd5", //cyan
                        "#6c737d", //gray
                        "#363d47", //gray_dark
                        "#06794f", //primary
                        "#6900c7", //secondary
                        "#00ac69", //success
                        "#00cfd5", //info
                        "#f4a100", //warning
                        "#e81500", //danger
                        "#212832", //dark
                        "#000", //black
                        "#e81500", //red
                        "#f76400", //orange
                        "#f4a100", //yellow
                        "#00ac69", //green
                        "#00ba94", //teal
                        "#00cfd5", //cyan
                        "#0061f2", //blue
                        "#5800e8", //indigo
                        "#6900c7", //purple
                        "#e30059", //pink
                        "#0061f2", //blue
                        "#5800e8", //indigo
                        "#6900c7", //purple
                        "#e30059", //pink
                        "#e81500", //red
                        "#f76400", //orange
                        "#f4a100", //yellow
                        "#00ac69", //green
                        "#00ba94", //teal
                        "#00cfd5", //cyan
                        "#6c737d", //gray
                        "#363d47", //gray_dark
                        "#06794f", //primary
                        "#6900c7", //secondary
                        "#00ac69", //success
                        "#00cfd5", //info
                        "#f4a100", //warning
                        "#e81500", //danger
                        "#212832", //dark
                        "#000", //black
                        "#e81500", //red
                        "#f76400", //orange
                        "#f4a100", //yellow
                        "#00ac69", //green
                        "#00ba94", //teal
                        "#00cfd5", //cyan
                        "#0061f2", //blue
                        "#5800e8", //indigo
                        "#6900c7", //purple
                        "#e30059", //pink
                    ],
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 10,
                    yPadding: 10,
                    displayColors: false,
                    caretPadding: 15
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
                },
                cutoutPercentage: 50
            }
        });

        var ctx = document.getElementById("opdProses_TindakLanjut");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Proses", "Tindak Lanjut"],
                datasets: [{
                    data: [proses, tindakpersen],
                    backgroundColor: [
                        "#e81500",
                        "#f4a100"
                    ],
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 10,
                    yPadding: 10,
                    displayColors: false,
                    caretPadding: 15
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
                },
                cutoutPercentage: 50
            }
        });

        var ctx = document.getElementById("opdTindakLanjut_Selesai");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Tindak Lanjut", "Selesai"],
                datasets: [{
                    data: [tindak, selesai],
                    backgroundColor: [
                        "#f4a100",
                        "#00ac69"
                    ],
                }]
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 10,
                    yPadding: 10,
                    displayColors: false,
                    caretPadding: 15
                },
                legend: {
                    display: false
                },
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
                },
                cutoutPercentage: 50
            }
        });
        (Chart.defaults.global.defaultFontFamily = "Metropolis"),
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = "#06794f";

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + "").replace(",", "").replace(" ", "");
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
                dec = typeof dec_point === "undefined" ? "." : dec_point,
                s = "",
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return "" + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || "").length < prec) {
                s[1] = s[1] || "";
                s[1] += new Array(prec - s[1].length + 1).join("0");
            }
            return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var cData = JSON.parse(`<?php echo $chart_data; ?>`);
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: cData.label,
                datasets: [{
                    //      label: cData.label,
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                    data: cData.data,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return '' + number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + '' + number_format(tooltipItem.yLabel);
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>