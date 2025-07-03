<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>/assets/assets/img/favicon.png" rel="icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <style type="text/css" media="print">
        @page {
            size: landscape;
        }

        body {
            writing-mode: horizontal-tb;
        }
    </style>

    <!-- CSS DATATABLE -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/modules/datatables.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/pages/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/chart.js/dist/Chart.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/chocolat/dist/css/chocolat.css">
    <script src="<?= base_url() ?>/tema/tinymce/js/tinymce/tinymce.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
</head>
<div class="section-body">
    <h2 class="section-title text-center">Data Pendaftar PPDB Sekolah Prestasi Prima 2022 - 2023</h2>

</div>

<body>


    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm table-bordered" id="table-1" style="font-size: 10px;">
                            <thead class="bg-primary">
                                <tr>
                                    <th class="text-center">
                                        No
                                    </th>
                                    <th>ID Pendaftar</th>
                                    <th>No Formulir</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th width="15%">Tgl Daftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>No HP Siswa</th>
                                    <th>No HP Ortu</th>
                                    <th>Pilihan Sekolah</th>
                                    <th>Jurusan</th>
                                    <th>Agama</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <?php foreach ($idPendaftar as $baris) : ?>
                                    <tr>
                                        <td class="align-middle"><?= $no++; ?></td>
                                        <td class="align-middle"><?= $baris['idPendaftar'] ?></td>
                                        <td class="align-middle"><?= $baris['noFormulir'] ?></td>
                                        <td class="align-middle"><?= $baris['nmPendaftar'] ?></td>

                                        <td class="align-middle"><?= $baris['alamat'] ?></td>

                                        <td class="align-middle"><?= $baris['created_at']; ?></td>

                                        <td class="align-middle"><?= $baris['asalSekolah'] ?></td>
                                        <td class="align-middle"><?= $baris['hp'] ?></td>
                                        <td class="align-middle"><?= $baris['hpOrtu'] ?></td>
                                        <td class="align-middle"><?= $baris['sekolah'] ?></td>
                                        <td class="align-middle"><?= $baris['kdJurusan'] ?></td>
                                        <td class="align-middle"><?= $baris['agama'] ?></td>
                                    </tr>
                                <?php endforeach; ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-end">
        <?php
        // FUNGSI BULAN DALAM BAHASA INDONESIA
        function bulan($bln)
        {
            $bulan = $bln;
            switch ($bulan) {
                case 1:
                    $bulan = "Januari";
                    break;
                case 2:
                    $bulan = "Februari";
                    break;
                case 3:
                    $bulan = "Maret";
                    break;
                case 4:
                    $bulan = "April";
                    break;
                case 5:
                    $bulan = "Mei";
                    break;
                case 6:
                    $bulan = "Juni";
                    break;
                case 7:
                    $bulan = "Juli";
                    break;
                case 8:
                    $bulan = "Agustus";
                    break;
                case 9:
                    $bulan = "September";
                    break;
                case 10:
                    $bulan = "Oktober";
                    break;
                case 11:
                    $bulan = "November";
                    break;
                case 12:
                    $bulan = "Desember";
                    break;
            }
            return $bulan;
        }
        ?>


        <div class="col-3">
            Jakarta, <?php echo date('d'); ?> <?php $date = bulan(date('m'));
                                                echo $date; ?> <?php echo date('Y'); ?><br>
            Verifikator <br><br><br>
            <b><?= session('nmUser'); ?></b>
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>/tema/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- JS DATATABLE -->

    <script src="<?= base_url() ?>/tema/assets/modules/datatables.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url() ?>/tema/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/custom.js"></script>
    <script src="<?= base_url() ?>/tema/pages/iziToast.min.js"></script>
    <script src="<?= base_url() ?>/tema/assets/modules/sweetalert.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="<?= base_url() ?>/tema/node_modules/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script>
        window.print();
    </script>
</body>