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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-1">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand" style="margin-bottom: 15px">
                            <img src="<?= base_url() ?>/tema/assets/img/logo yayasan wahana prestasi prima.png" alt="logo" width="80" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="text-center" style="color: #013289;">FORM PENDAFTARAN CALON PESERTA DIDIK BARU SEKOLAH PRESTASI PRIMA TAHUN PELAJARAN 2025/2026</h4>
                            </div>

                            <div class="card-body">

                                <form id="form-register" action="<?= base_url('verifikator/simpan') ?>" method="POST" class="needs-validation" novalidate="">
                                    <?= csrf_field(); ?>


                                    <input id="idPendaftar" type="text" class="form-control" name="idPendaftar" value="<?php $id = date("is");
                                                                                                                        $rand = rand(100, 999);
                                                                                                                        echo $rand, $id; ?>" hidden>
                                    <input id="status" type="text" class="form-control" name="status" value="belum" hidden>
                                    <input id="pass" type="text" class="form-control" name="pass" value="123456" hidden>
                                    <input id="noFormulir" type="text" class="form-control" name="noFormulir" value="" hidden>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="first_name">Nama Lengkap</label>
                                            <input id="nmPendaftar" type="text" class="form-control" name="nmPendaftar" placeholder="Nama Lengkap" autofocus required value="<?= old('nmPendaftar'); ?>" onkeyup="myFunction()">
                                            <div class="invalid-feedback">
                                                Mohon Nama Lengkap Diisi
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Asal Sekolah</label>
                                            <input id="asalSekolah" type="text" class="form-control" name="asalSekolah" placeholder="Asal Sekolah" required value="<?= old('asalSekolah'); ?>" onkeyup="myFunction1()">
                                            <div class="invalid-feedback">
                                                Mohon Asal Sekolah Diisi
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="first_name">Tempat Lahir</label>
                                            <input id="first_name" type="text" class="form-control" name="tempatLahir" placeholder="Tempat Lahir" value="<?= old('tempatLahir'); ?>">
                                            <div class="invalid-feedback">
                                                Mohon Tempat Lahir Diisi
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Tanggal Lahir</label>
                                            <input id="last_name" type="date" class="form-control" name="tglLahir" value="<?= old('tglLahir'); ?>">
                                            <div class="invalid-feedback">
                                                Mohon Tanggal Lahir Diisi
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="first_name">No WhatsApp</label>
                                            <input id="first_name" type="text" class="form-control" name="hp" placeholder="ex. 6281290959xxx" required value="<?= old('hp'); ?>">
                                            <div class="invalid-feedback">
                                                Mohon Nomor Whatsapp Diisi
                                            </div>
                                            <div style="color:red">
                                                Contoh: 6281290599xxx
                                            </div>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">E-Mail</label>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="<?= old('email'); ?>">
                                            <div class="invalid-feedback">
                                                Mohon email Diisi
                                            </div>


                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">No Telp Orang Tua</label>
                                            <input id="hpOrtu" type="text" class="form-control" name="hpOrtu" placeholder="ex. 6283874766770" required value="<?= old('hpOrtu'); ?>">
                                            <div class="invalid-feedback">
                                                Mohon No Telp Ortu Diisi
                                            </div>


                                        </div>
                                        <div class="form-group col-6">
                                            <label for="email">Agama</label>
                                            <select class="form-control selectric" name="agama" required>
                                                <option value="">Pilih</option>
                                                <option value="islam">Islam</option>
                                                <option value="protestan">Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="khonghucu">Khonghucu</option>

                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon Agama Diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Jenis Kelamin</label>
                                            <select class="form-control selectric" name="jk" required>
                                                <option value="">Pilih</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>

                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon Jenis Kelamin Diisi
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Alamat</label>
                                            <textarea class="form-control" style="height: 100%;" rows="3" name="alamat" id="alamat" required><?= old('alamat'); ?></textarea>
                                            <div class="invalid-feedback">
                                                Mohon Alamat Diisi
                                            </div>


                                        </div>



                                        <div class="form-divider">
                                            Pilihan Sekolah & Jurusan
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-6">
                                                <label>Instansi</label>

                                                <select class="form-control selectric" name="sekolah" id="sekolah" required>
                                                    <option value="" selected>Pilih</option>
                                                    <?php
                                                    foreach ($ambilSekolah as $k) {
                                                    ?>
                                                        <option value="<?php echo $k['instansi']; ?>"><?php echo $k['instansi']; ?></option>
                                                    <?php } ?>


                                                </select>

                                                <div class="invalid-feedback">
                                                    Mohon Sekolah Diisi
                                                </div>
                                            </div>
                                            <div class="form-group col-6">
                                                <label>Jurusan</label>
                                                <select class="form-control selectric kdJurusan" name="kdJurusan" id="kdJurusan" required>
                                                    <option value="" disabled selected>Pilih</option> 
                                                    <option value="BC">Broadcasting</option>
                                                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                                                    <option value="TKJ">Teknik Komputer Jaringan</option>
                                                    <option value="MM">Multimedia</option>
                                                    <option value="IPA">Ilmu Pengetahuan Alam</option>
                                                    <option value="IPS">Ilmu Pengetahuan Sosial</option> -->
                                                </select>
                                                <div class="invalid-feedback">
                                                    Mohon Jurusan Diisi
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Darimana kalian (Calon Siswa) / Orang Tua mendapatkan informasi mengenai Peneriman Siswa di Sekolah Prestasi Prima?</label>
                                            <select class="form-control selectric" name="ket">
                                                <option value="" disabled selected>Pilih</option>
                                                <option value="website">Website</option>
                                                <option value="brosur">Brosur</option>
                                                <option value="spanduk">Spanduk Baliho</option>
                                                <option value="instagram">Instagram</option>
                                                <option value="youtube">Youtube</option>
                                                <option value="tik tok">Tik Tok</option>
                                                <option value="webinar">Webinar</option>
                                                <option value="teman">Teman</option>
                                                <option value="keluarga">Keluarga / Saudara</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Mohon Kuisioner Diisi
                                            </div>
                                        </div>


                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="agree" class="custom-control-input" id="agree" required>
                                                <label class="custom-control-label" for="agree"> Saya setuju dengan syarat dan ketentuan yang berlaku di Sekolah Prestasi Prima</label>
                                                <div class="invalid-feedback">
                                                    Mohon Diisi
                                                </div>
                                            </div>
                                            
                                            
                                        </div> -->
                                        <!-- <div class="form-group">

                                            <div class="g-recaptcha" data-sitekey="6LdBLgwdAAAAAGRttRJ890iCUglSMS1OazaRipqa"></div>

                                        </div> -->

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                Daftar
                                            </button>
                                        </div>
                                </form>


                            </div>
                        </div>
                        <!-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> -->
                        <p class="text-center"> Formulir pendaftaran ini tanpa Whatsapp Gateway untuk menanggulangi traffic data, pastikan Bapak / Ibu Verifikator Menuliskan <strong>username dan password</strong> calon siswa pada fisik formulir pendaftaran.</p>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/assets/assets/js/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url() ?>/tema/assets/js/stisla.js"></script>
    <script src="<?= base_url() ?>/tema/assets/modules/moment.min.js"></script>


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


    </script>

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#sekolah").change(function() {

                if ($(this).children("option:selected").val() == "SMK") {
                    $('#kdJurusan').children('option[value="IPA"]').css('display', 'none');
                    $('#kdJurusan').children('option[value="IPS"]').css('display', 'none');
                } else {
                    $('#kdJurusan').children('option[value="RPL"]').css('display', 'none');
                    $('#kdJurusan').children('option[value="BC"]').css('display', 'none');
                    $('#kdJurusan').children('option[value="MM"]').css('display', 'none');
                    $('#kdJurusan').children('option[value="TKJ"]').css('display', 'none');
                }

            });
        });
    </script> -->
    <script type="text/javascript">
        $("#sekolah").change(function() {
            let sekolah = $("#sekolah").val();
            var settings = {
                "url": "<?= base_url() ?>/register/showKdJurusan/" + sekolah,
                "method": "GET",
                "timeout": 0,
                "dataType": "json",
                "contentType": 'json',
            };

            $.ajax(settings).done(function(response) {
                let html;
                response.forEach(function(res) {
                    html += `<option value='${res.kdJurusan}'>${res.kdJurusan}</option>`
                })
                $("#kdJurusan").html(`<option value="">Pilih</option>` + html)
            });
        });


        <?php if ($validasi->hasError('email') == true) { ?>
            iziToast.error({
                title: 'Maaf!',
                message: 'Email Sudah Terdaftar',
                position: 'bottomRight',
                timeOut: 8000
            });
        <?php } ?>
    </script>
 <script>
function myFunction() {
    var x = document.getElementById("nmPendaftar");
    x.value = x.value.toUpperCase();
}

function myFunction1() {
    var y = document.getElementById("asalSekolah");
    y.value = y.value.toUpperCase();
}
</script>
</body>

</html>