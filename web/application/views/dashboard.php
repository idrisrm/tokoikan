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
                                            <i data-feather="activity"></i>
                                        </div>
                                        Dashboard
                                    </h1>
                                    <div class="page-header-subtitle">Dashboard Grafik Penjualan</div>
                                </div>
                                <!-- <div class="col-12 col-xl-auto">
                                    <div class="card bg-white text-black mb-4">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="mr-3">
                                                    <div class="text-black-75 small">Total Pengaduan</div>
                                                    <div class="text-lg font-weight-bold">100</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-n10">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Pengajuan Hutang</div>
                                            <div class="text-lg font-weight-bold"><?= $pengajuan ?></div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('DataPenghutang/PengajuanHutang') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Pengajuan Revisi Transaksi</div>
                                            <div class="text-lg font-weight-bold"><?= $revisi ?></div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('RevisiTransaksi/index') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xxl-3 col-lg-6">
                            <div class="card bg-blue text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small"></div>
                                            <div class="text-lg font-weight-bold">10</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('Pengaduan/data_tindak_lanjut') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="mr-3">
                                            <div class="text-white-75 small">Pengaduan Selesai</div>
                                            <div class="text-lg font-weight-bold">10</div>
                                        </div>
                                        <i class="feather-xl text-white-50" data-feather="activity"></i>
                                    </div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="<?= base_url('Pengaduan/data_selesai') ?>">Lihat Detail</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                Omset Penjualan Daerah Jember
                                    <!-- <div class="no-caret">
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalFilterDinas">
                                            <i data-feather="filter"></i>
                                        </a>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="GrafikJember" width="100%" height="30"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                    Omset Penjualan Daerah Situbondo
                                    <!-- <div class="no-caret">
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalFilterDinas">
                                            <i data-feather="filter"></i>
                                        </a>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="GrafikSitubondo" width="100%" height="30"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions h-100">
                                <div class="card-header">
                                Omset Penjualan Daerah Bali
                                    <!-- <div class="no-caret">
                                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalFilterDinas">
                                            <i data-feather="filter"></i>
                                        </a>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="chart-bar">
                                        <canvas id="GrafikBali" width="100%" height="30"></canvas>
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

    <script>
        var ctx = document.getElementById("GrafikJember");
        var cData = JSON.parse(`<?php echo $grafikjember; ?>`);
        // console.log(cData.jumlah);
        var myBarChart = new Chart(ctx, {
            type: "bar",
            data: {
                // labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                labels: cData.bulan,
                datasets: [{
                    label: "",
                    backgroundColor: "rgba(6, 121, 79, 1)",
                    hoverBackgroundColor: "rgba(6, 121, 79, 0.9)",
                    borderColor: "rgba(6, 121, 79, 1)",
                    // data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 5000]
                    data: cData.jumlah
                }]
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
                            unit: "month"
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 400000000,
                            maxTicksLimit: 6,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + number_format(tooltipItem.yLabel);
                        }
                    }
                },
                plugins: {
                    datalabels: false
                }
            }
        });



        var ctx2 = document.getElementById("GrafikSitubondo");
        var cData2 = JSON.parse(`<?php echo $grafiksitubondo; ?>`);
        var myBarChart = new Chart(ctx2, {
            type: "bar",
            data: {
                // labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                labels: cData2.bulan,
                datasets: [{
                    label: "",
                    backgroundColor: "rgba(6, 121, 79, 1)",
                    hoverBackgroundColor: "rgba(6, 121, 79, 0.9)",
                    borderColor: "rgba(6, 121, 79, 1)",
                    // data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 5000]
                    data: cData2.jumlah
                }]
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
                            unit: "month"
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 400000000,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + number_format(tooltipItem.yLabel);
                        }
                    }
                },
                plugins: {
                    datalabels: false
                }
            }
        });



        var ctx3 = document.getElementById("GrafikBali");
        var cData3 = JSON.parse(`<?php echo $grafikbali; ?>`);
        var myBarChart = new Chart(ctx3, {
            type: "bar",
            data: {
                // labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
                labels: cData3.bulan,
                datasets: [{
                    label: "",
                    backgroundColor: "rgba(6, 121, 79, 1)",
                    hoverBackgroundColor: "rgba(6, 121, 79, 0.9)",
                    borderColor: "rgba(6, 121, 79, 1)",
                    // data: [100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1100, 5000]
                    data: cData3.jumlah
                }]
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
                            unit: "month"
                        },
                        gridLines: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 12
                        },
                        maxBarThickness: 25
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: 400000000,
                            maxTicksLimit: 5,
                            padding: 10,
                            // Include a dollar sign in the ticks
                            callback: function(value, index, values) {
                                return number_format(value);
                            }
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        }
                    }]
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: "#6e707e",
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: "#dddfeb",
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel =
                                chart.datasets[tooltipItem.datasetIndex].label || "";
                            return datasetLabel + number_format(tooltipItem.yLabel);
                        }
                    }
                },
                plugins: {
                    datalabels: false
                }
            }
        });
    </script>

    <!-- <script>
        $(document).ready(function() {
            $('#tabel_kategori_tertinggi').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });
        $(document).ready(function() {
            $('#tabel_opd_tertinggi').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
        });

        var getmenunggu = document.getElementById("wait").value;
        var getproses = document.getElementById("proses").value;
        var gettindak = document.getElementById("tindak").value;
        var getselesai = document.getElementById("selesai").value;
        var gettolak = document.getElementById("tolak").value;
        var getreal = document.getElementById("real").value;
         var getreal2 = document.getElementById("real1").value;
        //MENUNGGU PROSES
        var totalMP = parseInt(getmenunggu) + parseInt(getproses);
        var menunggupersen = parseInt(getmenunggu) * 100 / totalMP;
        var prosespersen = parseInt(getproses) * 100 / totalMP;
        //END MENUNGGU PROSES

       //PROSESTINDAKLANJUT
        var totalMP1 = parseInt(getproses) + parseInt(gettindak);
        var proses = parseInt(getproses) * 100 / totalMP1;
        var tindakpersen = parseInt(gettindak) * 100 / totalMP1;
        //END PROSESTINDAKLANJUT

        //Tindak Lanjut-Selesai
        var totalMP2 = parseInt(getreal) + parseInt(getselesai);
        var tindak = parseInt(getreal) * 100 / totalMP2; // ini data real
        var selesai = parseInt(getselesai) * 100 / totalMP2;
        //END Tindak Lanjut-Selesai

        //kominfoMenunggu_Ditolak
        var totalMP3 = parseInt(getmenunggu) + parseInt(gettolak);
        var wait = parseInt(getmenunggu) * 100 / totalMP3;
        var cancel = parseInt(gettolak) * 100 / totalMP3;
        //END kominfoMenunggu_Ditolak

        //MENUNGGU PROSES
        var totalMP4 = parseInt(gettolak) + parseInt(getreal);
        var tolakpersen = parseInt(gettolak) * 100 / totalMP4;
        var realpersen = parseInt(getreal) * 100 / totalMP4;
        //END MENUNGGU PROSES

        // Belum Filter
        var totalMP5 = parseInt(getproses) + parseInt(getreal2);
        var belumfilter = parseInt(getproses) * 100 / totalMP5;
        var sudahfilter = parseInt(getreal2) * 100 / totalMP5;
        //END MENUNGGU PROSES

        $(function() {
            window.base_url = <?php echo json_encode(base_url()); ?>;
            console.log(base_url)
            var start = moment();
            var end = moment();
            var tgl;

            function cb(start, end) {
                $("#filter_tgl_kategori span").html(
                    start.format("MMMM YYYY") + " - " + end.format("MMMM YYYY")
                );
                // 
            }

            $("#filter_tgl_kategori").daterangepicker({
                startDate: start,
                endDate: end,
                format: "MM yyyy",
                startView: "months",
                minViewMode: "months"
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                cb
                window.location = window.base_url + 'Dashboard/filtering?tgl_mulai=' + start.format('YYYY-MM-DD') + '&' + 'tgl_selesai=' + end.format('YYYY-MM-DD');
            });
            // cb(start, end);

        });

        $(function() {
            window.base_url = <?php echo json_encode(base_url()); ?>;
            console.log(base_url)
            var start = moment();
            var end = moment();
            var tgl;

            function cb(start, end) {
                $("#filter_tgl_opd span").html(
                    start.format("MMMM YYYY") + " - " + end.format("MMMM YYYY")
                );
                // 
            }

            $("#filter_tgl_opd").daterangepicker({
                startDate: start,
                endDate: end,
                format: "MM yyyy",
                startView: "months",
                minViewMode: "months"
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                cb
                window.location = window.base_url + 'Dashboard/filtering?tgl_mulai=' + start.format('YYYY-MM-DD') + '&' + 'tgl_selesai=' + end.format('YYYY-MM-DD');
            });
            // cb(start, end);

        });

        var ctx = document.getElementById("Kominfo_kategori");
        var cData1 = JSON.parse(`<?php echo $pie; ?>`);
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: cData1.name,
                datasets: [{
                    data: cData1.data,
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
                        bottom: 50
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
                        stretch: 15,
                        font: {
                            resizable: true,
                            minSize: 12,
                            maxSize: 16
                        }
                    }
                },
                // animation: {
                //     duration: 0
                // },
                // hover: {
                //     animationDuration: 0
                // },
                // responsiveAnimationDuration: 0,
                cutoutPercentage: 0
            }
        });

        var ctx = document.getElementById("opd");
        var cData2 = JSON.parse(`<?php echo $opd_data; ?>`);
        console.log(`<?php echo $opd_data; ?>`)
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: cData2.name,
                datasets: [{
                    data: cData2.data,
                    backgroundColor: [
                        "#5800e8", //indigo
                        "#00ba94", //teal
                        "#00cfd5", //info
                        "#00ac69", //success
                        "#f4a100", //warning
                        "#f76400", //orange
                        "#e30059", //pink
                        "#6900c7", //secondary
                        "#0061f2", //blue
                        "#e81500", //danger
                    ]
                }]
            },
            options: {
                resizable: true,
                responsive: true,
                maintainAspectRatio: false,
                tooltips: {
                    enabled: false,
                },
                legend: {
                    display: false
                },
                zoomOutPercentage: 55,
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 70,
                        bottom: 50
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
                // animation: {
                //     duration: 0
                // },
                // hover: {
                //     animationDuration: 0
                // },
                // responsiveAnimationDuration: 0,
                cutoutPercentage: 0
            }
        });

        var ctx = document.getElementById("kominfoReal_Hoax");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Data Real", "Data Hoax"],
                datasets: [{
                    data: [realpersen, tolakpersen],
                    backgroundColor: [
                        "#00cfd5",
                        "#5800e8"
                    ],
                    hoverBackgroundColor: [
                        "#00cfd5",
                        "#5800e8"
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)"
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
                    datalabels: false
                },
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
                },
                cutoutPercentage: 50
            }
        });

        var ctx = document.getElementById("kominfoReal_Diproses");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Sudah", "Belum"],
                datasets: [{
                    data: [belumfilter, sudahfilter],
                    backgroundColor: [
                        "#f4a100",
                        "#e81500",
                    ],
                    hoverBackgroundColor: [
                        "#f4a100",
                        "#e81500",
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)"
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
                    datalabels: false
                },
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
                },
                cutoutPercentage: 50
            }
        });

        var ctx = document.getElementById("opdDiproses_TindakLanjut");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Sudah", "Belum"],
                datasets: [{
                    data: [tindakpersen, proses],
                    backgroundColor: [
                        "#0061f2",
                        "#f4a100",
                    ],
                    hoverBackgroundColor: [
                        "#0061f2",
                        "#f4a100",
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)"
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

        var ctx = document.getElementById("kominfoReal_Selesai");
        var myPieChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: ["Data Real", "Selesai"],
                datasets: [{
                    data: [tindak, selesai],
                    backgroundColor: [
                        "#00cfd5",
                        "#00ac69"
                    ],
                    hoverBackgroundColor: [
                        "#00cfd5",
                        "#00ac69"
                    ],
                    hoverBorderColor: "rgba(234, 236, 244, 1)"
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

        // var ctx = document.getElementById("kominfoMenunggu_Ditolak");
        // var myPieChart = new Chart(ctx, {
        //     type: "doughnut",
        //     data: {
        //         labels: ["Menunggu", "Ditolak"],
        //         datasets: [{
        //             data: [wait, cancel],
        //             backgroundColor: [
        //                 "#e81500",
        //                 "#00cfd5"
        //             ],
        //             hoverBackgroundColor: [
        //                 "#e81500",
        //                 "#00cfd5"
        //             ],
        //             hoverBorderColor: "rgba(234, 236, 244, 1)"
        //         }]
        //     },
        //     options: {
        //         maintainAspectRatio: false,
        //         tooltips: {
        //             backgroundColor: "rgb(255,255,255)",
        //             bodyFontColor: "#858796",
        //             borderColor: "#dddfeb",
        //             borderWidth: 1,
        //             xPadding: 10,
        //             yPadding: 10,
        //             displayColors: false,
        //             caretPadding: 15
        //         },
        //         legend: {
        //             display: false
        //         },
        //         plugins: {
        //             datalabels: false,
        //             legend: false,
        //             outlabels: false
        //         },
        //         cutoutPercentage: 50
        //     }
        // });

        // Set new default font family and font color to mimic Bootstrap's default styling
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
                    backgroundColor: "rgba(6, 121, 79, 0.05)",
                    borderColor: "rgba(6, 121, 79, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(6, 121, 79, 1)",
                    pointBorderColor: "rgba(6, 121, 79, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(6, 121, 79, 1)",
                    pointHoverBorderColor: "rgba(6, 121, 79, 1)",
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
                plugins: {
                    datalabels: false,
                    legend: false,
                    outlabels: false
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
    </script> -->
</body>

</html>