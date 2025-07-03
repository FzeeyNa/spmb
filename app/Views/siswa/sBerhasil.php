<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Registrasi Berhasil</title>

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
    <link href="<?= base_url() ?>/assets/assets/img/favicon.png" rel="icon">
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-sm-12">
                        <div class="card" data-height="650">
                            <div class="card-header justify-content-center">
                                <h3>Pendaftaran Berhasil !</h3>
                            </div>
                            <div class="card-body">
                                <div class="empty-state" data-height="510">
                                    <div class="empty-state-icon bg-primary">
                                        <i class="fas fa-book-reader"></i>
                                    </div>
                                    <h2>Hi, <?= session()->getFlashData('nama') ?></h2>
                                    <p class="lead">
                                        Selangkah lebih dekat untuk bergabung bersama kami, silahkan login dengan menggunakan:
                                    </p>
                                    <p>Username: <b><?= session()->getFlashData('username'); ?></b><br>
                                        Password: <b><?= session()->getFlashData('password'); ?></b></p>
                                    <h2 style="color: red;">*JANGAN LUPA CEK E-MAIL ATAU SCREENSHOOT HALAMAN INI</h2>
                                    <a href="<?= base_url('sign-in') ?>" class="btn btn-primary mt-4" target="_blank"><i class="fas fa-sign-in-alt"></i> Login</a>
                                    <a href="#" class="mt-4 bb">Perlu Bantuan?</a>
                                </div>
                            </div>
                        </div>
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
    <!-- <script>
        $('#form-login').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '',
                data: $(this).serialize(),
                success: function(data) {
                    if (data == "ok") {
                        iziToast.success({
                            title: 'Berhasil!',
                            message: 'Anda akan dialihkan',
                            position: 'topRight'
                        });
                        setTimeout(function() {
                            window.location.reload();
                        }, 2000);
                    } else {
                        iziToast.error({
                            title: 'Maaf, ',
                            message: 'Username atau Password Salah',
                            position: 'topRight'
                        });
                    }
                }
            });
            return false;
        });
    </script> -->
    <?php if (session()->getFlashdata('gagal')) { ?>
        <script>
            iziToast.error({
                title: 'Maaf, ',
                message: 'Username atau Password Salah',
                position: 'topRight'
            });
        </script>
    <?php } ?>
    <?php if (session()->getFlashdata('tidakAktif')) { ?>
        <script>
            iziToast.error({
                title: 'Maaf, ',
                message: 'Akun anda tidak aktif, hubungi admin !',
                position: 'topRight'
            });
        </script>
    <?php } ?>
</body>

</html>