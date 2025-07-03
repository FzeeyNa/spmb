<?= $this->extend("verifikator/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Data Pendaftar PPDB Online</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('verifikator') ?>">Beranda</a></div>
        <div class="breadcrumb-item"><a href="#">Data Pendaftar</a></div>
    </div>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #1597E5;">
                    <i class="fas fa-users" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Pendaftar</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $pend; ?> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #FF8243;">
                    <i class="fas fa-book-reader" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendaftar SMK</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $smk; ?> </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon shadow-secondary" style="background-color: #610094;">
                    <i class="fas fa-flask" style="font-size: 35px;"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Pendaftar SMA</h4>
                    </div>
                    <div class="card-body" style="font-size: 25px;">
                        <?= $sma; ?> </div>
                </div>
            </div>
        </div>
        <!--<div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Data Transaksi</h4>
                </div>
                <div class="card-body">
                    0                </div>
            </div>
        </div>
    </div>-->

    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Data Pendaftar SMK dan SMA</h2>
    <p class="section-lead">Berikut merupakan semua pendaftar pada website.</p>
</div>

<div class="row">

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                 <div class="row justify-content-end mb-1 mr-1">
                   <a href="<?= base_url('verifikator/printPendaftar')?>"> <button class="btn btn-sm btn-info float-end mr-1" id="print"><i class="fas fa-print" data-toggle="tooltip" data-placement="top" title="Print"></i> </button></a> <a href="<?= base_url('verifikator/exportPendaftar'); ?>"><button class="btn btn-sm btn-success float-end mr-1" id="excel"><i class="fas fa-file-excel" data-toggle="tooltip" data-placement="top" title="Download Excel"></i> </button></a> <button class="btn btn-sm btn-primary float-end" id="refresh"><i class="fas fa-sync-alt" data-toggle="tooltip" data-placement="top" title="Refresh"></i> </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-sm" id="table-1">
                        <thead class="bg-primary" style="color: white;">
                            <tr>
                                <th class="text-center">
                                    #
                                </th>
                                <th>ID Pendaftar</th>
                                 <th>No Formulir</th>
                                <th>Nama Pendaftar</th>
                                <th>Asal Sekolah</th>
                               
                                <!--<th>No Siswa</th>-->
                                <!--<th>No Ortu</th>-->
                                <th>Pilihan Sekolah</th>
                                <th>Jurusan</th>
                                <th width="15%">Tgl Daftar</th>
                                <th>No Siswa</th>
                                <th>No Ortu</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            ?>
                            <?php foreach ($idPendaftar as $baris) : ?>
                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $baris['idPendaftar'] ?></td>
                                    <td class="align-middle"><?= $baris['noFormulir'] ?></td>
                                    <td class="align-middle"><?= $baris['nmPendaftar'] ?></td>
                                    <td class="align-middle"><?= $baris['asalSekolah'] ?></td>
                                       
                                    <!-- <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/62<?php //$baris['hp'] 
                                                                                                                                        ?>" target="_blank"><?php //$baris['hp'] 
                                                                                                                                                            ?></a></td>
                                    <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/62<?php //$baris['hpOrtu'] 
                                                                                                                                    ?>" target="_blank"><?php //$baris['hpOrtu'] 
                                                                                                                                                        ?></a></td> -->
                                                                                                                             
                                                                                                                                                        
                                    <td class="align-middle"><?= $baris['sekolah'] ?></td>
                                    <td class="align-middle"><?= $baris['kdJurusan'] ?></td>
                                    <td class="align-middle"><?php $date = new DateTime($baris['created_at']);
                                                                echo $date->format('d-m-Y'); ?></td>
                                                                <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/<?= $baris['hp'] ?>" target="_blank"><?php $pot = substr($baris['hp'], 0, 5);
                                                                                                                                                                        echo $pot . "xxx";  ?></a></td>
                                    <td class="align-middle"><i class="fab fa-whatsapp text-success"></i> <a href="https://wa.me/<?= $baris['hpOrtu'] ?>" target="_blank"><?php $pot = substr($baris['hpOrtu'], 0, 5);
                                                                                                                                                                            echo $pot . "xxx";  ?></a></td>
                                    <td class="align-middle">
                                        <span class="badge badge-<?php if ($baris['status'] == 'belum') {
                                                                        echo 'danger';
                                                                    } else
                                                                    if ($baris['status'] == 'pending') {
                                                                        echo 'warning';
                                                                    } else if ($baris['status'] == 'sudah formulir' and $baris['statusdu']=='belum') {
                                                                        echo 'info';
                                                                    } else {
                                                                        echo 'success';
                                                                    } ?>"><?php if($baris['statusdu'] == 'lunas' || $baris['statusdu'] == 'pending' || $baris['statusdu']=='cicil' ){ echo $baris['statusdu'];}else if($baris['status'] == 'sudah formulir'){
                                                                    echo 'formulir';}else{
                                                                    echo $baris['status'];} ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="#" class="btn btn-success btn-sm details mb-2" data-toggle="modal" data-target="#detailsPendaftar" data-idPendaftar="<?= $baris['idPendaftar'] ?>" data-nmPendaftar="<?= $baris['nmPendaftar'] ?>" data-asalSekolah="<?= $baris['asalSekolah'] ?>" data-hp="<?= $baris['hp'] ?>" data-email="<?= $baris['email'] ?>" data-tempatLahir="<?= $baris['tempatLahir'] ?>" data-tglLahir="<?= $baris['tglLahir'] ?>" data-ket="<?= $baris['ket'] ?>" data-sekolah="<?= $baris['sekolah'] ?>" data-kdJurusan="<?= $baris['kdJurusan'] ?>" data-created_at="<?= $baris['created_at'] ?>" data-agama="<?= $baris['agama'] ?>" data-alamat="<?= $baris['alamat'] ?>" data-hpOrtu="<?= $baris['hpOrtu'] ?>">
                                            <i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Details"></i></a>



                                        <a href="#" class="btn btn-warning btn-sm edit mb-2" data-toggle="modal" data-target="#editPendaftar" data-idPendaftar="<?= $baris['idPendaftar'] ?>" data-nmPendaftar="<?= $baris['nmPendaftar'] ?>" data-asalSekolah="<?= $baris['asalSekolah'] ?>" data-hp="<?= $baris['hp'] ?>" data-hpOrtu="<?= $baris['hpOrtu'] ?>" data-email="<?= $baris['email'] ?>" data-tempatLahir="<?= $baris['tempatLahir'] ?>" data-tglLahir="<?= $baris['tglLahir'] ?>" data-ket="<?= $baris['ket'] ?>" data-sekolah="<?= $baris['sekolah'] ?>" data-kdJurusan="<?= $baris['kdJurusan'] ?>" data-created_at="<?= $baris['created_at'] ?>" data-agama="<?= $baris['agama'] ?>" data-alamat="<?= $baris['alamat'] ?>" data-hpOrtu="<?= $baris['hpOrtu'] ?>"> <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>

                                        <a href="#" class="btn btn-info btn-sm edit mb-2" data-toggle="modal" data-target="#gantiPassword" data-idPendaftar="<?= $baris['idPendaftar'] ?>" data-nmPendaftar="<?= $baris['nmPendaftar'] ?>" data-asalSekolah="<?= $baris['asalSekolah'] ?>" data-hp="<?= $baris['hp'] ?>" data-email="<?= $baris['email'] ?>" data-tempatLahir="<?= $baris['tempatLahir'] ?>" data-tglLahir="<?= $baris['tglLahir'] ?>" data-ket="<?= $baris['ket'] ?>" data-sekolah="<?= $baris['sekolah'] ?>" data-kdJurusan="<?= $baris['kdJurusan'] ?>" data-created_at="<?= $baris['created_at'] ?>" data-agama="<?= $baris['agama'] ?>" data-alamat="<?= $baris['alamat'] ?>" data-hpOrtu="<?= $baris['hpOrtu'] ?>"> <i class="fas fa-cog" data-toggle="tooltip" data-placement="top" title="Ganti Password"></i></a>


                                        <a href="<?= base_url('verifikator/konfirmasi?keyword=').$baris['idPendaftar']?>" id="tes" class="btn btn-primary btn-sm update mb-2"> <i class="fas fa-check-square" data-toggle="tooltip" data-placement="top" title="Konfirmasi" style="font-size: 16px;"></i></a>



                                    </td>
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
<!-- modal edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="editPendaftar">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i>Details Calon Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card profile-widget card-primary">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url(); ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">

                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label" style="font-size: 14px;"><strong> Status Pendaftaran</strong></div>
                                <div class="profile-widget-item-value"><span class="badge badge-warning" id="status_u">Belum Membeli Formulir</span></div>
                            </div> -->

                        </div>


                    </div>
                    <div class="profile-widget-description">
                        <form action="<?= base_url('verifikator/edit') ?>" method="POST" class="needs-validation" novalidate="">
                            <?= csrf_field(); ?>
                            <div class="row">



                                <input type="text" class="form-control" id="idPendaftar_e" name="idPendaftar" hidden>


                                <div class="form-group col-4">
                                    <label for="first_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nmPendaftar_e" name="nmPendaftar">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Asal Sekolah</label>
                                    <input type="text" class="form-control" id="asalSekolah_e" name="asalSekolah">
                                </div>
                                <div class="form-group col-4">
                                    <label for="first_name">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempatLahir_e" name="tempatLahir">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tglLahir_e" name="tglLahir">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Hp Siswa</label>
                                    <input type="text" class="form-control" id="hp_e" name="hp">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Email</label>
                                    <input type="text" class="form-control" id="email_e" name="email">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Hp Ortu</label>
                                    <input type="text" class="form-control" id="hpOrtu_e" name="hpOrtu">
                                </div>
                                <div class="form-group col-8">
                                    <label for="last_name">Alamat</label>
                                    <input type="text" class="form-control" id="alamat_e" name="alamat">
                                </div>


                                <input type="text" class="form-control" id="ket_e" name="ket" hidden>



                                <input type="text" class="form-control" id="created_at_e" hidden name="created_at">

                            </div>

                            <div class="row">
                                <div class="form-group col-4">
                                    <label for="last_name">Agama</label>
                                    <input type="text" class="form-control" id="agama_e" name="agama">
                                </div>
                                <div class="form-group col-4">
                                    <label for="first_name">Instansi</label>
                                    <input type="text" class="form-control" id="sekolah_e" name="sekolah">
                                </div>
                                <div class="form-group col-4">
                                    <label for="last_name">Jurusan</label>
                                    <input type="text" class="form-control" id="kdJurusan_e" name="kdJurusan">
                                </div>


                            </div>

                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<!-- modal ganti password -->
<div class="modal fade" tabindex="-1" role="dialog" id="gantiPassword">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i>Ganti Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card profile-widget card-primary">

                    <div class="profile-widget-description">
                        <form action="<?= base_url('verifikator/gantiPassword') ?>" method="POST" class="needs-validation" novalidate="">
                            <?= csrf_field(); ?>
                            <div class="row">



                                <input type="text" class="form-control" id="idPendaftar_g" name="idPendaftar" hidden>


                                <div class="form-group col-md-12">
                                    <label for="first_name">Password Baru</label>
                                    <input type="text" class="form-control" id="password" name="password" pattern=".{6,}" required title="Password Minimal 6 Karakter">
                                    <div class="invalid-feedback">
                                        Password Minimal 6 Karakter
                                    </div>
                                </div>
                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">
                                    Simpan
                                </button>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>


<!-- modal details -->
<div class="modal fade" tabindex="-1" role="dialog" id="detailsPendaftar">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="far fa-trash"></i>Details Calon Pendaftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card profile-widget card-primary">
                    <div class="profile-widget-header">
                        <img alt="image" src="<?= base_url(); ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">

                            <!-- <div class="profile-widget-item">
                                <div class="profile-widget-item-label" style="font-size: 14px;"><strong> Status Pendaftaran</strong></div>
                                <div class="profile-widget-item-value"><span class="badge badge-warning" id="status_u">Belum Membeli Formulir</span></div>
                            </div> -->

                        </div>


                    </div>
                    <div class="profile-widget-description">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="first_name">ID Pendaftar</label>
                                <input type="text" class="form-control" id="idPendaftar_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="first_name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nmPendaftar_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Asal Sekolah</label>
                                <input type="text" class="form-control" id="asalSekolah_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="first_name">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempatLahir_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Tanggal Lahir</label>
                                <input type="text" class="form-control" id="tglLahir_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">No Siswa</label>
                                <input type="text" class="form-control" id="hp_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Email</label>
                                <input type="text" class="form-control" id="email_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Agama</label>
                                <input type="text" class="form-control" id="agama_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">No Ortu</label>
                                <input type="text" class="form-control" id="hpOrtu_u" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="last_name">Tanggal Daftar</label>
                                <input type="text" class="form-control" id="created_at_u" readonly>
                            </div>
                            <div class="form-group col-8">
                                <label for="last_name">Alamat</label>
                                <input type="text" class="form-control" id="alamat_u" readonly>
                            </div>
                        </div>
                        <div class="form-divider">
                            Pilihan Sekolah & Jurusan
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Instansi</label>
                                <input type="text" class="form-control" id="sekolah_u" readonly>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Jurusan</label>
                                <input type="text" class="form-control" id="kdJurusan_u" readonly>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



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



<!-- modal details -->

<?= $this->endSection(); ?>
<?= $this->section('jquery'); ?>
<script>
    <?php if (session()->getFlashdata('pendaftarHapus')) { ?>
        iziToast.error({
            title: 'Berhasil!',
            message: 'Data Berhasil Dihapus',
            position: 'topRight'
        });

    <?php } ?>
</script>
<script>
    <?php if (session()->getFlashdata('pendaftarEdit')) { ?>
        iziToast.info({
            title: 'Berhasil!',
            message: 'Data Berhasil Diubah',
            position: 'topRight'
        });

    <?php } ?>
</script>

<script>
    $(document).ready(function() {
        $('#table-1').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
             "iDisplayLength" : 25,  


        });
    });
    $('#refresh').click(function() {
        location.reload();
    });

    $(document).ready(function() {
        $('#table-2').DataTable({
            "paging": true,
            "ordering": true,
            "info": true
        });
    });
</script>

<script>
    $(document).on('click', '.details', function(e) {
        var idPendaftar = $(this).attr("data-idPendaftar");
        var nmPendaftar = $(this).attr("data-nmPendaftar");
        var asalSekolah = $(this).attr("data-asalSekolah");
        var tglLahir = $(this).attr("data-tglLahir");
        var tempatLahir = $(this).attr("data-tempatLahir");
        var agama = $(this).attr("data-agama");
        var hp = $(this).attr("data-hp");
        var email = $(this).attr("data-email");
        var ket = $(this).attr("data-ket");
        var created_at = $(this).attr("data-created_at");
        var sekolah = $(this).attr("data-sekolah");
        var kdJurusan = $(this).attr("data-kdJurusan");
        var alamat = $(this).attr("data-alamat");
        var hpOrtu = $(this).attr("data-hpOrtu");


        $('#idPendaftar_u').val(idPendaftar);
        $('#nmPendaftar_u').val(nmPendaftar);
        $('#asalSekolah_u').val(asalSekolah);
        $('#tglLahir_u').val(tglLahir);
        $('#tempatLahir_u').val(tempatLahir);
        $('#hp_u').val(hp);
        $('#email_u').val(email);
        $('#ket_u').val(ket);
        $('#created_at_u').val(created_at);
        $('#sekolah_u').val(sekolah);
        $('#kdJurusan_u').val(kdJurusan);
        $('#agama_u').val(agama);
        $('#alamat_u').val(alamat);
        $('#hpOrtu_u').val(hpOrtu);


    });
</script>

<script>
    $(document).on('click', '.edit', function(e) {
        var idPendaftar = $(this).attr("data-idPendaftar");
        var nmPendaftar = $(this).attr("data-nmPendaftar");
        var asalSekolah = $(this).attr("data-asalSekolah");
        var tglLahir = $(this).attr("data-tglLahir");
        var tempatLahir = $(this).attr("data-tempatLahir");
        var agama = $(this).attr("data-agama");

        var hp = $(this).attr("data-hp");
        var email = $(this).attr("data-email");
        var ket = $(this).attr("data-ket");
        var created_at = $(this).attr("data-created_at");
        var sekolah = $(this).attr("data-sekolah");
        var kdJurusan = $(this).attr("data-kdJurusan");
        var alamat = $(this).attr("data-alamat");
        var hpOrtu = $(this).attr("data-hpOrtu");

        $('#idPendaftar_e').val(idPendaftar);
        $('#idPendaftar_g').val(idPendaftar);
        $('#nmPendaftar_e').val(nmPendaftar);
        $('#asalSekolah_e').val(asalSekolah);
        $('#tglLahir_e').val(tglLahir);
        $('#tempatLahir_e').val(tempatLahir);
        $('#hp_e').val(hp);
        $('#email_e').val(email);
        $('#ket_e').val(ket);
        $('#created_at_e').val(created_at);
        $('#sekolah_e').val(sekolah);
        $('#kdJurusan_e').val(kdJurusan);
        $('#alamat_e').val(alamat);
        $('#hpOrtu_e').val(hpOrtu);
        $('#agama_e').val(agama);

    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>

<?= $this->endSection(); ?>