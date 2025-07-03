<?= $this->extend('admin/template/tema'); ?>
<?= $this->section('konten'); ?>
<section class="section">
    <div class="section-header">

        <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#tambahdatajurusan">
            <i class="far fa-edit"></i> Tambah Data
        </button>




    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Jurusan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Jurusan</th>
                                    <th>Nama Jurusan</th>
                                    <th>Instansi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <?php foreach ($kdJurusan as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['kdJurusan']; ?></td>
                                        <td><?= $row['nmJurusan']; ?></td>
                                        <td><?= $row['instansi']; ?></td>
                                        <td>
                                            <span class="badge badge-<?php if (($row['status']) == "aktif") {
                                                                            echo "success";
                                                                        } else {
                                                                            echo "danger";
                                                                        } ?>"><?= $row['status']; ?></span>
                                        </td>
                                        <td>
                                            <a href="#" data-href="<?= base_url('jurusan/delete') . "/" . $row['kdJurusan'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#konfirmasi_hapus"><i class="fas fa-trash-alt"></i> Hapus</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary update" data-toggle="modal" data-target="#editdatajurusan" data-kdJurusan="<?= $row['kdJurusan'] ?>" data-nmJurusan="<?= $row['nmJurusan'] ?>" data-instansi="<?= $row['instansi'] ?>" data-kuota="<?= $row['kuota'] ?>" data-status="<?= $row['status'] ?>" data-created_at="<?= $row['created_at'] ?>">
                                                <i class="fas fa-edit    "></i> Edit
                                            </button>
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
    <?= $this->section('modal'); ?>
    <!-- manajemen user, tambah data user-->
    <div class="modal fade" tabindex="-1" role="dialog" id="tambahdatajurusan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-edit"></i> Tambah Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jurusan/save') ?>" method="POST" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="kdJurusan" class="col-sm-3 col-form-label">Kode Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validasi->hasError('kdJurusan')) ? 'is-invalid' : ''; ?>" id="kdJurusan" placeholder="Kode Jurusan" name="kdJurusan" required value="<?= old('kdJurusan') ?>">
                                <div class="invalid-feedback">
                                    <?php if ($validasi->hasError('kdJurusan') == true) {
                                        echo $validasi->getError('kdJurusan');
                                    } else {
                                        echo 'Mohon Kode Jurusan Diisi';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nmJurusan" class="col-sm-3 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nmJurusan" placeholder="Nama Jurusan" name="nmJurusan" required>
                                <div class="invalid-feedback">
                                    Mohon Nama Jurusan Diisi
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="nmJurusan" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="instansi" placeholder="Instansi" name="instansi" required>
                                <div class="invalid-feedback">
                                    Mohon Instansi Diisi
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">kuota</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="inputkuota3" placeholder="kuota" name="kuota" required>
                                <div class="invalid-feedback">
                                    Mohon kuota Disi
                                </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit data user -->

    <div class="modal fade" tabindex="-1" role="dialog" id="editdatajurusan">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-edit"></i> Edit Data Jurusan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('jurusan/edit') ?>" class="needs-validation" novalidate="" method="POST">
                        <?= csrf_field(); ?>
                        <div class="form-group row">

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kdJurusan_u" placeholder="kdJurusan" name="kdJurusan" readonly hidden>
                                <input type="text" class="form-control" id="created_at_u" placeholder="created_at" name="created_at" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namauser" class="col-sm-3 col-form-label">Nama Jurusan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nmJurusan_u" placeholder="Nama Jurusan" name="nmJurusan" required>
                                <div class="invalid-feedback">
                                    Mohon Nama Jurusan Diisi
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="instansi" class="col-sm-3 col-form-label">Instansi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="instansi_u" placeholder="Instansi" name="instansi" required>
                                <div class="invalid-feedback">
                                    Mohon Instansi Diisi
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Kuota</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kuota_u" name="kuota" required>
                                <div class="invalid-feedback">
                                    Mohon Kuota Disi
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="status" required>
                                    <option value="" selected>Pilih Status</option>
                                    <option value="aktif">Aktif</option>
                                    <option value="tidak aktif">Tidak Aktif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Mohon Status Dipilih
                                </div>
                            </div>
                        </div>


                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>

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



    <?= $this->endSection(); ?>
    <?= $this->section('jquery'); ?>

    <script>
        $(document).ready(function() {
            $('#table-1').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>

    <script>
        $(document).on('click', '.update', function(e) {
            var kdJurusan = $(this).attr("data-kdJurusan");
            var nmJurusan = $(this).attr("data-nmJurusan");
            var instansi = $(this).attr("data-instansi");
            var kuota = $(this).attr("data-kuota");
            var created_at = $(this).attr("data-created_at");

            $('#kdJurusan_u').val(kdJurusan);
            $('#nmJurusan_u').val(nmJurusan);
            $('#instansi_u').val(instansi);
            $('#kuota_u').val(kuota);
            $('#created_at_u').val(created_at);


        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>

    <!-- alert management user -->
    <script>
        <?php if (session()->getFlashdata('jurusanSimpan')) { ?>
            iziToast.success({
                title: 'Berhasil!',
                message: 'Data Berhasil Disimpan',
                position: 'topRight'
            });

        <?php } ?>
        <?php if (session()->getFlashdata('jurusanEdit')) { ?>
            iziToast.info({
                title: 'Berhasil!',
                message: 'Data Berhasil Diubah',
                position: 'topRight'
            });

        <?php } ?>
        <?php if (session()->getFlashdata('jurusanHapus')) { ?>
            iziToast.error({
                title: 'Berhasil!',
                message: 'Data Berhasil Dihapus',
                position: 'topRight'
            });

        <?php } ?>
    </script>

    <!-- validasi -->
    <!-- jika ada username yang sama maka modal muncul -->
    <script>
        $(document).ready(function() {
            if (<?= $validasi->hasError('kdJurusan'); ?> == true) {
                $('#tambahdatajurusan').modal('show');
            }
        });
    </script>
    <?= $this->endSection(); ?>