<?= $this->extend("verifikator/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Halaman Konfirmasi Pembayaran Formulir dan Daftar Ulang</h1>
</div>

<div class="section-body">

    <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="GET">
                    <div class="input-group mb-3"> <input type="text" class="form-control input-text" placeholder="Input ID Pendaftar" aria-label="Recipient's username" aria-describedby="basic-addon2" id="keyword" name="keyword">
                        <div class="input-group-append"> <button class="btn btn-primary btn-lg" type="submit"><i class="fa fa-search"></i></button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-sm-4">
        <?php foreach ($idPendaftar as $row) : ?>
            <div class="col-12 col-md-12 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Konfirmasi Pembelian Formulir</h4>
                    </div>
                    <div class="profile-widget-description mx-3">
                        <form id="myForm" action="<?= base_url('verifikator/saveFormulir') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class=" row">
                                <input id="first_name" type="text" class="form-control" name="idPembayaran" value="<?= $id = date("his");
                                                                                                                    $rand = rand(100, 999);
                                                                                                                    echo $rand + $id; ?>" hidden>
                                <div class="form-group col-6">
                                    <label for="first_name">ID Pendaftar</label>
                                    <input id="first_name" type="text" class="form-control" name="idPendaftar" placeholder="Id Pendaftar" readonly value="<?= $row->idPendaftar; ?>">
                                    <div class="invalid-feedback">

                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Nama Pendaftar</label>
                                    <input id="last_name" type="text" class="form-control" name="nmPendaftar" placeholder="Nama Pendaftar" readonly value="<?= $row->nmPendaftar; ?>">
                                </div>
                            </div>

                            <input id="last_name" type="text" class="form-control" name="hp" hidden value="<?= $row->hp; ?>">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name">Jumlah Transfer</label>
                                    <input type="text" class="form-control" name="totalPembayaran" readonly value="Rp. 100.000,-">
                                    <div class="invalid-feedback">
                                        Field wajib diisi
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Tanggal Transfer</label>
                                    <input id="last_name" type="text" class="form-control datetimepicker" name="tglPembayaran" required>
                                    <div class="invalid-feedback">
                                        Field wajib diisi
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Upload Bukti Transfer</label>
                                <input id="last_name" type="file" class="form-control" name="gbrBuktiBayar">
                                <div class="invalid-feedback">
                                    Field wajib diisi
                                </div>
                                <div style="color:red">
                                    Format gambar .jpg, .png dan .jpeg dan maksimal 1 Mb
                                </div>
                            </div>


                            <?php if ($row->status == 'pending' || $row->status == 'sudah formulir') { ?>
                                <div class="form-group">
                                    <p class="btn btn-success btn-lg btn-block disabled">
                                        Sudah Konfirmasi
                                    </p>
                                </div> <?php } else { ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Konfirmasi
                                    </button>
                                </div>
                            <?php } ?>

                        </form>
                    </div>
                </div>
            <?php endforeach; ?>

            </div>
            <?php foreach ($idPendaftar as $baris) : ?>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Konfirmasi Daftar Ulang</h4>
                        </div>
                        <div class="profile-widget-description mx-3">
                            <form id="myForm" action="<?= base_url('verifikator/simpanDaftarUlang') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                                <?= csrf_field(); ?>
                                <div class=" row">
                                    <input id="first_name" type="text" class="form-control" name="idPembayaran" value="<?= $id = date("his");
                                                                                                                        $rand = rand(100, 999);
                                                                                                                        echo $rand + $id; ?>" hidden>



                                    <div class="form-group col-6">
                                        <label for="first_name">ID Pendaftar</label>
                                        <input id="first_name" type="text" class="form-control" name="idPendaftar" placeholder="ID Pendaftar" readonly value="<?= $baris->idPendaftar; ?>">
                                        <div class="invalid-feedback">

                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="last_name">No Formulir</label>
                                        <input id="last_name" type="text" class="form-control" name="noFormulir" placeholder="No Formulir" readonly required value="<?= $baris->noFormulir; ?>">
                                    </div>
                                </div>


                                <div class="row">
                                  
                                      
                                   
                                        <div class="form-group col-6">
                                            <label for="first_name">Jumlah Transfer</label>
                                            <input id="rupiah" type="text" class="form-control" name="totalPembayaran">
                                            <div class="invalid-feedback">
                                                Field wajib diisi
                                            </div>
                                        </div>
                                 
                                    <div class="form-group col-6">
                                        <label for="last_name">Tanggal Transfer</label>
                                        <input id="last_name" type="text" class="form-control datetimepicker" name="tglPembayaran" required>
                                        <div class="invalid-feedback">
                                            Field wajib diisi
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Upload Bukti Transfer</label>
                                    <input id="last_name" type="file" class="form-control" name="gbrBuktiBayar" >
                                    <div class="invalid-feedback">
                                        Field wajib diisi
                                    </div>
                                    <div style="color:red">
                                        Format gambar .jpg, .png dan .jpeg dan maksimal 1 Mb
                                    </div>
                                </div>


                                
                                  
                                      <?php if ($row->statusdu == 'cicil' || $row->statusdu == 'lunas') { ?>
                                <div class="form-group">
                                    <p class="btn btn-success btn-lg btn-block disabled">
                                        Sudah Konfirmasi
                                    </p>
                                </div> <?php } else { ?>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Konfirmasi
                                    </button>
                                </div>
                            <?php } ?>
                              

                            </form>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

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
            message: 'Konfirmasi Pembelian Formulir Berhasil',
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
            message: 'Kamu sudah melakukan konfirmasi, silahkan logout dan login kembali untuk cek status pembelian formulir',
            position: 'bottomRight',
            timeOut: 8000
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