<?= $this->extend("admin/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Pengumuman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>
        <div class="breadcrumb-item">Pengumuman</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Edit Pengumuman</h2>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pengumuman</h4>
                </div>
                <div class="card-body">
                    <form id="myForm" action="<?= base_url('pengumuman/edit') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <input type="text" class="form-control" name="id" value="<?= $idpeng->id; ?>" hidden>
                        <input type="text" class="form-control" name="old" value="<?= $idpeng->gambar; ?>" hidden>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" value="<?= $idpeng->judul; ?>" required>
                                <div class="invalid-feedback">
                                    Mohon Judul Diisi
                                </div>
                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="kategori" required>
                                    <option value="">Pilih</option>
                                    <option value="ppdb" <?php if ($idpeng->kategori == 'ppdb') {
                                                                echo 'selected';
                                                            } ?>>PPDB</option>
                                    <option value="homepage" <?php if ($idpeng->kategori == 'homepage') {
                                                                    echo 'selected';
                                                                } ?>>Homepage</option>

                                </select>
                                <div class="invalid-feedback">
                                    Mohon Memilih Kategori
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control konten" rows="15" name="isi" required><?= $idpeng->isi; ?> </textarea>

                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="gambar" id="image-upload" value="<?= $idpeng->gambar ?>" />
                                </div>
                            </div>
                        </div>
                        <input type="text" name="author" value="<?= $_SESSION['nmUser'] ?>" hidden />
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="status" required>
                                    <option value="">Pilih</option>
                                    <option value="draft" <?php if ($idpeng->status == 'draft') {
                                                                echo 'selected';
                                                            } ?>>Draft</option>
                                    <option value="publish" <?php if ($idpeng->status == 'publish') {
                                                                echo 'selected';
                                                            } ?>>Publish</option>
                                </select>
                                <div class="invalid-feedback">
                                    Mohon Status Dipilih
                                </div>
                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary" type="submit">Create Post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('modal') ?>




<?= $this->endSection(); ?>


<?= $this->section('jquery'); ?>
<!-- tempat menyimpan javascript / jquery -->

<script>
    <?php if ($validasi->hasError('gambar') == true) { ?>
        iziToast.error({
            title: 'Maaf!',
            message: 'Format Gambar yang didukung adalah png, jpg, jpeg dengan ukuran maksimal 1024Kb',
            position: 'bottomRight',
            timeOut: 8000
        });
    <?php } ?>
</script>
<?= $this->endSection(); ?>