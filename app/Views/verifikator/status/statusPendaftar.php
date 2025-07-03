<?= $this->extend("verifikator/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Status Pendaftaran Calon Siswa</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('verifikator') ?>">Beranda</a></div>
        <div class="breadcrumb-item">Status Pendaftaran</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Daftar Peserta PPDB 2022 - 2023</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-3">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Formulir</th>
                                <th>Jurusan</th>
                                <th>Nama</th>
                                <th>Formulir</th>
                                <th>TPA</th>
                                <th>Pointer Ortu</th>
                                <th>Pointer Siswa</th>
                                <th>Daftar Ulang</th>
                                <th>Follow Up</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($id as $row) : ?>
                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $row['noFormulir']; ?></td>
                                    <td class="align-middle"><?= $row['kdJurusan']; ?></td>
                                    <td class="align-middle"><?= $row['nmPendaftar']; ?></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['status'] == 'sudah formulir') {
                                                                                            echo 'success';
                                                                                        } else if ($row['status'] == 'pending') {
                                                                                            echo 'warning';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?>"><?php
                                                                                                if ($row['status'] == 'sudah formulir') {
                                                                                                    echo "<i class='fas fa-check-circle'></i> sudah";
                                                                                                } else {
                                                                                                    echo "<i class='fas fa-times-circle'></i> $row[status]";
                                                                                                }
                                                                                                ?></span></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['statusTes'] == 'sudah') {
                                                                                            echo 'success';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?>"><?php if ($row['statusTes'] == 'sudah') {
                                                                                                    echo "<i class='fas fa-check-circle'></i> sudah";
                                                                                                } else {
                                                                                                    echo "<i class='fas fa-times-circle'></i> $row[statusTes]";
                                                                                                } ?></span></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['statusPointOrtu'] == "sudah") {
                                                                                            echo 'success';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?>"><?php if ($row['statusPointOrtu'] == 'sudah') {
                                                                                                    echo "<i class='fas fa-check-circle'></i> sudah";
                                                                                                } else {
                                                                                                    echo "<i class='fas fa-times-circle'></i> $row[statusPointOrtu]";
                                                                                                } ?></span></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['statusPointSiswa'] == 'sudah') {
                                                                                            echo 'success';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?>"><?php if ($row['statusPointSiswa'] == 'sudah') {
                                                                                                    echo "<i class='fas fa-check-circle'></i> sudah";
                                                                                                } else {
                                                                                                    echo "<i class='fas fa-times-circle'></i> $row[statusPointSiswa]";
                                                                                                } ?></span></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['statusdu'] == 'belum') {
                                                                                            echo 'danger';
                                                                                        } else {
                                                                                            echo 'success';
                                                                                        } ?>"><?php if ($row['statusdu'] == 'belum') {
                                                echo "<i class='fas fa-times-circle'></i> belum";
                                            } else {
                                                echo "<i class='fas fa-check-circle'></i> sudah";
                                            } ?></span></td>
                                    <td class="align-middle"><a href="https://wa.me/<?= $row['hp']; ?>" target="_blank"><i class="fab fa-whatsapp-square
" style="color: #25d366; font-size:24px"></i></a></td>
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
<div class="modal fade" tabindex="-1" role="dialog" id="editTes">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-edit"></i> Konfirmasi Tes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?= base_url('verifikator/editTes') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <input class="form-control" type="text" name="idKartu" id="idKartu_e" hidden>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="last_name">Tanggal Tes</label>
                            <input id="last_name" type="text" class="form-control datetimepicker" name="tglTes" required>
                            <div class="invalid-feedback">
                                Field wajib diisi
                            </div>
                        </div>

                        <div class="form-group col-6">
                            <label class="d-block">Status</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="belum" value="belum">
                                <label class="form-check-label" for="inlineradio1">Belum</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="sudah" value="sudah">
                                <label class="form-check-label" for="inlineradio2">Sudah</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-divider">
                        Identitas Peserta Didik
                    </div>
                    <div class=" row">

                        <div class="form-group col-6">
                            <label for="first_name">No Formulir</label>
                            <input id="noFormulir_e" type="text" class="form-control" name="noFormulir" placeholder="Calon Siswa" readonly>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Nama Pendaftar</label>
                            <input id="nmPendaftar_e" type="text" class="form-control" name="nmPendaftar" placeholder="Asal Sekolah" readonly>
                        </div>
                    </div>
                    <div class=" row">

                        <div class="form-group col-6">
                            <label for="first_name">Sekolah</label>
                            <input id="sekolah_e" type="text" class="form-control" name="sekolah" placeholder="Calon Siswa" readonly>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Jurusan</label>
                            <input id="kdJurusan_e" type="text" class="form-control" name="kdJurusan" placeholder="Asal Sekolah" readonly>
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Konfirmasi
                        </button>
                    </div>

                </form>

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
            "info": true,
            "lengthMenu": [
                [20, 50, 100, 150, 200, -1],
                [20, 50, 100, 150, 200, "All"]
            ]
        });
    });
</script>




<script>
    <?php if (session()->getFlashdata('tesEdit')) { ?>
        iziToast.success({
            title: 'Yeayy!',
            message: 'Data Berhasil Diubah',
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
<script>
    $(document).on('click', '.update', function(e) {
        var noFormulir = $(this).attr("data-noFormulir");
        var nmPendaftar = $(this).attr("data-nmPendaftar");
        var kdJurusan = $(this).attr("data-kdJurusan");
        var sekolah = $(this).attr("data-sekolah");
        var idKartu = $(this).attr("data-idKartu");


        $('#noFormulir_e').val(noFormulir);
        $('#nmPendaftar_e').val(nmPendaftar);
        $('#kdJurusan_e').val(kdJurusan);
        $('#sekolah_e').val(sekolah);
        $('#idKartu_e').val(sekolah);


        var status = $(this).attr("data-status");
        var idPendaftar = $(this).attr("data-idPendaftar");
        $.ajax({
            url: "<?= base_url('tes/ambilStatus') ?>/" + idPendaftar,
            method: "GET",
            data: {
                status: status
            },
            dataType: "json",
            success: function(data) {
                if (status == 'belum') {
                    $("#belum").prop('checked', true);

                } else {
                    $("#sudah").prop('checked', true);
                }

            }
        })
    });
</script>


<?= $this->endSection(); ?>