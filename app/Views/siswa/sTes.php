<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Tes Potensi Akademik</h1>
</div>

<div class="section-body">
    <h2 class="section-title">Hi, <?= session('nmPendaftar'); ?></h2>
    <p class="section-lead">
        Untuk Pelaksanaan Tes, mohon disimak dengan seksama. Apabila mengalami kendala dapat menghubungi panitia.
    </p>

    <div class="row">
        <div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Username & Password</h4>
                    <div class="card-header-action">
                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
                    </div>
                </div>
                <div class="collapse hide" id="mycard-collapse">
                    <div class="card-body">
                        <span>Username dan Password berikut, dapat digunakan untuk mengerjakan Tes Potensi Akademik.</span>
                        <br /><br />
                        <strong>
                            <table>


                                <tr>
                                    <td width="20%">Username</td>
                                    <td>:</td>
                                    <td><span style="font-size:16px"><?= $formu->idPendaftar; ?></span></td>
                                </tr>
                                <tr>
                                    <td width="20%">Password</td>
                                    <td>:</td>
                                    <td><span style="font-size:16px"><?= $formu->password; ?></span></td>
                                </tr>
                            </table>
                        </strong>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Link Ujian (Tes Potensi Akademik)</h4>
                </div>
                <div class="card-body">
                    <p class="card-text">Informasi Ujian TPA</p>
                    <p>Mohon maaf untuk ujian TPA, akan kami informasikan selanjutnya via Whatsapp, pastikan ketika mendaftar no whatsapp kalian aktif ya.</p>
                    <!--<ol>-->
                    <!--    <li>Ujian dapat dilaksanakan setiap waktu</li>-->
                    <!--    <li>Waktu pengerjaan ujian selama 120 Menit</li>-->
                    <!--    <li>Pastikan koneksi internet stabil ketika sedang mengerjakan ujian</li>-->
                    <!--    <li>Pengumuman Calon Siswa yang sudah melaksanakan ujian diumumkan setiap hari pada pukul 16.00</li>-->
                    <!--</ol>-->

                    <!--Silahkan klik tautan di bawah ini jika kalian sudah siap untuk mengerjakan ujian.<br><br>-->
                    <!--<a href="http://ujian.prestasiprima.sch.id" target="_blank" class="card-link btn btn-primary"><i class="fas fa-paper-plane"></i> CBT Sekolah Prestasi Prima</a>-->

                </div>
            </div>
        </div>
    </div>
</div>



<!-- <div class="section-body">
    <h2 class="section-title">Daftar Calon Siswa Sekolah Prestasi Prima</h2>
    <p class="section-lead">
        Berikut adalah daftar peserta yang sudah melakukan Tes Potensi Akademik, kalian dapat memastikan bahwa kalian sudah mengerjakan TPA, jika nama kalian belum ada pada list tersebut dan kalian sudah melaksanakan tes mohon ditunggu, karena update data dilakukan setiap hari pada pukul 16.00.
    </p>
</div> -->
<?= $this->endSection(); ?>
<?= $this->section('jquery'); ?>
<script>
    <?php if (session()->getFlashdata('berhasil')) { ?>
        iziToast.success({
            title: 'Berhasil!',
            message: 'Selamat datang, <?= $_SESSION['nmPendaftar'] ?>',
            position: 'bottomRight'
        });

    <?php } ?>
</script>
<?= $this->endSection(); ?>