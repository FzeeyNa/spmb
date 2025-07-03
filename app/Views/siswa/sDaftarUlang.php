<?= $this->extend("siswa/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Pembayaran Daftar Ulang</h1>
</div>

<div class="section-body">
    <h2 class="section-title">Hi, <?= session('nmPendaftar'); ?></h2>
    <p class="section-lead">
        Halaman konfirmasi Daftar Ulang
    </p>
    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Konfirmasi Pembayaran Daftar Ulang</h4>
                </div>
                <div class="profile-widget-description mx-3">
                    <form id="myForm" action="<?= base_url('siswa/simpanDaftarUlang') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class=" row">
                            <input id="first_name" type="text" class="form-control" name="idPembayaran" value="<?= $id = date("his");
                                                                                                                $rand = rand(100, 999);
                                                                                                                echo $rand + $id; ?>" hidden>



                            <div class="form-group col-6">
                                <label for="first_name">ID Pendaftar</label>
                                <input id="first_name" type="text" class="form-control" name="idPendaftar" value="<?= $_SESSION['idPendaftar']; ?>" placeholder="Calon Siswa" readonly>
                                <div class="invalid-feedback">

                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Nama Pendaftar</label>
                                <input id="last_name" type="text" class="form-control" name="nmPendaftar" value="<?= session('nmPendaftar') ?>" placeholder="Asal Sekolah" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="first_name">No Formulir</label>
                            <input id="first_name" type="text" class="form-control" name="noFormulir" value="<?= $_SESSION['noFormulir']; ?>" readonly>
                            <div class="invalid-feedback">

                            </div>
                        </div>
                        <input id="last_name" type="text" class="form-control" name="hp" value="<?= session('hp') ?>" hidden>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="first_name">Jumlah Transfer</label>
                                <input id="rupiah" type="text" class="form-control" name="totalPembayaran" value="<?= $rereg_data['totalPembayaran']?>"  readonly>
                                <div class="invalid-feedback">
                                    Field wajib diisi
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label for="last_name">Tanggal Transfer</label>
                                <input id="last_name" type="text" class="form-control " name="tglPembayaran" value="<?= $rereg_data['invoice_payment_date']  != null ? date('d-m-Y H:i:s', strtotime($rereg_data['invoice_payment_date'])) : '' ?>" readonly>
                                <div class="invalid-feedback">
                                    Field wajib diisi
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                    <label for="last_name">Status Pembayaran</label>
                                    <input id="last_name" type="text" class="form-control" name="nmPendaftar" value="<?= $rereg_data['invoice_payment_status']  != null ? strtoupper($rereg_data['invoice_payment_status']) : 'BELUM DIBAYAR' ?>" placeholder="" readonly>
                                </div>
                        </div>
                        <div class="form-group" hidden>
                            <label for="last_name">Upload Bukti Transfer</label>
                            <input id="last_name" type="file" class="form-control" name="gbrBuktiBayar" required>
                            <div class="invalid-feedback">
                                Field wajib diisi
                            </div>
                            <div style="color:red">
                                Format gambar .jpg, .png dan .jpeg dan maksimal 1 Mb
                            </div>
                        </div>


                        <div class="form-group" hidden>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Konfirmasi
                            </button>
                        </div>

                    </form>
                    <div class="form-group">
                        <a href="<?= base_url("siswa/resend-rereg-invoice/{$rereg_data['idPendaftar']}") ?>" class="btn btn-info btn-lg btn-block">
                            Kirim Informasi Tagihan Daftar Ulang
                        </a>
                    </div>
                    <div class="form-group">
                        <a href="<?= base_url("siswa/check-rereg-payment/{$rereg_data['idPendaftar']}") ?>" class="btn btn-primary btn-lg btn-block">
                            Cek Pembayaran
                        </a>
                    </div>
                </div>
            </div>
            <!-- <hr> -->
            <!-- <p class="btn btn-outline-info text-center"> <strong>Silahkan Logout dan Login kembali untuk cek status pembelian formulir</strong></p> -->

        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Informasi Daftar Ulang</h4>
                </div>
                <div class="row mt-2 ml-2">
                    <div class="col-12">
                        <!-- <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    1
                                </div>
                                <div class="activity-detail col-md-10">
                                    <strong>
                                        <p>Biaya pembelian formulir sebesar: </p>
                                    </strong>
                                    <p class="btn btn-outline-primary" style="font-size: 20px;">Rp. 100.000,-</p>
                                </div>
                            </div>

                        </div>
                        <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    2
                                </div>
                                <div class="activity-detail col-md-10">
                                    <strong>
                                        <p>Pembelian melalui transfer di tujukkan ke-</p>
                                    </strong>
                                    <p style="font-size: 20px;">Bank Mandiri<br>
                                        129-000-9768017<br>
                                        a/n Yayasan Wahana Prestasi Prima
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="activities">
                            <div class="activity">
                                <div class="activity-icon bg-primary text-white shadow-primary">
                                    3
                                </div>
                                <div class="activity-detail col-md-10">
                                    <strong>
                                        <p style="font-size: 16px;">Konfirmasi Pembelian Formulir</p>
                                    </strong>
                                    <p>Silahkan upload bukti transfer pembelian formulir berupa struk / screenshoot dan mohon menunggu proses verifikasi Panitia PPDB. <br>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    </div>

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
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
<!-- end rupiah otomatis -->

<script>
    <?php if (session()->getFlashdata('konfirmasiBerhasil')) { ?>
        iziToast.success({
            title: 'Selamat!',
            message: 'Konfirmasi Pembayaran Daftar Ulang Berhasil',
            position: 'bottomRight'
        });
    <?php } ?>
</script>

<script>
    <?php if ($validasi->hasError('gbrBuktiBayar') == true) { ?>
        iziToast.error({
            title: 'Maaf!',
            message: 'Format Gambar yang didukung adalah png, jpg, jpeg dengan ukuran maksimal 1024Kb',
            position: 'bottomRight',
            timeOut: 8000
        });
    <?php } ?>

    <?php if ($validasi->hasError('idPendaftar') == true) { ?>
        iziToast.error({
            title: 'Maaf!',
            message: 'Kamu sudah melakukan konfirmasi, silahkan logout dan login kembali untuk cek status pembayaran daftar ulang',
            position: 'bottomRight',
            timeOut: 8000
        });
    <?php } ?>
    <?php if (session()->getFlashdata('info_message')) { ?>
        iziToast.info({
            title: 'Info!',
            message: '<?php echo session()->getFlashdata('info_message');?>',
            position: 'topRight'
        });

    <?php } ?>
    <?php if (session()->getFlashdata('success_message')) { ?>
        iziToast.info({
            title: 'Berhasil!',
            message: '<?php echo session()->getFlashdata('success_message');?>',
            position: 'topRight'
        });

    <?php } ?>
</script>

<script>
    $(document).ready(function() {
        if (<?= $validasi->hasError('idPendaftar'); ?> == true) {
            $('#doublekonfirmasi').modal('show');
        }
    });
</script>


<?= $this->endSection(); ?>