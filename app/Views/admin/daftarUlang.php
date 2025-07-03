<?= $this->extend("admin/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Konfirmasi Pembayaran Daftar Ulang</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
        <div class="breadcrumb-item"><a href="#">Verifikasi Daftar Ulang</a></div>
        <div class="breadcrumb-item">Daftar Ulang</div>
    </div>
</div>
<div class="row justify-content-center">

    <!-- pengkondisian untuk details -->
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="balance-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-danger bg-danger">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Belum Di Verifikasi</h4>
                </div>
                <div class="card-body">
                    <?= $blmVerif; ?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="sales-chart" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Daftar Ulang SMK</h4>
                </div>
                <div class="card-body">
                    <?= $sdhVerifSMK + $sdhVerifSMKcicil; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-chart">
                <canvas id="sales-chart5" height="80"></canvas>
            </div>
            <div class="card-icon shadow-primary" style="background-color: purple;">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Daftar Ulang SMA</h4>
                </div>
                <div class="card-body">
                    <?= $sdhVerifSMA + $sdhVerifSMAcicil; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <!-- <div class="card-header">
                <h4>Icon Tab</h4>
            </div> -->
            <div class="card-body">


                <div class="row justify-content-end mb-1 mr-1">
                    <button class="btn btn-sm btn-info float-end mr-1" id="print"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i> </button> <button class="btn btn-sm btn-success float-end mr-1" id="excel"><i class="fas fa-file-excel" data-toggle="tooltip" data-placement="top" title="Download Excel"></i> </button> <button class="btn btn-sm btn-primary float-end" id="refresh"><i class="fas fa-sync-alt" data-toggle="tooltip" data-placement="top" title="Refresh"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-2">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Formulir</th>
                                  <th>Jurusan</th>

                                <th>Nama Pendaftar</th>

                                <th>Tgl Bayar</th>
                                <th>Total Bayar</th>

                                <th>Bukti Transfer</th>
                                <th>Kwitansi</th>

                                <th>Status</th>
                                <th>Status (VA)</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $row['noFormulir']; ?></td>
                                      <td class="align-middle"><?= $row['kdJurusan']; ?></td>

                                    <td class="align-middle"><?= $row['nmPendaftar']; ?></td>

                                    <!-- <td><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/62" target="_blank"></a></td> -->

                                    <td class="align-middle"><?php $date = new DateTime($row['tglPembayaran']);
                                                                echo $date->format('M d, Y'); ?></td>
                                    <td class="align-middle"><?= $row['totalPembayaran'] ?></td>
                                    <!-- <td><?php //"Rp. " . number_format($row['totalPembayaran'], 2, ',', '.'); 
                                                ?></td>
                                            <td><img src="<?php //$row['gbrBuktiBayar']; 
                                                            ?>" alt="" width="100" height="100"></td> -->
                                    <td class="align-middle">
                                        <div class="gallery ml-3">
                                            <div class="gallery-item" data-image="<?= base_url() ?>/assets/assets/img/vdaftarulang/<?= $row['gbrBuktiBayar'] ?>" data-title="Image 11"></div>
                                        </div>


                                    </td>

                                    <td class="align-middle">
                                        <div class="gallery ml-3">
                                            <div class="gallery-item" data-image="<?= base_url() ?>/assets/assets/img/vdaftarulang/<?= $row['kwitansi'] ?>" data-title="<?= $row['kwitansi'] ?>"></div>
                                        </div>


                                    </td>
                                    <td class="align-middle"> <span class="badge badge-<?php if (($row['status']) == "lunas") {
                                                                                            echo "success";
                                                                                        } else if ($row['status'] == "cicil") {
                                                                                            echo "info";
                                                                                        } else {
                                                                                            echo "warning";
                                                                                        } ?>"><?= $row['status'] ?></span></td>
                                    <td class="align-middle"> <span class="badge badge-<?php if (($row['invoice_payment_status']) != null) {
                                                                                            echo "success";
                                                                                        } else {
                                                                                            echo "warning";
                                                                                        } ?>"><?php if ($row['invoice_payment_status'] != null) {
                                                                                                    echo strtoupper($row['invoice_payment_status']);
                                                                                                } else {
                                                                                                    echo "BELUM DIBAYAR";
                                                                                                } ?></span></td>

                                    <td class="align-middle" width="12%">
                                        <a href="#" class="btn btn-success btn-sm details" data-toggle="modal" data-target="#detailsSMK" data-idPendaftar="<?= $row['idPendaftar'] ?>" data-nmPendaftar="<?= $row['nmPendaftar'] ?>" data-asalSekolah="<?= $row['asalSekolah'] ?>" data-hp="<?= $row['hp'] ?>" data-email="<?= $row['email'] ?>" data-tempatLahir="<?= $row['tempatLahir'] ?>" data-tglLahir="<?= $row['tglLahir'] ?>" data-sekolah="<?= $row['sekolah'] ?>" data-kdJurusan="<?= $row['kdJurusan'] ?>" data-tglDaftar="<?= $row['tglDaftar'] ?>" data-agama="<?= $row['agama'] ?>" data-tglKonfirmasi="<?= $row['tglKonfirmasi'] ?>" data-noFormulir="<?= $row['noFormulir'] ?>" data-verifikator="<?= $row['verifikator']; ?>" data-alamat="<?= $row['alamat']; ?>" data-hpOrtu="<?= $row['hpOrtu']; ?>" data-totalPembayaran="<?= $row['totalPembayaran']; ?>"> <i class=" fas fa-eye" data-toggle="tooltip" data-placement="top" title="Details"></i></a>


                                        <a href="#" id="tes" class="btn btn-warning btn-sm update" data-toggle="modal" data-target="#editSMK" data-idPendaftar="<?= $row['idPendaftar'] ?>" data-old="<?= $row['kwitansi'] ?>" data-hp="<?= $row['hp'] ?>" data-totalPembayaran="<?= $row['totalPembayaran'] ?>" data-nmPendaftar="<?= $row['nmPendaftar'] ?>" data-asalSekolah="<?= $row['asalSekolah'] ?>" data-hp="<?= $row['hp'] ?>" data-email="<?= $row['email'] ?>" data-tempatLahir="<?= $row['tempatLahir'] ?>" data-tglLahir="<?= $row['tglLahir'] ?>" data-sekolah="<?= $row['sekolah'] ?>" data-kdJurusan="<?= $row['kdJurusan'] ?>" data-tglDaftar="<?= $row['tglDaftar'] ?>" data-agama="<?= $row['agama'] ?>" data-tglKonfirmasi="<?= $row['tglKonfirmasi'] ?>" data-noFormulir="<?= $row['noFormulir'] ?>" data-idPembayaran="<?= $row['idPembayaran'] ?>" data-tglVerifikasi="<?= $row['tglVerifikasi'] ?>" data-status="<?= $row['status'] ?>" data-verifikator="<?= $_SESSION['nmUser']; ?>" data-alamat="<?= $row['alamat']; ?>" data-hpOrtu="<?= $row['hpOrtu']; ?>"> <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Konfirmasi"></i></a>

                                        <a href="#" data-href="<?= base_url('daftarUlang/delete') . "/" . $row['idPembayaran'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#konfirmasi_hapus"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a>


                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('modal') ?>

<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi_hapus">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i> Yakin ingin menghapus ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a type="submit" class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>

</div>


<!-- modals details -->
<div class="modal fade" tabindex="-1" role="dialog" id="detailsSMK">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i>Details Calon Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card profile-widget card-primary">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url(); ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">

                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label" style="font-size: 14px;"><strong> Status Pendaftaran</strong></div>
                                <div class="profile-widget-item-value"><span class="badge badge-warning" id="status_u">Belum Membeli Formulir</span></div>
                            </div> -->

                        </div>


                    </div>
                    <div class="profile-widget-description">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="first_name">ID Pendaftar</label>
                                <input type="text" class="form-control" id="idPendaftar_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="first_name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nmPendaftar_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Asal Sekolah</label>
                                <input type="text" class="form-control" id="asalSekolah_d" readonly>
                            </div>


                            <div class="form-group col-4">
                                <label for="last_name">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatLahir_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tglLahir_d" readonly>
                            </div>

                            <div class="form-group col-4">
                                <label for="last_name">Agama</label>
                                <input type="text" class="form-control" id="agama_d" readonly>
                            </div>

                            <div class="form-group col-4">
                                <label for="last_name">No Whatsapp</label>
                                <input type="text" class="form-control" id="hp_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Email</label>
                                <input type="text" class="form-control" id="email_d" readonly>
                            </div>

                            <div class="form-group col-4">
                                <label for="last_name">Tanggal Daftar</label>
                                <input type="text" class="form-control" id="tglDaftar_d" readonly>
                            </div>

                            <div class="form-group col-4">
                                <label for="last_name">No Ortu</label>
                                <input type="text" class="form-control" id="hpOrtu_d" readonly>
                            </div>

                            <div class="form-group col-8">
                                <label for="last_name">Alamat</label>
                                <input type="text" class="form-control" id="alamat_d" readonly>
                            </div>
                        </div>
                        <div class="form-divider">
                            Pilihan Sekolah & Jurusan
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Instansi</label>
                                <input type="text" class="form-control" id="sekolah_d" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Jurusan</label>
                                <input type="text" class="form-control" id="kdJurusan_d" readonly>
                            </div>
                        </div>
                        <div class="form-divider">
                            Pembayaran Daftar Ulang
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="first_name">Total Bayar</label>
                                <input type="text" class="form-control" id="totalPembayaran_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Tanggal Konfirmasi</label>
                                <input type="text" class="form-control" id="tglKonfirmasi_d" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Verifikator</label>
                                <input type="text" class="form-control bg-primary text-white" id="verifikator_d" readonly>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- modals edit admin -->

<div class="modal fade" tabindex="-1" role="dialog" id="editSMK">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i>Konfirmasi Daftar Ulang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card profile-widget card-primary">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url(); ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">

                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label" style="font-size: 14px;"><strong> Status Pendaftaran</strong></div>
                                <div class="profile-widget-item-value"><span class="badge badge-warning" id="status_u">Belum Membeli Formulir</span></div>
                            </div> -->

                        </div>


                    </div>
                    <div class="profile-widget-description">
                        <form action="<?= base_url('DaftarUlang/edit') ?>" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <input type="text" class="form-control" id="verifikator" name="verifikator" value="<?= session('nmUser') ?>" hidden>
                            <input type="text" class="form-control" id="idPembayaran_e" name="idPembayaran" hidden>
                              <input type="text" class="form-control" id="nmPendaftar_e" name="nmPendaftar" hidden>
                               <input type="text" class="form-control" id="hp_e" name="hp" hidden>
                            <input type="text" class="form-control" id="old_e" name="old" hidden>
                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="first_name">No Formulir</label>
                                    <input type="text" class="form-control" id="noFormulir_e" name="noFormulir" placeholder="ex. SMK0001" readonly>
                                    <div class="invalid-feedback">
                                        Nomor Formulir Wajib Diisi
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="first_name">Total Pembayaran</label>
                                    <input type="text" class="form-control" id="totalPembayaran_e" name="totalPembayaran" required>
                                    <div class="invalid-feedback">
                                        Nomor Formulir Wajib Diisi
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Tanggal Konfirmasi</label>
                                    <input type="text" class="form-control" id="tglKonfirmasi_e" readonly>
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-5">
                                    <label class="d-block">Status</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="pending" name="status" id="pending">
                                        <label class="form-check-label" for="inlineradio1">Pending</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="lunas" name="status" id="lunas">
                                        <label class="form-check-label" for="inlineradio2">Lunas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="cicil" name="status" id="cicil">
                                        <label class="form-check-label" for="inlineradio2">Cicil</label>
                                    </div>
                                </div>
                                <div class="form-group col-7">
                                    <label for="last_name">Upload Kwitansi</label>
                                    <input id="last_name" type="file" class="form-control" name="kwitansi">

                                    <?php if ($validasi->getError('kwitansi')) {
                                        echo " <div style='color:red'>" . $validasi->getError('kwitansi') . "</div>";
                                    } else { ?>
                                        <div class="invalid-feedback">
                                            Field wajib diisi
                                        </div>

                                        <div style="color:red">
                                            Format gambar .jpg, .png dan .jpeg dan maksimal 1 Mb
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <button class="btn btn-primary" type="submit">Konfirmasi</button> <button type="button" class="btn btn-secondary" style="color: white;" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>


<?= $this->section('jquery'); ?>
<script>
    var balance_chart = document.getElementById("balance-chart").getContext('2d');

    var balance_chart_bg_color = balance_chart.createLinearGradient(0, 0, 0, 70);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart = new Chart(balance_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
            datasets: [{
                label: 'Balance',
                data: [50, 61, 80, 50, 72, 52, 60, 41, 30, 45, 70, 40, 93, 63, 50, 62],
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });
</script>

<script>
    var sales_chart = document.getElementById("sales-chart").getContext('2d');

    var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart = new Chart(sales_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
            datasets: [{
                label: 'Sales',
                data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
                borderWidth: 2,
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });
</script>
<script>
    var sales_chart = document.getElementById("sales-chart5").getContext('2d');

    var sales_chart_bg_color = sales_chart.createLinearGradient(0, 0, 0, 80);
    balance_chart_bg_color.addColorStop(0, 'rgba(63,82,227,.2)');
    balance_chart_bg_color.addColorStop(1, 'rgba(63,82,227,0)');

    var myChart = new Chart(sales_chart, {
        type: 'line',
        data: {
            labels: ['16-07-2018', '17-07-2018', '18-07-2018', '19-07-2018', '20-07-2018', '21-07-2018', '22-07-2018', '23-07-2018', '24-07-2018', '25-07-2018', '26-07-2018', '27-07-2018', '28-07-2018', '29-07-2018', '30-07-2018', '31-07-2018'],
            datasets: [{
                label: 'Sales',
                data: [70, 62, 44, 40, 21, 63, 82, 52, 50, 31, 70, 50, 91, 63, 51, 60],
                borderWidth: 2,
                backgroundColor: balance_chart_bg_color,
                borderWidth: 3,
                borderColor: 'rgba(63,82,227,1)',
                pointBorderWidth: 0,
                pointBorderColor: 'transparent',
                pointRadius: 3,
                pointBackgroundColor: 'transparent',
                pointHoverBackgroundColor: 'rgba(63,82,227,1)',
            }]
        },
        options: {
            layout: {
                padding: {
                    bottom: -1,
                    left: -1
                }
            },
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false,
                        drawBorder: false,
                    },
                    ticks: {
                        beginAtZero: true,
                        display: false
                    }
                }],
                xAxes: [{
                    gridLines: {
                        drawBorder: false,
                        display: false,
                    },
                    ticks: {
                        display: false
                    }
                }]
            },
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#table-1').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });

    $(document).ready(function() {
        $('#table-2').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>

<script>
    $(document).on('click', '.details', function(e) {
        var idPendaftar = $(this).attr("data-idPendaftar");
        var nmPendaftar = $(this).attr("data-nmPendaftar");
        var asalSekolah = $(this).attr("data-asalSekolah");
        var tglLahir = $(this).attr("data-tglLahir");
        var tempatLahir = $(this).attr("data-tempatLahir");
        var agama = $(this).attr("data-agama");

        var hp = $(this).attr("data-hp");
        var email = $(this).attr("data-email");
        var tglKonfirmasi = $(this).attr("data-tglKonfirmasi");
        var noFormulir = $(this).attr("data-noFormulir");
        var tglDaftar = $(this).attr("data-tglDaftar");
        var sekolah = $(this).attr("data-sekolah");
        var kdJurusan = $(this).attr("data-kdJurusan");
        var verifikator = $(this).attr("data-verifikator");
        var hpOrtu = $(this).attr("data-hpOrtu");
        var alamat = $(this).attr("data-alamat");
        var totalPembayaran = $(this).attr("data-totalPembayaran");


        $('#idPendaftar_d').val(idPendaftar);
        $('#totalPembayaran_d').val(totalPembayaran);
        $('#nmPendaftar_d').val(nmPendaftar);
        $('#asalSekolah_d').val(asalSekolah);
        $('#tglLahir_d').val(tglLahir);
        $('#tempatLahir_d').val(tempatLahir);
        $('#hp_d').val(hp);
        $('#email_d').val(email);
        $('#tglKonfirmasi_d').val(tglKonfirmasi);
        $('#noFormulir_d').val(noFormulir);
        $('#tglDaftar_d').val(tglDaftar);
        $('#sekolah_d').val(sekolah);
        $('#kdJurusan_d').val(kdJurusan);
        $('#hpOrtu_d').val(hpOrtu);
        $('#alamat_d').val(alamat);

        $('#agama_d').val(agama);
        $('#verifikator_d').val(verifikator);
    });
</script>

<script>
    $(document).on('click', '.update', function(e) {
        var idPendaftar = $(this).attr("data-idPendaftar");
        var nmPendaftar = $(this).attr("data-nmPendaftar");
        var asalSekolah = $(this).attr("data-asalSekolah");
        var tglLahir = $(this).attr("data-tglLahir");
        var tempatLahir = $(this).attr("data-tempatLahir");
        var agama = $(this).attr("data-agama");
        var totalPembayaran = $(this).attr("data-totalPembayaran");
        var old = $(this).attr("data-old");
         var hp = $(this).attr("data-hp");

        var hp = $(this).attr("data-hp");
        var email = $(this).attr("data-email");
        var tglKonfirmasi = $(this).attr("data-tglKonfirmasi");
        var noFormulir = $(this).attr("data-noFormulir");
        var tglDaftar = $(this).attr("data-tglDaftar");
        var sekolah = $(this).attr("data-sekolah");
        var kdJurusan = $(this).attr("data-kdJurusan");
        var idPembayaran = $(this).attr("data-idPembayaran");
        var tglVerifikasi = $(this).attr("data-tglVerifikasi");
        var status = $(this).attr("data-status");
        var verifikator = $(this).attr("data-verifikator");
        var alamat = $(this).attr("data-alamat");
        var hpOrtu = $(this).attr("data-hpOrtu");


        $('#old_e').val(old);
         $('#hp_e').val(hp);
        $('#totalPembayaran_e').val(totalPembayaran);
        $('#idPendaftar_e').val(idPendaftar);
        $('#nmPendaftar_e').val(nmPendaftar);
        $('#asalSekolah_e').val(asalSekolah);
        $('#tglLahir_e').val(tglLahir);
        $('#tempatLahir_e').val(tempatLahir);
        $('#hp_e').val(hp);
        $('#email_e').val(email);
        $('#tglKonfirmasi_e').val(tglKonfirmasi);
        $('#noFormulir_e').val(noFormulir);
        $('#tglDaftar_e').val(tglDaftar);
        $('#sekolah_e').val(sekolah);
        $('#kdJurusan_e').val(kdJurusan);

        $('#agama_e').val(agama);
        $('#idPembayaran_e').val(idPembayaran);
        $('#tglVerifikasi_e').val(tglVerifikasi);
        $('#status_e').val(status);
        $('#verifikator_e').val(verifikator);
        $('#alamat_e').val(alamat);
        $('#hpOrtu_e').val(hpOrtu);

        if (status == 'pending') {
            $('#pending').attr("checked", "");
        } else {
            $('#pending').attr("");
        }
        if (status == 'lunas') {
            $('#lunas').attr("checked", "");
        } else {
            $('#lunas').attr("");
        }

        if (status == 'cicil') {
            $('#cicil').attr("checked", "");
        } else {
            $('#cicil').attr("");
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>
<script>
    <?php if (session()->getFlashdata('daftarUlangEdit')) { ?>
        iziToast.success({
            title: 'Selamat!',
            message: 'Data Berhasil Di Konfirmasi',
            position: 'bottomRight'
        });
    <?php } ?>
</script>

<script>
    $(document).ready(function() {
        if (<?= $validasi->hasError('kwitansi'); ?> == true) {
            $('#editSMK').modal('show');
        }
    });
</script>


<?= $this->endSection(); ?>