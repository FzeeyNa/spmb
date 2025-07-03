<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Pointer Wawancara Siswa</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/siswa/dashboard') . '/' . base64_encode(session('idPendaftar')); ?>">Beranda</a></div>
        <div class="breadcrumb-item">Pointer Siswa</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Hi, <?= session('nmPendaftar'); ?></h2>
    <p class="section-lead">
        Silahkan untuk mengisi Pointer Wawancara Calon Siswa
    </p>
    <div class="row mt-sm-4 justify-content-center">
        <div class="col-12 col-md-12 col-lg-10">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <h4>Pointer Wawancara Calon Siswa</h4>
                </div>
                <div class="card-body">

                    <form id="form-register" action="<?= base_url('siswa/simpanPointerSiswa/') ?>" method="POST" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>

                        <input id="first_name" type="text" class="form-control" name="idPendaftar" value="<?= session('idPendaftar') ?>" id="idPendaftar" hidden>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Nomor Formulir</label>
                                <input id="first_name" type="text" class="form-control" name="noFormulir" id="noFormulir" value="<?= session('noFormulir') ?>" readonly required>
                                <div class="invalid-feedback">
                                    Mohon No Formulir Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nama Siswa</label>
                                <input id="last_name" type="text" class="form-control" name="nmPendaftar" id="nmPendaftar" required readonly value="<?= session('nmPendaftar') ?>">
                                <div class="invalid-feedback">
                                    Mohon Nama Diisi
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="first_name">No HP / WA</label>
                                <input id="first_name" type="text" class="form-control" name="hp" readonly value="<?= session('hp') ?>" required>
                                <div class="invalid-feedback">
                                    Mohon No HP Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Jenis Kelamin</label>
                                <input id="jk" type="text" class="form-control" name="jk" required value="<?= session('jk') ?>" readonly>
                                <div class="invalid-feedback">
                                    Mohon Jenis Kelamin Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="first_name">Sekolah</label>
                                <input id="sekolah" type="text" class="form-control" name="sekolah" required readonly value="<?= session('sekolah') ?>">
                                <div class="invalid-feedback">
                                    Mohon Sekolah Diisi
                                </div>

                            </div>
                            <div class="form-group col-6">
                                <label for="email">Jurusan</label>
                                <input id="kdJurusan" type="text" class="form-control" name="kdJurusan" required readonly value="<?= session('kdJurusan') ?>">
                                <div class="invalid-feedback">
                                    Mohon Jurusan Diisi
                                </div>


                            </div>
                        </div>
                        <div class="form-divider">
                            Pointer Wawancara
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-1" style="margin-right: -50px;">
                                    <span>1.</span>
                                </div>
                                <div class="col">
                                    <label class="d-block">Jika Siswa/Siswi diterima sebagai peserta didik di SMA / SMK Prestasi Prima, apakah siap untuk menaati seluruh peraturan?? contoh: tidak boleh memakai celana pensil, rambut panjang, memakai aksesoris (gelang), make-up berlebihan, membolos/terlambat, merokok/tawuran dan lain lain</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan1" id="iya" value="iya" required <?php if ($pointSiswa->peraturan1 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan1" id="tidak" value="tidak" <?php if ($pointSiswa->peraturan1 == 'tidak') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                        <label class="form-check-label" for="inlineradio2">Tidak</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Field Wajib Diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1" style="margin-right: -50px;">
                                <span>2.</span>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="d-block">Jika Siswa/Siswi diterima sebagai peserta didik, Apakah siap untuk untuk menunjukkan prestasi belajar ?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan2" id="iya" value="iya" required <?php if ($pointSiswa->peraturan2 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan2" id="tidak" value="tidak" <?php if ($pointSiswa->peraturan2 == 'tidak') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                        <label class="form-check-label" for="inlineradio2">Tidak</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Field Wajib Diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1" style="margin-right: -50px;">
                                <span>3.</span>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="d-block">Menurut Kamu, Apakah orangtuamu mendukung untuk kegiatan sekolah : (KBM rutin, Ekstrakurikuler, PKL, Kunjungan Industri, Keagamaan DLL</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan3" id="iya" value="iya" required <?php if ($pointSiswa->peraturan3 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan3" id="tidak" value="tidak" <?php if ($pointSiswa->peraturan3 == 'tidak') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                        <label class="form-check-label" for="inlineradio2">Tidak</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Field Wajib Diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1" style="margin-right: -50px;">
                                <span>4.</span>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="d-block">Jika Siswa/Siswi diterima sebagai peserta didik, Apakah siap untuk untuk mengikuti ekstrakurikuler yang ada ?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan4" id="iya" value="iya" required <?php if ($pointSiswa->peraturan4 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peraturan4" id="tidak" value="tidak" <?php if ($pointSiswa->peraturan4 == 'tidak') {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                        <label class="form-check-label" for="inlineradio2">Tidak</label>
                                    </div>
                                    <div class="invalid-feedback">
                                        Field Wajib Diisi
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($pointSiswa->status == 'sudah') { ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md" disabled>
                                    <i class="fas fa-check"></i> Data Sudah Tersimpan
                                </button>
                            </div>
                        <?php } else { ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    Simpan
                                </button>
                            </div>
                        <?php } ?>
                    </form>
                </div>
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

<?= $this->endSection(); ?>