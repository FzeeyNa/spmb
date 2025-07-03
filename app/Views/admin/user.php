<?= $this->extend('admin/template/tema'); ?>
<?= $this->section('konten'); ?>
<section class="section">
    <div class="section-header">

        <button type="button" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="far fa-edit"></i> Tambah Data
        </button>

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('admin') ?>">Beranda</a></div>

            <div class="breadcrumb-item">Manajemen User</div>
        </div>


    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Manajemen Data Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-sm" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama User</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <?php foreach ($idUser as $row) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nmUser']; ?></td>
                                        <td><?= $row['username']; ?></td>
                                        <td><?= $row['level']; ?></td>
                                        <td>
                                            <span class="badge badge-<?php if (($row['status']) == "aktif") {
                                                                            echo "success";
                                                                        } else {
                                                                            echo "danger";
                                                                        } ?>"><?= $row['status']; ?></span>
                                        </td>
                                        <td>
                                            <a href="#" data-href="<?= base_url('user/delete') . "/" . $row['idUser'] ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#konfirmasi_hapus"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Hapus"></i> Hapus</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary update" data-toggle="modal" data-target="#editdatauser" data-idUser="<?= $row['idUser'] ?>" data-nmUser="<?= $row['nmUser'] ?>" data-username="<?= $row['username'] ?>" data-status="<?= $row['status'] ?>" data-level="<?= $row['level'] ?>" data-created_at="<?= $row['created_at'] ?>">
                                                <i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> Edit
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
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-edit"></i> Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/save') ?>" method="POST" class="needs-validation" novalidate="">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label for="namauser" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nmUser" placeholder="Nama Lengkap" name="nmUser" required>
                                <div class="invalid-feedback">
                                    Mohon Nama Disi
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control <?= ($validasi->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" placeholder="username" name="username" value="<?= old('username') ?>" required>
                                <div class="invalid-feedback">
                                    <?php if ($validasi->hasError('username') == true) {
                                        echo $validasi->getError('username');
                                    } else {
                                        echo 'Mohon Username Diisi';
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Password" name="password" required>
                                <div class="invalid-feedback">
                                    Mohon Password Disi
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="level" required>

                                    <option value="admin" selected>Admin</option>
                                    <option value="verifikator">Verifikator</option>
                                </select>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="editdatauser">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="far fa-edit"></i> Edit Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('user/edit') ?>" class="needs-validation" novalidate="" method="POST">
                        <?= csrf_field(); ?>
                        <div class="form-group row">

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="idUser_u" placeholder="idUser" name="idUser" readonly hidden>
                                <input type="text" class="form-control" id="created_at_u" placeholder="created_at" name="created_at" readonly hidden>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namauser" class="col-sm-3 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nmUser_u" placeholder="Nama Lengkap" name="nmUser" required>
                                <div class="invalid-feedback">
                                    Mohon Nama Lengkap Diisi
                                </div>
                            </div>
                        </div>

                        <input type="text" class="form-control" id="username_u" placeholder="username" name="username" required readonly hidden>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Ganti Password</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="password_u" name="password" required>
                                <div class="invalid-feedback">
                                    Mohon Password Disi
                                </div>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-control form-control-sm" name="level" required>
                                    <option value="" selected>Pilih Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="verifikator">Verifikator</option>
                                </select>
                                <div class="invalid-feedback">
                                    Mohon Level Dipilih
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
            var idUser = $(this).attr("data-idUser");
            var nmUser = $(this).attr("data-nmUser");
            var username = $(this).attr("data-username");
            var created_at = $(this).attr("data-created_at");

            $('#idUser_u').val(idUser);
            $('#nmUser_u').val(nmUser);
            $('#username_u').val(username);
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
        <?php if (session()->getFlashdata('userSimpan')) { ?>
            iziToast.success({
                title: 'Berhasil!',
                message: 'Data Berhasil Disimpan',
                position: 'topRight'
            });

        <?php } ?>
        <?php if (session()->getFlashdata('userEdit')) { ?>
            iziToast.info({
                title: 'Berhasil!',
                message: 'Data Berhasil Diubah',
                position: 'topRight'
            });

        <?php } ?>
        <?php if (session()->getFlashdata('userHapus')) { ?>
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
            if (<?= $validasi->hasError('username'); ?> == true) {
                $('#exampleModal').modal('show');
            }
        });
    </script>
    <?= $this->endSection(); ?>