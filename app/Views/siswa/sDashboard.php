<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Dashboard</h1>
</div>

<div class="section-body">
    <h2 class="section-title">Hi, <?= session('nmPendaftar'); ?></h2>
    <p class="section-lead">
        Segera lengkapi persyaratan dan bergabung bersama kami
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget card-primary">
                <div class="profile-widget-header">
                    <img alt="image" src="<?= base_url() ?>/tema/assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">

                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label" style="font-size: 14px;"><strong> Status Pendaftaran</strong></div>
                            <div class="profile-widget-item-value"><span class="badge badge-<?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                                echo 'success';
                                                                                            } else {
                                                                                                echo 'warning';
                                                                                            } ?>"><?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                                        echo 'Siswa Sekolah Prestasi Prima';
                                                                                                    } else {
                                                                                                        echo 'Calon Siswa';
                                                                                                    } ?></span></div>
                        </div>

                    </div>


                </div>
                <div class="profile-widget-description">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="first_name">Nama Lengkap</label>
                            <input id="first_name" type="text" class="form-control" name="nmPendaftar" value="<?= $aktifitas->nmPendaftar ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Asal Sekolah</label>
                            <input id="last_name" type="text" class="form-control" name="asalSekolah" value="<?= $aktifitas->asalSekolah ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="first_name">Tempat Lahir</label>
                            <input id="first_name" type="text" class="form-control" name="tempatLahir" value="<?= $aktifitas->tempatLahir ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Tanggal Lahir</label>
                            <input id="last_name" type="text" class="form-control" name="asalSekolah" value="<?= $aktifitas->tglLahir ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Jenis Kelamin</label>
                            <input id="last_name" type="text" class="form-control" name="jk" value="<?= $aktifitas->jk ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Tanggal Daftar</label>
                            <input id="last_name" type="text" class="form-control" name="created_at" value="<?= $aktifitas->created_at ?>" readonly>
                        </div>
                    </div>
                    <div class="form-divider">
                        Pilihan Sekolah & Jurusan
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="first_name">Instansi</label>
                            <input id="first_name" type="text" class="form-control" name="tempatLahir" value="<?= $aktifitas->sekolah ?>" readonly>
                        </div>
                        <div class="form-group col-6">
                            <label for="last_name">Jurusan</label>
                            <input id="last_name" type="text" class="form-control" name="asalSekolah" value="<?= $aktifitas->kdJurusan ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Nomor Formulir</label>
                        <input id="last_name" type="text" class="form-control" name="noFormulir" value="<?= $aktifitas->noFormulir ?>" readonly>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-12 col-md-12 col-lg-7" style="margin-top: 35px;">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Informasi Pendaftaran</h4>
                </div>
                <div class="activities ml-3 mt-2">
                    <div class="activity">
                        <div class="activity-icon bg-primary text-white shadow-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Mendaftar Akun dan Memilih Jurusan</span></strong>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-success" style="font-size:20px"></i>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- activity -->
                    <div class="activity">
                        <div class="activity-icon bg-<?php if ($aktifitas->status == 'pending' || $aktifitas->status == 'sudah formulir') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        } ?> text-white shadow-<?php if ($aktifitas->status == 'pending' || $aktifitas->status == 'sudah formulir') {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'secondary';
                                                                                } ?>">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Pembelian Formulir</strong></span>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->status == 'pending' || $aktifitas->status == 'sudah formulir') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                            </div>
                            <p>Status Verifikasi Pembelian Formulir : <span class="badge badge-<?php if ($aktifitas->status == 'pending') {
                                                                                                    echo 'warning';
                                                                                                } else if ($aktifitas->status == 'sudah formulir') {
                                                                                                    echo 'success';
                                                                                                } else {
                                                                                                    echo 'secondary';
                                                                                                } ?>"><?php if ($aktifitas->status == 'sudah formulir') {
                                                                                                            echo 'berhasil';
                                                                                                        } else {
                                                                                                            echo $aktifitas->status;
                                                                                                        } ?></span></p>
                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon bg-<?php if ($aktifitas->statusTes == 'sudah') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        } ?> text-white shadow-<?php if ($aktifitas->statusTes == 'sudah') {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'secondary';
                                                                                } ?>">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Tes Potensi Akademik</span></strong>

                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->statusTes == 'sudah') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                                <p>Menu TPA akan muncul ketika kalian sudah membeli formulir</p>
                            </div>

                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon bg-<?php if ($aktifitas->statusPointSiswa == 'sudah') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        } ?> text-white shadow-<?php if ($aktifitas->statusPointSiswa == 'sudah') {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'secondary';
                                                                                } ?>">
                            <i class="fas fa-id-card-alt"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Pointer Wawancara Calon Siswa</span></strong>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->statusPointSiswa == 'sudah') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon bg-<?php if ($aktifitas->statusPointOrtu == 'sudah') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        } ?> text-white shadow-<?php if ($aktifitas->statusPointOrtu == 'sudah') {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'secondary';
                                                                                } ?>">
                            <i class="fas fa-clipboard"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Pointer Wawancara Orang Tua</span></strong>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->statusPointOrtu == 'sudah') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="activity">
                        <div class="activity-icon text-white bg-<?php if ($aktifitas->statusdu == 'pending' || $aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                    echo 'primary';
                                                                } else {
                                                                    echo 'secondary';
                                                                } ?> shadow-<?php if ($aktifitas->statusdu == 'pending' || $aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                echo 'primary';
                                                                            } else {
                                                                                echo 'secondary';
                                                                            } ?>">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Daftar Ulang</span></strong>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->statusdu == 'pending' || $aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                            </div>
                            <p>Status Verifikasi Daftar Ulang : <span class="badge badge-<?php if ($aktifitas->statusdu == 'pending') {
                                                                                                echo 'warning';
                                                                                            } else if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                                echo 'success';
                                                                                            } else {
                                                                                                echo 'danger';
                                                                                            } ?>"><?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                                        echo 'Berhasil';
                                                                                                    } else {
                                                                                                        echo $aktifitas->statusdu;
                                                                                                    } ?></span></p>
                        </div>
                    </div>


                    <div class="activity">
                        <div class="activity-icon bg-<?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                            echo 'primary';
                                                        } else {
                                                            echo 'secondary';
                                                        } ?> text-white shadow-<?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'secondary';
                                                                                } ?>">
                            <i class="fas fa-bell"></i>
                        </div>
                        <div class="activity-detail col-md-10">
                            <div class="mb-2">
                                <span>
                                    <strong> Pendaftaran Selesai!</span></strong>
                                <div class="float-right">
                                    <i class="fas fa-check-circle text-<?php if ($aktifitas->statusdu == 'cicil' || $aktifitas->statusdu == 'lunas') {
                                                                            echo 'success';
                                                                        } else {
                                                                            echo 'secondary';
                                                                        } ?>" style="font-size:20px"></i>

                                </div>
                            </div>
                            <p>Selamat begabung, dikeluarga besar Sekolah Prestasi Prima</p>
                        </div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</div>


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