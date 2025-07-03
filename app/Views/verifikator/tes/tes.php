<?= $this->extend("verifikator/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Tes Potensi Akademik</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('verifikator') ?>">Beranda</a></div>
        <div class="breadcrumb-item">Tes Potensi Akademik</div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Daftar Peserta Tes Potensi Akademik</h2>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <div class="row justify-content-end mb-1 mr-1">
                   <a href="<?= base_url('verifikator/exportTPA'); ?>"><button class="btn btn-sm btn-success float-end mr-1" id="excel"><i class="fas fa-file-excel" data-toggle="tooltip" data-placement="top" title="Download Excel"></i> </button></a> <button class="btn btn-sm btn-primary float-end" id="refresh"><i class="fas fa-sync-alt" data-toggle="tooltip" data-placement="top" title="Refresh"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-3">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>No Formulir</th>
                                 <th>Password</th>
                                <th>Nama Pendaftar</th>
                                <th>Sekolah</th>
                                <th>Jurusan</th>
                                <th>Tanggal Tes</th>
                                 <th>No Siswa</th>
                                <th>No Ortu</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                      <td class="align-middle"><?= $row['password']; ?></td>
                                    <td class="align-middle"><?= $row['nmPendaftar']; ?></td>
                                    <td class="align-middle"><?= $row['sekolah']; ?></td>
                                    <td class="align-middle"><?= $row['kdJurusan']; ?></td>
                                    <td class="align-middle"><?= $row['tglTes']; ?></td>
                                     <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/<?= $row['hp'] ?>" target="_blank"><?php $pot = substr($row['hp'], 0, 5);
                                                                                                                                                                        echo $pot . "xxx";  ?></a></td>
                                    <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/<?= $row['hpOrtu'] ?>" target="_blank"><?php $pot = substr($row['hpOrtu'], 0, 5);
                                                                                                                                                                            echo $pot . "xxx";  ?></a></td>
                                    <td class="align-middle"><span class="badge badge-<?php if ($row['status'] == 'sudah') {
                                                                                            echo 'success';
                                                                                        } else {
                                                                                            echo 'danger';
                                                                                        } ?>"><?php if ($row['status'] == 'sudah tes') {
                                                                                                    echo  'sudah';
                                                                                                } else {
                                                                                                    echo $row['status'];
                                                                                                } ?></span></td>



                                    <td class="align-middle" width="10%"> <a href="#" class="btn btn-warning btn-sm update" data-toggle="modal" data-target="#editTes" data-noFormulir="<?= $row['noFormulir'] ?>" data-idPendaftar="<?= $row['idPendaftar'] ?>" data-nmPendaftar="<?= $row['nmPendaftar'] ?>" data-sekolah="<?= $row['sekolah'] ?>" data-kdJurusan="<?= $row['kdJurusan'] ?>" data-idKartu="<?= $row['idKartu'] ?>" data-status="<?= $row['status'] ?>"><i class="fas fa-pen" data-toggle="tooltip" data-placement="top" title="Konfirmasi"></i></a> <a href="<?= base_url('verifikator/printKartuTPA') . '/' . $row['noFormulir']; ?>" class="btn btn-sm btn-success" target="_blank"><i class="fas fa-download"></i></a></td>
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
             "iDisplayLength" : 25,  
        });
         $('#refresh').click(function() {
        location.reload();
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