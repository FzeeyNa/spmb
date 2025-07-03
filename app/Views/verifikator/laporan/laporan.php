<?= $this->extend("verifikator/template/tema"); ?>
<?= $this->section('konten'); ?>
<div class="section-header">
    <h1>Rekapitulasi Pendaftaran PPDB Sekolah Prestasi Prima 2025 / 2026</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('verifikator') ?>">Beranda</a></div>
        <div class="breadcrumb-item">Report</div>
    </div>
</div>

<div class="section-body">
   
        <h2 class="section-title">Rekapitulasi PPDB 2025 - 2026</h2>
         
 
    
    <p class="section-lead">
        <?php
            function hari_ini()
            {
                $hari = date("D");

                switch ($hari) {
                    case 'Sun':
                        $hari_ini = "Minggu";
                        break;

                    case 'Mon':
                        $hari_ini = "Senin";
                        break;

                    case 'Tue':
                        $hari_ini = "Selasa";
                        break;

                    case 'Wed':
                        $hari_ini = "Rabu";
                        break;

                    case 'Thu':
                        $hari_ini = "Kamis";
                        break;

                    case 'Fri':
                        $hari_ini = "Jumat";
                        break;

                    case 'Sat':
                        $hari_ini = "Sabtu";
                        break;

                    default:
                        $hari_ini = "Tidak di ketahui";
                        break;
                }

                return "<b>" . $hari_ini . "</b>";
            }

            function bulan_indonesia($bulan)
            {
                $bulan_array = array(
                    'January' => 'Januari',
                    'February' => 'Februari',
                    'March' => 'Maret',
                    'April' => 'April',
                    'May' => 'Mei',
                    'June' => 'Juni',
                    'July' => 'Juli',
                    'August' => 'Agustus',
                    'September' => 'September',
                    'October' => 'Oktober',
                    'November' => 'November',
                    'December' => 'Desember'
                );

                return $bulan_array[$bulan];
            }

            $tanggal = date('j F Y g:i a');
            $bulan = bulan_indonesia(date('F'));
            echo hari_ini() . ', <b>' . date('j') . ' ' . $bulan . ' ' . date('Y g:i a') . '</b>';
        ?>
    </p>
</div>
<div class="row justify-content-end mb-1 mr-1">
                   </div>
<div class="row">

    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>SMK PRESTASI PRIMA</h4>
                <div class="card-header-action">
                    <button class="btn btn-sm btn-primary float-end mr-1 h-50" id="pengaturanSMK"><i class="fas fa-cog"></i> Pengaturan Rombel </button>

                </div>
            </div>
            <div class="card-body">
                <div class="summary">

                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm table-striped table-bordered">
                                <tr class="bg-primary text-white">

                                    <th rowspan="2" class="align-middle text-center">No</th>
                                    <th rowspan="2" class="align-middle text-center">Kompetensi Keahlian</th>
                                    <th rowspan="2" class="align-middle text-center">Pendaftar</th>
                                    <th rowspan="2" class="align-middle text-center">Ikut Test</th>
                                    <th rowspan="2" class="align-middle text-center">Daftar Ulang</th>
                                    <th rowspan="2" class="align-middle text-center">PPDB Bersama</th>
                                    <th rowspan="2" class="align-middle text-center">Total Jurusan</th>
                                    <th colspan="2" class="align-middle text-center">Daya Tampung</th>
                                    <th colspan="2" class="align-middle text-center">Keadaan Saat Ini</th>

                                </tr>
                                <tr class="bg-primary text-white">
                                    <th class="align-middle text-center">RB</th>
                                    <th class="align-middle text-center">Siswa</th>
                                    <th class="align-middle text-center">RB</th>
                                    <th class="align-middle text-center">+/- Siswa</th>
                                </tr>
                                <tr>
                                    <td class="align-middle text-center">1</td>
                                    <td>PPLG</td>
                                    <td class="align-middle text-center"><?= $rpl-$bersamaRPL; ?></td>
                                    <td class="align-middle text-center"><?= $tesRPL; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangRPL; ?></td>
                                    <td class="align-middle text-center"><?= $bersamaRPL; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangRPL+ $bersamaRPL; ?></td>
                                    <td class="align-middle text-center"><?= $targetRPL; ?></td>
                                    <td class="align-middle text-center"><?= $targetRPL * $rombel; ?></td>
                                    <?php $gabunganRPL = $daftarUlangRPL+$bersamaRPL;?>
                                    <td class="align-middle text-center"><?php if ($gabunganRPL <= $rombel) {
                                                                                $rbRPL = 1;
                                                                            } else if ($gabunganRPL <= $rombel1) {
                                                                                $rbRPL = 2;
                                                                            } else if ($gabunganRPL <= $rombel2) {
                                                                                $rbRPL = 3;
                                                                            } else if ($gabunganRPL <= $rombel3) {
                                                                                $rbRPL = 4;
                                                                            } else {
                                                                                $rbRPL = 5;
                                                                            } ?> <?= $rbRPL; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganRPL <= $rombel) {
                                                                                $hasilRPL = $gabunganRPL - $rombel;
                                                                            } else if ($gabunganRPL <= $rombel1) {
                                                                                $hasilRPL = $gabunganRPL - $rombel1;
                                                                            } else if ($gabunganRPL <= $rombel2) {
                                                                                $hasilRPL = $gabunganRPL - $rombel2;
                                                                            } else if ($gabunganRPL <= $rombel3) {
                                                                                $hasilRPL = $gabunganRPL - $rombel3;
                                                                            } else {
                                                                                $hasilRPL = $gabunganRPL - $rombel4;
                                                                            } ?><?= $hasilRPL; ?></td>

                                </tr>
                                <tr>
                                    <td class="align-middle text-center">2</td>
                                    <td>TJKT</td>
                                    <td class="align-middle text-center"><?= $tkj-$bersamaTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $tesTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $bersamaTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangTKJ+$bersamaTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $targetTKJ; ?></td>
                                    <td class="align-middle text-center"><?= $targetTKJ * $rombel; ?></td>
                                     <?php $gabunganTKJ = $daftarUlangTKJ+$bersamaTKJ;?>
                                    <td class="align-middle text-center"><?php if ($gabunganTKJ <= $rombel) {
                                                                                $rbTKJ = 1;
                                                                            } else if ($gabunganTKJ <= $rombel1) {
                                                                                $rbTKJ = 2;
                                                                            } else if ($gabunganTKJ <= $rombel2) {
                                                                                $rbTKJ = 3;
                                                                            } else if ($gabunganTKJ <= $rombel3) {
                                                                                $rbTKJ = 4;
                                                                            } else {
                                                                                $rbTKJ = 5;
                                                                            } ?><?= $rbTKJ; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganTKJ <= $rombel) {
                                                                                $hasilTKJ = $gabunganTKJ - $rombel;
                                                                            } else if ($gabunganTKJ <= $rombel1) {
                                                                                $hasilTKJ = $gabunganTKJ - $rombel1;
                                                                            } else if ($gabunganTKJ <= $rombel2) {
                                                                                $hasilTKJ = $gabunganTKJ - $rombel2;
                                                                            } else if ($gabunganTKJ <= $rombel3) {
                                                                                $hasilTKJ =  $gabunganTKJ - $rombel3;
                                                                            } else {
                                                                                $hasilTKJ = $gabunganTKJ - $rombel4;
                                                                            } ?> <?= $hasilTKJ; ?></td>

                                </tr>
                                <tr>
                                    <td class="align-middle text-center">3</td>
                                    <td>BCF</td>
                                    <td class="align-middle text-center"><?= $bc-$bersamaBC; ?></td>
                                    <td class="align-middle text-center"><?= $tesBC; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangBC; ?></td>
                                     <td class="align-middle text-center"><?= $bersamaBC; ?></td>
                                     <td class="align-middle text-center"><?= $daftarUlangBC+$bersamaBC; ?></td>
                                    <td class="align-middle text-center"><?= $targetBC; ?></td>
                                    <td class="align-middle text-center"><?= $targetBC * $rombel; ?></td>
                                      <?php $gabunganBC = $daftarUlangBC+$bersamaBC;?>
                                    <td class="align-middle text-center"><?php if ($gabunganBC <= $rombel) {
                                                                                $rbBC = 1;
                                                                            } else if ($gabunganBC <= $rombel1) {
                                                                                $rbBC = 2;
                                                                            } else if ($gabunganBC <= $rombel2) {
                                                                                $rbBC = 3;
                                                                            } else if ($gabunganBC <= $rombel3) {
                                                                                $rbBC = 4;
                                                                            } else {
                                                                                $rbBC = 5;
                                                                            } ?><?= $rbBC; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganBC <= $rombel) {
                                                                                $hasilBC = $gabunganBC - $rombel;
                                                                            } else if ($gabunganBC <= $rombel1) {
                                                                                $hasilBC = $gabunganBC - $rombel1;
                                                                            } else if ($gabunganBC <= $rombel2) {
                                                                                $hasilBC = $gabunganBC - $rombel2;
                                                                            } else if ($gabunganBC <= $rombel3) {
                                                                                $hasilBC = $gabunganBC - $rombel3;
                                                                            } else {
                                                                                $hasilBC = $gabunganBC - $rombel4;
                                                                            } ?><?= $hasilBC; ?></td>

                                </tr>
                                <tr>
                                    <td class="align-middle text-center">4</td>
                                    <td>DKV</td>
                                    <td class="align-middle text-center"><?= $mm-$bersamaMM; ?></td>
                                    <td class="align-middle text-center"><?= $tesMM; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangMM; ?></td>
                                    <td class="align-middle text-center"><?= $bersamaMM; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangMM+$bersamaMM; ?></td>
                                    <td class="align-middle text-center"><?= $targetMM; ?></td>
                                    <td class="align-middle text-center"><?= $targetMM * $rombel; ?></td>
                                    <?php $gabunganMM = $daftarUlangMM+$bersamaMM;?>
                                    <td class="align-middle text-center"><?php if ($gabunganMM <= $rombel) {
                                                                                $rbMM = 1;
                                                                            } else if ($gabunganMM <= $rombel1) {
                                                                                $rbMM = 2;
                                                                            } else if ($gabunganMM <= $rombel2) {
                                                                                $rbMM = 3;
                                                                            } else if ($gabunganMM <= $rombel3) {
                                                                                $rbMM = 4;
                                                                            } else {
                                                                                $rbMM = 5;
                                                                            } ?><?= $rbMM; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganMM <= $rombel) {
                                                                                $hasilMM = $gabunganMM - $rombel;
                                                                            } else if ($gabunganMM <= $rombel1) {
                                                                                $hasilMM = $gabunganMM - $rombel1;
                                                                            } else if ($gabunganMM <= $rombel2) {
                                                                                $hasilMM = $gabunganMM - $rombel2;
                                                                            } else if ($gabunganMM <= $rombel3) {
                                                                                $hasilMM = $gabunganMM - $rombel3;
                                                                            } else {
                                                                                $hasilMM = $gabunganMM - $rombel4;
                                                                            } ?><?= $hasilMM; ?></td>

                                </tr>
                                <tr>
                                    <th colspan="2" class="align-middle text-center">Jumlah</th>

                                    <th class="align-middle text-center"><?= ($rpl-$bersamaRPL) + ($bc-$bersamaBC) + ($mm-$bersamaMM) + ($tkj-$bersamaTKJ); ?></th>
                                    <th class="align-middle text-center"><?= $tesRPL + $tesTKJ + $tesMM + $tesBC; ?></th>
                                    <th class="align-middle text-center"><?= $daftarUlangRPL + $daftarUlangMM + $daftarUlangBC + $daftarUlangTKJ; ?></th>
                                        <th class="align-middle text-center"><?= $bersamaRPL + $bersamaBC + $bersamaMM + $bersamaTKJ; ?></th>
                                        <th class="align-middle text-center"><?= ($bersamaRPL + $bersamaBC + $bersamaMM + $bersamaTKJ)+$daftarUlangRPL + $daftarUlangMM + $daftarUlangBC + $daftarUlangTKJ; ?></th>
              
                                    <th class="align-middle text-center"><?= $targetRPL + $targetMM + $targetTKJ + $targetBC; ?></th>
                                    <th class="align-middle text-center"><?= ($targetRPL * $rombel) + ($targetMM * $rombel) + ($targetTKJ * $rombel) + ($targetBC * $rombel); ?></th>
                                    <th class="align-middle text-center"><?= $rbRPL + $rbTKJ + $rbMM + $rbBC; ?></th>
                                    <th class="align-middle text-center"><?= $hasilRPL + $hasilBC + $hasilTKJ + $hasilMM; ?></th>

                                </tr>
                            </table>
                            <small>catatan: 1 RB = <?=$rombel?> Siswa</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 style="color:purple">SMA PRESTASI PRIMA</h4>
                <div class="card-header-action">
                    
<button class="btn btn-sm float-end mr-1 h-50 text-white" style="background-color: purple;" id="pengaturanSMA"><i class="fas fa-cog"></i> Pengaturan Rombel </button>

                </div>
            </div>
            <div class="card-body">
                <div class="summary">

                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm table-striped table-bordered">
                                <tr class="text-white" style="background-color: purple;">

                                    <th rowspan="2" class="align-middle text-center">No</th>
                                    <th rowspan="2" class="align-middle text-center">Jurusan</th>
                                    <th rowspan="2" class="align-middle text-center">Pendaftar</th>
                                    <th rowspan="2" class="align-middle text-center">Ikut Test</th>
                                    <th rowspan="2" class="align-middle text-center">Daftar Ulang</th>
                                     <th rowspan="2" class="align-middle text-center">PPDB Bersama</th>
                                     <th rowspan="2" class="align-middle text-center">Total Jurusan</th>
                                    <th colspan="2" class="align-middle text-center">Daya Tampung</th>
                                    <th colspan="2" class="align-middle text-center">Keadaan Saat Ini</th>

                                </tr>
                                <tr class="text-white" style="background-color: purple;">
                                    <th class="align-middle text-center">RB</th>
                                    <th class="align-middle text-center">Siswa</th>
                                    <th class="align-middle text-center">RB</th>
                                    <th class="align-middle text-center">+/- Siswa</th>
                                </tr>
                                <tr>
                                    <td class="align-middle text-center">1</td>
                                    <td>IPA</td>
                                    <td class="align-middle text-center"><?= $ipa-$bersamaIPA; ?></td>
                                    <td class="align-middle text-center"><?= $tesIPA; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangIPA; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPA; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPA+$daftarUlangIPA; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPA; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPA * $rombelBiasa; ?></td>
                                     <?php $gabunganIPA = $daftarUlangIPA+$bersamaIPA;?>
                                    <td class="align-middle text-center"><?php if ($gabunganIPA <= $rombelBiasa) {
                                                                                $rbIPA = 1;
                                                                            } else if ($gabunganIPA <= $rombelBiasa1) {
                                                                                $rbIPA = 2;
                                                                            } else if ($gabunganIPA <= $rombelBiasa2) {
                                                                                $rbIPA = 3;
                                                                            } else if ($gabunganIPA <= $rombelBiasa3) {
                                                                                $rbIPA = 4;
                                                                            } else if ($gabunganIPA <= $rombelBiasa4) {
                                                                                $rbIPA = 5;
                                                                           }else if ($gabunganIPA <= $rombelBiasa5) {
                                                                                $rbIPA = 6;
                                                                                }else {
                                                                                $rbIPA = 7;
                                                                            } ?><?= $rbIPA; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganIPA <= $rombelBiasa) {
                                                                                $hasilIPA = $gabunganIPA - $rombelBiasa;
                                                                            } else if ($gabunganIPA <= $rombelBiasa1) {
                                                                                $hasilIPA = $gabunganIPA - $rombelBiasa1;
                                                                            } else if ($gabunganIPA <=$rombelBiasa2) {
                                                                                $hasilIPA = $gabunganIPA - $rombelBiasa2;
                                                                            } else if ($gabunganIPA <= $rombelBiasa3) {
                                                                                $hasilIPA = $gabunganIPA - $rombelBiasa3;
                                                                                
                                                                            } else if ($gabunganIPA <= $rombelBiasa4) {
                                                                                $hasilIPA = $gabunganIPA -$rombelBiasa4;
                                                                            }else if ($gabunganIPA <= $rombelBiasa5) {
                                                                                $hasilIPA = $gabunganIPA - $rombelBiasa5;
                                                                            } else {
                                                                                $hasilIPA = $gabunganIPA -$rombelBiasa6;
                                                                            }
                                                                            ?><?= $hasilIPA; ?></td>

                                </tr>
                                <tr>
                                    <td class="align-middle text-center">2</td>
                                    <td>IPS</td>
                                    <td class="align-middle text-center"><?= $ips-$bersamaIPS; ?></td>
                                    <td class="align-middle text-center"><?= $tesIPS; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangIPS; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPS; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPS+$daftarUlangIPS; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPS; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPS * $rombelBiasa; ?></td>
                                     <?php $gabunganIPS = $daftarUlangIPS+$bersamaIPS;?>
                                    <td class="align-middle text-center"><?php if ($gabunganIPS <= $rombelBiasa) {
                                                                                $rbIPS = 1;
                                                                            } else if ($gabunganIPS <= $rombelBiasa1) {
                                                                                $rbIPS = 2;
                                                                            } else if ($gabunganIPS <= $rombelBiasa2) {
                                                                                $rbIPS = 3;
                                                                            } else if ($gabunganIPS <= $rombelBiasa3) {
                                                                                $rbIPS = 4;
                                                                              }  else if ($gabunganIPS <= $rombelBiasa4) {
                                                                                $rbIPS = 5;
                                                                            } else if ($gabunganIPS <= $rombelBiasa5) {
                                                                                $rbIPS = 6;
                                                                                }else {
                                                                                $rbIPS = 7;
                                                                            } ?><?= $rbIPS; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganIPS <= $rombelBiasa) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa;
                                                                            } else if ($gabunganIPS <= $rombelBiasa1) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa1;
                                                                            } else if ($gabunganIPS <= $rombelBiasa2) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa2;
                                                                            } else if ($gabunganIPS <= $rombelBiasa3) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa3;
                                                                            }else if ($gabunganIPS <= $rombelBiasa4) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa4;
                                                                            }else if ($gabunganIPS <= $rombelBiasa5) {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa5;
                                                                            }
                                                                            
                                                                            else {
                                                                                $hasilIPS = $gabunganIPS - $rombelBiasa6;
                                                                            } ?><?= $hasilIPS; ?></td>

                                </tr>
                                
                                 <tr>
                                    <td class="align-middle text-center">3</td>
                                    <td>IPA EKSKUTIF</td>
                                    <td class="align-middle text-center"><?= $ipae-$bersamaIPAE; ?></td>
                                    <td class="align-middle text-center"><?= $tesIPAE; ?></td>
                                    <td class="align-middle text-center"><?= $daftarUlangIPAE; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPAE; ?></td>
                                      <td class="align-middle text-center"><?= $bersamaIPAE+$daftarUlangIPAE; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPAE; ?></td>
                                    <td class="align-middle text-center"><?= $targetIPAE * $rombelEkskutif; ?></td>
                                     <?php $gabunganIPAE = $daftarUlangIPAE+$bersamaIPAE;?>
                                    <td class="align-middle text-center"><?php if ($gabunganIPAE <= $rombelEkskutif) {
                                                                                $rbIPAE = 1;
                                                                            } else if ($gabunganIPAE <= $rombelEkskutif1) {
                                                                                $rbIPAE = 2;
                                                                            } else if ($gabunganIPAE <= $rombelEkskutif2) {
                                                                                $rbIPAE = 3;
                                                                            } else if ($gabunganIPAE <= $rombelEkskutif3) {
                                                                                $rbIPAE = 4;
                                                                              }  else if ($gabunganIPAE <= $rombelEkskutif4) {
                                                                                $rbIPAE = 5;
                                                                            } else if ($gabunganIPAE <= $rombelEkskutif5) {
                                                                                $rbIPAE = 6;
                                                                                }else {
                                                                                $rbIPAE = 7;
                                                                            } ?><?= $rbIPAE; ?></td>
                                    <td class="align-middle text-center"><?php if ($gabunganIPAE <= $rombelEkskutif) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif;
                                                                            } else if ($gabunganIPAE <= $rombelEkskutif1) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif1;
                                                                            } else if ($gabunganIPS <= $rombelEkskutif2) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif2;
                                                                            } else if ($gabunganIPS <= $rombelEkskutif3) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif3;
                                                                            }else if ($gabunganIPS <= $rombelEkskutif4) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif4;
                                                                            }else if ($gabunganIPS <= $rombelEkskutif5) {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif5;
                                                                            }
                                                                            
                                                                            else {
                                                                                $hasilIPAE = $gabunganIPAE - $rombelEkskutif6;
                                                                            } ?><?= $hasilIPAE; ?></td>

                                </tr>
                                <tr>
    <td class="align-middle text-center">4</td>
    <td>IPS EKSKUTIF</td>
    <td class="align-middle text-center"><?= $ipse - $bersamaIPSE; ?></td>
    <td class="align-middle text-center"><?= $tesIPSE; ?></td>
    <td class="align-middle text-center"><?= $daftarUlangIPSE; ?></td>
    <td class="align-middle text-center"><?= $bersamaIPSE; ?></td>
    <td class="align-middle text-center"><?= $bersamaIPSE + $daftarUlangIPSE; ?></td>
    <td class="align-middle text-center"><?= $targetIPSE; ?></td>
    <td class="align-middle text-center"><?= $targetIPSE * $rombelEkskutif; ?></td>
    
    <?php $gabunganIPSE = $daftarUlangIPSE + $bersamaIPSE; ?>
    
    <td class="align-middle text-center">
        <?php
        if ($gabunganIPSE <= $rombelEkskutif) {
            $rbIPSE = 1;
        } else if ($gabunganIPSE <= $rombelEkskutif1) {
            $rbIPSE = 2;
        } else if ($gabunganIPSE <= $rombelEkskutif2) {
            $rbIPSE = 3;
        } else if ($gabunganIPSE <= $rombelEkskutif3) {
            $rbIPSE = 4;
        } else if ($gabunganIPSE <= $rombelEkskutif4) {
            $rbIPSE = 5;
        } else if ($gabunganIPSE <= $rombelEkskutif5) {
            $rbIPSE = 6;
        } else {
            $rbIPSE = 7;
        }
        ?>
        <?= $rbIPSE; ?>
    </td>

    <td class="align-middle text-center">
        <?php
        if ($gabunganIPSE <= $rombelEkskutif) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif;
        } else if ($gabunganIPSE <= $rombelEkskutif1) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif1;
        } else if ($gabunganIPSE <= $rombelEkskutif2) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif2;
        } else if ($gabunganIPSE <= $rombelEkskutif3) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif3;
        } else if ($gabunganIPSE <= $rombelEkskutif4) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif4;
        } else if ($gabunganIPSE <= $rombelEkskutif5) {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif5;
        } else {
            $hasilIPSE = $gabunganIPSE - $rombelEkskutif6;
        }
        ?>
        <?= $hasilIPSE; ?>
    </td>
</tr>


                               <tr>
    <th colspan="2" class="align-middle text-center">Jumlah</th>

    <th class="align-middle text-center">
        <?= ($ipa - $bersamaIPA) + ($ips - $bersamaIPS) + ($ipae - $bersamaIPAE) + ($ipse - $bersamaIPSE); ?>
    </th>

    <th class="align-middle text-center">
        <?= $tesIPA + $tesIPS + $tesIPAE + $tesIPSE; ?>
    </th>

    <th class="align-middle text-center">
        <?= $daftarUlangIPA + $daftarUlangIPS + $daftarUlangIPAE + $daftarUlangIPSE; ?>
    </th>

    <th class="align-middle text-center">
        <?= $bersamaIPA + $bersamaIPS + $bersamaIPAE + $bersamaIPSE; ?>
    </th>

    <th class="align-middle text-center">
        <?= ($bersamaIPA + $bersamaIPS + $bersamaIPAE + $bersamaIPSE) + ($daftarUlangIPA + $daftarUlangIPS + $daftarUlangIPAE + $daftarUlangIPSE); ?>
    </th>

    <th class="align-middle text-center">
        <?= $targetIPA + $targetIPS + $targetIPAE + $targetIPSE; ?>
    </th>

    <th class="align-middle text-center">
        <?= ($targetIPA * $rombelBiasa) + ($targetIPS * $rombelBiasa) + ($targetIPAE * $rombelEkskutif) + ($targetIPSE * $rombelEkskutif); ?>
    </th>

    <th class="align-middle text-center">
        <?= $rbIPA + $rbIPS + $rbIPAE + $rbIPSE; ?>
    </th>

    <th class="align-middle text-center">
        <?= $hasilIPA + $hasilIPS + $hasilIPAE + $hasilIPSE; ?>
    </th>
</tr>

                            </table>
                            <small>catatan: 1 RB (Biasa) = <?= $rombelBiasa?> Siswa,</small> <small>1 RB (Ekskutif) = <?= $rombelEkskutif?> Siswa</small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 style="color:purple">Pembelian Formulir Sudah Diverifikasi</h4>
                <div class="card-header-action">
                    <a href="#summary-chart" data-tab="summary-tab" class="btn active" style="background-color: purple;">SMA</a>

                </div>
            </div>
            <div class="card-body">
                <div class="summary">

                    <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                        <canvas id="myChart1" height="180"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div> -->
</div>


<?= $this->endSection(); ?>
<?= $this->section('modal') ?>
<!-- tempat menyimpan modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="updateSMK">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-cog"></i> Pengaturan Rombel SMK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?= base_url('verifikator/updateRombelSMK') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

  
                    <div class=" row">

                        <div class="form-group col-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Target Kelas</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php $no=1; foreach($rombelSMK as $i => $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?= $row->kdJurusan ?>
                    <input type="hidden" class="form-control" name="data[<?= $i ?>][kdJurusan]" value="<?= $row->kdJurusan ?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="data[<?= $i ?>][target]" value="<?= $row->target ?>" required>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
                                </table>
                                <div style="margin-top: 20px;">
        <label>Siswa Per-Rombel (Untuk Semua):</label>
        <input type="number" class="form-control" name="rombel_global" value="<?= $rombelSMK[0]->rombel ?? '' ?>" required>
    </div>
                            </div>
                            
                            </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg ">
                            Simpan
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="updateSMA">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-cog"></i> Pengaturan Rombel SMA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm" action="<?= base_url('verifikator/updateRombelSMA') ?>" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

  
                    <div class=" row">

                        <div class="form-group col-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Target Kelas</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
            <?php $no=1; foreach($rombelSMA as $i => $row): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td>
                    <?= $row->kdJurusan ?>
                    <input type="hidden" class="form-control" name="data[<?= $i ?>][kdJurusan]" value="<?= $row->kdJurusan ?>">
                </td>
                <td>
                    <input type="number" class="form-control" name="data[<?= $i ?>][target]" value="<?= $row->target ?>" required>
                </td>
                
            </tr>
            <?php endforeach; ?>
        </tbody>
        
                                </table>
                                
                                
                           
                                     <div class="d-flex flex-wrap">
    <div class="me-3 mb-3" style="min-width: 250px; flex: 1;">
        <label for="rombel_biasa">Siswa Per-Rombel (Biasa):</label>
        <input type="number" id="rombel_biasa" class="form-control" name="rombel_biasa" value="<?= $rombelSMA[0]->rombel ?? '' ?>" required>
    </div>
    <div class="mb-3" style="min-width: 250px; flex: 1;">
        <label for="rombel_ekskutif">Siswa Per-Rombel (Ekskutif):</label>
        <input type="number" id="rombel_ekskutif" class="form-control" name="rombel_ekskutif" value="<?= $rombelSMA[2]->rombel ?? '' ?>" required>
    </div>
</div>

                                        
                                    
                                
                                
                            </div>
                            
                            </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg ">
                            Simpan
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
    <?php if (session()->getFlashdata('success')) { ?>
        iziToast.success({
            title: 'Yeayy!',
            message: 'Data Berhasil Diubah',
            position: 'topRight'
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
<script>
    $(document).ready(function() {
       
        $('#pengaturanSMK').click(function(event) {
            $('#updateSMK').modal('show');
        })
        $('#pengaturanSMA').click(function(event) {
            $('#updateSMA').modal('show');
        })
    });
</script>

<?= $this->endSection(); ?>