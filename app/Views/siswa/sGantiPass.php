<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Ganti Password</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/siswa/dashboard') . '/' . base64_encode(session('idPendaftar')); ?>">Beranda</a></div>
        <div class="breadcrumb-item">Ganti Password</div>
    </div>
</div>

<div class="section-body">

    <div class="row mt-sm-4">
        <div class="col-12 col-lg-5">
            <div class="card card-primary">

                <div class="card-body">

                    <form id="form-register" action="<?= base_url('siswa/gantiPassEdit/') ?>" method="POST" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>
                        <input type="text" class="form-control" name="idPendaftar" value="<?= session('idPendaftar') ?>" hidden>
                        <div class="form-group">
                            <div class="input-group">

                                <input type="password" class="form-control" name="passwordLama" id="passwordLama" required placeholder="Password Lama">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-md" type="button"><i data-toggle="tooltip" data-title="Lihat Password" class="fas fa-eye" id="passLama"></i></button>
                                </div>


                                <div class="invalid-feedback">
                                    Field wajib diisi
                                </div>


                            </div>
                            <div style="color: red;">
                                <?= $validasi->getError('passwordLama'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">

                                <input type="password" class="form-control" name="password" id="password" required placeholder="Password Baru">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-md" type="button"><i data-toggle="tooltip" data-title="Lihat Password" class="fas fa-eye" id="passBaru"></i></button>
                                </div>
                                <div class="invalid-feedback">
                                    Field Wajib Diisi
                                </div>

                            </div>
                            <?php if ($validasi->getError('password')) { ?>
                                <div style="color: red;">
                                    <?= $validasi->getError('password'); ?>
                                </div>
                            <?php } else { ?>
                                <div style="color: red;">
                                    * Minimal 6 karakter, gabungan angka dan huruf
                                </div>
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <input type="password" class="form-control" name="passwordverif" id="passwordverif" required placeholder="Ulangi Password Baru">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-md" type="button"><i data-toggle="tooltip" data-title="Lihat Password" class="fas fa-eye" id="verifPass"></i></button>
                                </div>
                                <div class="invalid-feedback">
                                    Field Wajib Diisi
                                </div>
                            </div>
                            <div style="color: red;">
                                <?= $validasi->getError('passwordverif'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="fas fa-check"></i> Simpan
                            </button>
                        </div>

                </div>

                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection(); ?>
<?= $this->section('modal'); ?>



<?= $this->endSection(); ?>
<?= $this->section('jquery'); ?>
<!-- 
    Membuat rupiah otomatis
 -->
<script>
    <?php if (session()->getFlashdata('pointSimpan')) { ?>
        iziToast.success({
            title: 'Berhasil!',
            message: 'Data Berhasil Disimpan',
            position: 'bottomRight'
        });

    <?php } ?>
</script>

<script>
    $(document).ready(function() {
        $("#passLama").click(function() {
            if ($(this).hasClass("fa-eye-slash") == true) {
                $("#passwordLama").attr("type", "password");
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");

            } else {
                $("#passwordLama").attr("type", "text");
                $(this).removeClass("fa-eye");
                $(this).addClass("fa-eye-slash");
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#passBaru").click(function() {
            if ($(this).hasClass("fa-eye-slash") == true) {
                $("#password").attr("type", "password");
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");

            } else {
                $("#password").attr("type", "text");
                $(this).removeClass("fa-eye");
                $(this).addClass("fa-eye-slash");
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#verifPass").click(function() {
            if ($(this).hasClass("fa-eye-slash") == true) {
                $("#passwordverif").attr("type", "password");
                $(this).removeClass("fa-eye-slash");
                $(this).addClass("fa-eye");

            } else {
                $("#passwordverif").attr("type", "text");
                $(this).removeClass("fa-eye");
                $(this).addClass("fa-eye-slash");
            }
        });
    });
</script>

<?= $this->endSection(); ?>