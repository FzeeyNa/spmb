<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login Admin SPMB</title>
    <link href="<?= base_url()?>/assets/assets/img/favicon.png" rel="icon">
    <!-- General CSS Files -->
    <!-- <link rel="shortcut icon" href="/tema/favicon.png" type="image/x-icon" /> -->
    <link rel="stylesheet" href="<?= base_url()?>/tema/assets/modules/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/tema/assets/modules/fontawesome/css/all.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url()?>/tema/assets/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?= base_url()?>/tema/pages/iziToast.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/tema/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>/tema/assets/css/components.css">
    <!-- Start GA -->

    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand" style="margin-bottom: 15px">
                            <img src="<?= base_url()?>/tema/assets/img/logo yayasan wahana prestasi prima.png" alt="logo" width="80" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header justify-content-center">
                                <h4>Silahkan Login Admin / Verifikator</h4>
                            </div>

                            <div class="card-body">

                                <form id="form-login" action="<?= base_url('login/cekLogin') ?>" method="POST" class="needs-validation" novalidate="">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your username
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">

                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Tampilkan Password</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button name="login" type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" id="submit">
                                            Login
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
                        <div class="simple-footer">
                            Copyright &copy; Sekolah Prestasi Prima <?php $thn = date('Y');
                                                                    echo $thn; ?> </div>
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
    <script src="<?= base_url()?>/tema/assets/js/stisla.js"></script>
    <script src="<?= base_url()?>/tema/assets/modules/moment.min.js"></script>
    <script src="<?= base_url()?>/tema/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
    <script src="<?= base_url()?>/tema/pages/iziToast.min.js"></script>
    <!-- Template JS File -->
    <script src="<?= base_url()?>/tema/assets/js/scripts.js"></script>
    <script src="<?= base_url()?>/tema/assets/js/custom.js"></script>
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


    <script>
        $(document).ready(function() {
            $("#remember-me").change(function() {

                // Check the checkbox state
                if ($(this).is(':checked')) {
                    // Changing type attribute
                    $("#password").attr("type", "text");

                    // Change the Text
                    $("#toggleText").text("Hide");
                } else {
                    // Changing type attribute
                    $("#password").attr("type", "password");

                    // Change the Text
                    $("#toggleText").text("Show");
                }

            });
        });
    </script>
</body>

</html>