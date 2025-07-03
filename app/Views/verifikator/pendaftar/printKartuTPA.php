<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>
    <link href="<?= base_url() ?>/assets/assets/img/favicon.png" rel="icon">
    <!-- General CSS Files -->
    <!-- <link rel="shortcut icon" href="/tema/favicon.png" type="image/x-icon" /> -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/modules/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/modules/fontawesome/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/pages/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/tema/assets/css/components.css">
    <!-- Start GA -->

    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
                        <div class="login-brand" style="margin-bottom: 15px">

                        </div>

                        <div class="card card-primary">

                            <div class="card-header justify-content-center">
                                <img src="<?= base_url() ?>/tema/assets/img/logo yayasan wahana prestasi prima.png" alt="logo" width="60">
                                <h4 class="text-center" style="line-height: 20px;margin-left:25px; color:black">KARTU TEST POTENSI AKADEMIK <br>SMA & SMK PRESTASI PRIMA <br> TAHUN PELAJARAN 2022/2023</h4>
                            </div>

                            <div class="card-body">
                                <table class="table table-sm table-hover table-striped">

                                    <tr>
                                        <td width="30%">Nama Peserta</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td><?= $pendaftar->nmPendaftar; ?></td>
                                    </tr>
                                    <!-- <tr>
                                        <td width="30%">Nomor Induk</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td></td>
                                    </tr> -->
                                    <tr>
                                        <td width="30%">Username</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td> <?= $tess->idPendaftar; ?></td>
                                    </tr>
                                     <tr>
                                        <td width="30%">Password</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td><?= $tess->password; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Link Ujian</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td><a href="https://ujian.prestasiprima.sch.id" target="_blank"> https://ujian.prestasiprima.sch.id</a></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Server / Sesi</td>
                                        <td width="1%" class="text-center">:</td>
                                        <td>CBT / Server 1</td>
                                    </tr>

                                </table>



                            </div>
                        </div>
                        <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>/tema/assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="<?= base_url() ?>/tema/pages/iziToast.min.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url() ?>/tema/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/custom.js"></script>
<script>
    window.print();
</script>

</body>

</html>