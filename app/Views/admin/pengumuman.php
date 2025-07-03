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
    <h2 class="section-title">Pengumuman</h2>
    <p class="section-lead">
        Pengumuman akan muncul di dashboard Siswa
    </p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tulis Pengumuman Baru</h4>
                </div>
                <div class="card-body">
                    <form id="myForm" action="<?= base_url('pengumuman/save') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="judul" required>
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
                                    <option value="ppdb">PPDB</option>
                                    <option value="homepage">Homepage</option>

                                </select>
                                <div class="invalid-feedback">
                                    Mohon Memilih Kategori
                                </div>
                            </div>

                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="form-control konten" rows="15" name="isi" required> </textarea>

                            </div>

                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                            <div class="col-sm-12 col-md-7">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="gambar" id="image-upload" />
                                </div>
                            </div>
                        </div>
                        <input type="text" name="author" value="<?= $_SESSION['nmUser'] ?>" hidden />
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="status" required>
                                    <option value="">Pilih</option>
                                    <option value="draft">Draft</option>
                                    <option value="publish">Publish</option>
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
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Manajemen Pengumuman</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-3">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Dibuat</th>
                                <th>Status</th>
                                <th>Author</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($query as $row) : ?>
                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $row['judul'] ?></td>
                                    <td class="align-middle" width="25%"><?php $teks = $row['isi'];
                                                                            echo substr($teks, 0, 50) . '...'; ?></td>
                                    <td class="align-middle"><?= $row['kategori'] ?></td>
                                    <td class="align-middle">
                                        <?php if ($row['gambar'] == null) {
                                            echo '';
                                        } else { ?>
                                            <div class="gallery ml-3">
                                                <div class="gallery-item" data-image="<?= base_url(); ?>/assets/assets/img/pengumuman/<?= $row['gambar'] ?>" data-title="Image 11"></div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td class="align-middle"><?php $date = new DateTime($row['created_at']);
                                                                echo $date->format('M d, Y'); ?></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['status'] == 'draft') {
                                                                                            echo 'warning';
                                                                                        } else {
                                                                                            echo 'success';
                                                                                        } ?>"><?= $row['status'] ?></span></td>


                                    <td class="align-middle"><?= $row['author'] ?></td>
                                    <td class="align-middle" width="10%"> <a href="<?= base_url('pengumuman/update') . "/" . $row['id']; ?>" class="btn btn-warning btn-sm update"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> <a href="" data-href="<?= base_url('pengumuman/delete') . "/" . $row['id'] ?>" c data-toggle="modal" data-target="#konfirmasi_hapus" class="btn btn-danger btn-sm"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
<?= $this->section('modal') ?>
<!-- tempat menyimpan modal -->
<!-- modal hapus -->
<div class="modal fade" tabindex="-1" role="dialog" id="konfirmasi_hapus">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i> Yakin ingin menghapus ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a type="submit" class="btn btn-danger btn-ok">Hapus</a>
            </div>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>


<?= $this->section('jquery'); ?>
<!-- tempat menyimpan javascript / jquery -->
<script>
    $(document).ready(function() {
        $('#table-3').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>
</script>

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

<script>
    <?php if (session()->getFlashdata('pengumumanBerhasil')) { ?>
        iziToast.success({
            title: 'Selamat!',
            message: 'Pengumuman Berhasil Ditambahkan',
            position: 'bottomRight'
        });
    <?php } ?>
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>



<?= $this->endSection(); ?>