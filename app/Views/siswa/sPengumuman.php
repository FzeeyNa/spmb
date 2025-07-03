<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Pengumuman</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('/siswa/dashboard') . '/' . base64_encode(session('idPendaftar')); ?>">Beranda</a></div>
        <div class="breadcrumb-item">Pengumuman</div>
    </div>
</div>
<?php foreach ($pengumuman as $baris) : ?>
    <div class="section-body">
        <h2 class="section-title"><?php $date = new DateTime($baris['updated_at']);
                                    echo $date->format('d F Y'); ?></h2>
        <div class="row">
            <div class="col-12">
                <div class="activities">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="activity-detail">
                            <div class="mb-2">
                                <span><i class="fas fa-clock"></i></span>
                                <span><?php $date = new DateTime($baris['updated_at']);
                                        echo $date->format('H:m'); ?></span>
                                &nbsp;&nbsp;
                                <span><i class="fas fa-user"></i></span>
                                <span><?= $baris['author']; ?></span>
                                <div class="float-right">

                                </div>
                            </div>
                            <?php if ($baris['gambar'] != null) { ?>
                                <div class="chocolat-parent">
                                    <a href="<?= base_url(); ?>/assets/assets/img/pengumuman/<?= $baris['gambar'] ?>" class="chocolat-image" title="Pengumuman PPDB Sekolah Prestasi Prima">
                                        <div data-crop-image="185" class="col-md-4">
                                            <img alt="image" src="<?= base_url(); ?>/assets/assets/img/pengumuman/<?= $baris['gambar'] ?>" class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            <?php } else {
                                echo '';
                            } ?>
                            <div class="readmore">
                                <?= $baris['isi']; ?>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<?= $this->endSection(); ?>
<?= $this->section('modal') ?>
<!-- tempat menyimpan modal -->


<?= $this->endSection(); ?>


<?= $this->section('jquery'); ?>
<!-- tempat menyimpan javascript / jquery -->
<script>
    $(document).ready(function() {
        $('#table-1').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.readmore').expander({
            slicePoint: 100,
            expandText: '...Lihat Selengkapnya',
            userCollapseText: ' ...ciutkan'
        });
    });
</script>

<?= $this->endSection(); ?>