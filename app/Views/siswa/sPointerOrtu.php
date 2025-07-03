<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Pointer Wawancara Orang Tua</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/siswa/dashboard') . '/' . base64_encode(session('idPendaftar')); ?>">Beranda</a></div>
        <div class="breadcrumb-item">Pointer Orang Tua Calon Siswa</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Hi, <?= session('nmPendaftar'); ?></h2>
    <p class="section-lead">
        Proses pengisian wajib di lakukan oleh Orang Tua / Wali Murid
    </p>
    <div class="row mt-sm-4 justify-content-center">
        <div class="col-12 col-md-12 col-lg-10">
            <div class="card card-primary">
                <div class="card-header justify-content-center">
                    <h4>Pointer Wawancara Orang Tua</h4>
                </div>
                <div class="card-body">

                    <form id="form-register" action="<?= base_url('siswa/simpanPointerOrtu/') ?>" method="POST" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>

                        <input type="text" class="form-control" name="idPendaftar" value="<?= session('idPendaftar') ?>" id="idPendaftar" hidden>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Nomor Formulir</label>
                                <input type="text" class="form-control" name="noFormulir" id="noFormulir" value="<?= session('noFormulir') ?>" readonly required>
                                <div class="invalid-feedback">
                                    Mohon No Formulir Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nama Siswa</label>
                                <input type="text" class="form-control" name="nmPendaftar" id="nmPendaftar" required readonly value="<?= session('nmPendaftar') ?>">
                                <div class="invalid-feedback">
                                    Mohon Nama Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nama Ayah</label>
                                <input type="text" class="form-control" name="nmAyah" id="nmAyah" required value="<?php if ($pointOrtu->nmAyah != null) {
                                                                                                                        echo $pointOrtu->nmAyah;
                                                                                                                    } ?>">
                                <div class="invalid-feedback">
                                    Mohon Nama Ayah Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nama Ibu</label>
                                <input type="text" class="form-control" name="nmIbu" id="nmIbu" required value="<?php if ($pointOrtu->nmIbu != null) {
                                                                                                                    echo $pointOrtu->nmIbu;
                                                                                                                } ?>">
                                <div class="invalid-feedback">
                                    Mohon Nama Ibu Diisi
                                </div>
                            </div>

                            <div class="form-group col-6">
                                <label for="first_name">Nomor HP Ayah</label>
                                <input type="text" class="form-control" name="hpOrtu1" required value="<?php if ($pointOrtu->hpOrtu1 != null) {
                                                                                                            echo $pointOrtu->hpOrtu1;
                                                                                                        } ?>">
                                <div class="invalid-feedback">
                                    Mohon No HP Diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="first_name">Nomor HP Ibu</label>
                                <input type="text" class="form-control" name="hpOrtu2" required value="<?php if ($pointOrtu->hpOrtu2 != null) {
                                                                                                            echo $pointOrtu->hpOrtu2;
                                                                                                        } ?>">
                                <div class="invalid-feedback">
                                    Mohon No HP Diisi
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
                                    <label class="d-block">Apakah Orang Tua Calon Siswa siap memberikan perhatian dan pengawasan terhadap tata tertib peserta didik dan kedisiplinan sehari-hari, contoh: tidak boleh memakai celana pensil, rambut panjang, membolos/terlambat, merokok/tawuran dan lain lain :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan1" id="iya" value="iya" required <?php if ($pointOrtu->pertanyaan1 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>

                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan1" id="tidak" value="tidak" <?php if ($pointOrtu->pertanyaan1 == 'tidak') {
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
                                    <label class="d-block">Apakah orang tua siap memberikan dukungan terhadap kegiatan sekolah : (KBM rutin, Ekstrakurikuler, PKL, Kunjungan Industri, Keagamaan DLL)</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan2" id="iya" value="iya" required <?php if ($pointOrtu->pertanyaan2 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan2" id="tidak" value="tidak" <?php if ($pointOrtu->pertanyaan2 == 'tidak') {
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
                                    <label class="d-block">Jika Calon Siswa sudah diterima sebagai peserta didik dan belajar di SMA/SMK Prestasi Prima, maka akan mendukung dan mematuhi semua aturan tata tertib, termasuk membayar iuran bulanan paling lambat 10 setiap bulannya?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan3" id="iya" value="iya" required <?php if ($pointOrtu->pertanyaan3 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan3" id="tidak" value="tidak" <?php if ($pointOrtu->pertanyaan3 == 'tidak') {
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
                                    <label class="d-block">Jika Siswa melanggar tata tertib, khususnya yang berkaitan dengan masalah kehadiran, maka pihak sekolah akan mengundang orangtua/wali untuk secara bersama melakukan pembinaan. Apakah orang tua siap?</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan4" id="iya" value="iya" required <?php if ($pointOrtu->pertanyaan4 == 'iya') {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                        <label class="form-check-label" for="inlineradio1">Iya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pertanyaan4" id="tidak" value="tidak" <?php if ($pointOrtu->pertanyaan4 == 'tidak') {
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
                        <?php if ($pointOrtu->status == 'sudah') { ?>
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