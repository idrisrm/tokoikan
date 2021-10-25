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
                                            <i data-feather="pie-chart"></i>
                                        </div>
                                        Grafik OPD
                                    </h1>
                                    <div class="page-header-subtitle">Grafik OPD dengan Pengaduan Tertinggi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container mt-n10">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions mx-auto">
                                <div class="card-header">
                                    Grafik 10 Besar OPD dengan Pengaduan Tertinggi
                                </div>
                                <div class="col-12 card-pie">
                                    <div class="chart-pie" style="position: relative; height:394px; width:100%">
                                        <canvas class="canvas-pie" id="grafik_kategori" width="100%" height="50" style="position: relative; width: 100%; height: 360px"></canvas>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-auto">
                                    <button class="btn btn-white p-3" id="filter_tgl_opd">
                                        <i class="mr-2 text-primary" data-feather="calendar"></i>
                                        <span></span>
                                        <i class="ml-1" data-feather="chevron-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions mx-auto">
                                <div class="card-header">
                                    10 Besar OPD dengan Pengaduan Tertinggi
                                </div>
                                <div class="col-12 card-pie">
                                    <div class="datatable table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="data_kategori" width="100%" cellspacing="0">
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($getOPD as $g) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $g->name ?></td>
                                                        <td><?= number_format($g->count !== 0 ? ($g->count * 100) / $total : 0) ?> % </td>
                                                    </tr>
                                                <?php } ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-4">
                            <div class="card card-header-actions mx-auto">
                                <div class="card-header">
                                    Daftar OPD dengan Pengaduan Tertinggi
                                </div>
                                <div class="card-body">
                                    <div class="datatable table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th style="width: 30px;">No</th>
                                                    <th>Nama OPD</th>
                                                    <th style="width: 150px;">Jumlah Pengaduan</th>
                                                    <th style="width: 100px;">Persentase</th>
                                                </tr>
                                            </thead>
                                            <tbody id="target">
                                                <?php $no = 1;
                                                foreach ($getTotalOPD as $get) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $get->name ?></td>
                                                        <td><?= $get->count ?></td>
                                                        <td><?= number_format($get->count !== 0 ? ($get->count * 100) / $totalnya : 0) ?> % </td>
                                                    </tr>
                                                <?php }  ?>
                                            </tbody>
                                        </table>
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
        $(document).ready(function() {
            $('#data_kategori').DataTable({
                "paging": false,
                "ordering": false,
                "info": false,
                "searching": false
            });
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
                window.location = window.base_url + 'Dashboard/filtering_opd?tgl_mulai=' + start.format('YYYY-MM-DD') + '&' + 'tgl_selesai=' + end.format('YYYY-MM-DD');
            });
            // cb(start, end);

        });
        var ctx = document.getElementById("grafik_kategori");
        var cData1 = JSON.parse(`<?php echo $opd_data; ?>`);
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
    </script>
</body>

</html>