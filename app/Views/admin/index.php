<?= $this->extend("admin/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Hai!, <?= $_SESSION['nmUser']; ?></h1>
</div>
<div class="section-body" style="margin-bottom: -25pt;">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #1597E5;">
                    <i class="fas fa-users" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pendaftar</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $pend; ?> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #FF8243;">
                    <i class="fas fa-book-reader" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendaftar SMK</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $smk; ?> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #610094;">
                    <i class="fas fa-flask" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendaftar SMA</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $sma; ?> </div>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Transaksi</h4>
                </div>
                <div class="card-body">
                    0                </div>
            </div>
        </div>
    </div>-->

    </div>

</div>

<div class="section-body">
    <h2 class="section-title">Pembelian Formulir</h2>
    <p class="section-lead">
        Total Pembelian Formulir (Realtime)
    </p>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Pembelian Formulir Sudah Diverifikasi</h4>
                    <div class="card-header-action">
                        <a href="#summary-chart" data-tab="summary-tab" class="btn active">SMK</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="summary">

                        <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                            <canvas id="myChart" height="180"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 style="color:purple">Pembelian Formulir Sudah Diverifikasi</h4>
                    <div class="card-header-action">
                        <a href="#summary-chart" data-tab="summary-tab" class="btn active" style="background-color: purple;">SMA</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="summary">

                        <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                            <canvas id="myChart1" height="180"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="section-body">
    <h2 class="section-title">Registrasi Daftar Ulang</h2>
    <p class="section-lead">
        Total Yang Sudah Daftar Ulang (Realtime)
    </p>
    <div class="row">
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Pembayaran Daftar Ulang yang Terverifikasi</h4>
                    <div class="card-header-action">
                        <a href="#summary-chart" data-tab="summary-tab" class="btn active">SMK</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="summary">

                        <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                            <canvas id="myChart3" height="180"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 style="color:purple">Pembayaran Daftar Ulang yang Terverifikasi</h4>
                    <div class="card-header-action">
                        <a href="#summary-chart" data-tab="summary-tab" class="btn active" style="background-color: purple;">SMA</a>

                    </div>
                </div>
                <div class="card-body">
                    <div class="summary">

                        <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                            <canvas id="myChart4" height="180"></canvas>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>










<?= $this->endSection(); ?>
<?= $this->section('jquery'); ?>

<!-- sample data statistik -->
<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["BC", "RPL", "MM", "TKJ"],
            datasets: [{
                label: 'Formulir',
                data: [<?= $bc; ?>, <?= $rpl; ?>, <?= $mm; ?>, <?= $tkj; ?>],
                borderWidth: 2,
                backgroundColor: 'rgba(255, 69, 0, 0.75)',
                borderWidth: 0,
                borderColor: 'transparent',
                pointBorderWidth: 0,
                pointRadius: 3.5,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                        // },
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 200,
                        //     callback: function(value, index, values) {
                        //         return '$' + value;
                        //     }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
</script>

<script>
    var ctx = document.getElementById("myChart1").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["IPA", "IPS"],
            datasets: [{
                label: 'Formulir',
                data: [<?= $ipa; ?>, <?= $ips; ?>],
                borderWidth: 2,
                backgroundColor: 'rgba(146, 32, 211, 0.75)',
                borderWidth: 0,
                borderColor: 'transparent',
                pointBorderWidth: 0,
                pointRadius: 3.5,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                        // },
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 200,
                        //     callback: function(value, index, values) {
                        //         return '$' + value;
                        //     }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
</script>

<script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["BC", "RPL", "MM", "TKJ"],
            datasets: [{
                label: 'Daftar Ulang',
                data: [<?= $daftarUlangBC; ?>, <?= $daftarUlangRPL; ?>, <?= $daftarUlangMM; ?>, <?= $daftarUlangTKJ; ?>],
                borderWidth: 2,
                backgroundColor: 'rgba(255, 69, 0, 0.75)',
                borderWidth: 0,
                borderColor: 'transparent',
                pointBorderWidth: 0,
                pointRadius: 3.5,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                        // },
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 200,
                        //     callback: function(value, index, values) {
                        //         return '$' + value;
                        //     }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
</script>

<script>
    var ctx = document.getElementById("myChart4").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["IPA", "IPS"],
            datasets: [{
                label: 'Daftar Ulang',
                data: [<?= $daftarUlangIPA; ?>, <?= $daftarUlangIPS; ?>],
                borderWidth: 2,
                backgroundColor: 'rgba(146, 32, 211, 0.75)',
                borderWidth: 0,
                borderColor: 'transparent',
                pointBorderWidth: 0,
                pointRadius: 3.5,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        drawBorder: false,
                        color: '#f2f2f2',
                        // },
                        // ticks: {
                        //     beginAtZero: true,
                        //     stepSize: 200,
                        //     callback: function(value, index, values) {
                        //         return '$' + value;
                        //     }
                    }
                }],
                xAxes: [{
                    gridLines: {
                        display: false,
                        tickMarkLength: 15,
                    }
                }]
            },
        }
    });
</script>

<script>
    <?php if (session()->getFlashdata('berhasil')) { ?>
        iziToast.success({
            title: 'Berhasil!',
            message: 'Selamat datang, <?= $_SESSION['nmUser'] ?>',
            position: 'bottomRight'
        });

    <?php } ?>
</script>
<?= $this->endSection(); ?>