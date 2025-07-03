<?php

namespace App\Controllers;
use App\Models\formulirModel;
use App\Models\daftarUlangModel;
use App\Models\registerModel;
use App\Models\userModel;
use CodeIgniter\Validation\Rules;
use App\Models\jurusanModel;
use App\Models\RombelModel;
use App\Models\tesModel;

use App\Models\pengumumanModel;

use Config\App;

class Admin extends BaseController
{
    protected $usermodel;
    protected $totalPendaftar;
    protected $daftarulang;
    protected $registerModel;
    protected $jurusan;
    protected $formulirModel;
    protected $tesModel;
    protected $blmDaftarUlang;
    protected $pengumumanModel;

      protected $rombel;
    public function __construct()
    {
       $this->usermodel = new userModel();
        $this->totalPendaftar = new registerModel();
        $this->daftarulang = new daftarUlangModel();
        
        $this->registerModel = new registerModel();
        $this->jurusan = new jurusanModel();
        $this->formulirModel = new formulirModel();
        $this->tesModel = new tesModel();
        $this->pengumumanModel = new pengumumanModel();
 $this->rombel = new RombelModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $idUser = $this->usermodel->findAll();
        $totalPendaftar = $this->totalPendaftar->totalPendaftar();
        $totalPendaftarSMK = $this->totalPendaftar->totalPendaftarSMK();
        $totalPendaftarSMA = $this->totalPendaftar->totalPendaftarSMA();
        $totalBC = $this->totalPendaftar->totalBC();
        $totalRPL = $this->totalPendaftar->totalRPL();
        $totalTKJ = $this->totalPendaftar->totalTKJ();
        $totalMM = $this->totalPendaftar->totalMM();
        $totalIPA = $this->totalPendaftar->totalIPA();
        $totalIPS = $this->totalPendaftar->totalIPS();
        $daftarUlangRPL = $this->daftarulang->daftarUlangRPL();
        $daftarUlangTKJ = $this->daftarulang->daftarUlangTKJ();
        $daftarUlangMM = $this->daftarulang->daftarUlangMM();
        $daftarUlangBC = $this->daftarulang->daftarUlangBC();
        $daftarUlangIPA = $this->daftarulang->daftarUlangIPA();
        $daftarUlangIPS = $this->daftarulang->daftarUlangIPS();
        
        if (session('level') == 'verifikator') {
            return redirect()->to(base_url('verifikator'));
        }
        $data = [
            'title' => 'PPDB | Dasboard Admin',
            'idUser' => $idUser,
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'beranda',
            'pend' => $totalPendaftar,
            'sma' => $totalPendaftarSMA,
            'smk' => $totalPendaftarSMK,
            'bc' => $totalBC,
            'rpl' => $totalRPL,
            'mm' => $totalMM,
            'tkj' => $totalTKJ,
            'ipa' => $totalIPA,
            'ips' => $totalIPS,
            'daftarUlangRPL' => $daftarUlangRPL,
            'daftarUlangMM' => $daftarUlangMM,
            'daftarUlangBC' => $daftarUlangBC,
            'daftarUlangTKJ' => $daftarUlangTKJ,
            'daftarUlangIPA' => $daftarUlangIPA,
            'daftarUlangIPS' => $daftarUlangIPS

        ];
        return view('admin/index', $data);
    }
    
      public function laporan()
    {
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $totalBC = $this->totalPendaftar->totalBC();
        $totalRPL = $this->totalPendaftar->totalRPL();
        $totalTKJ = $this->totalPendaftar->totalTKJ();
        $totalMM = $this->totalPendaftar->totalMM();
        $totalIPA = $this->totalPendaftar->totalIPA();
        $totalIPS = $this->totalPendaftar->totalIPS();
        $totalIPAEks = $this->totalPendaftar->totalEks('IPA EKSKUTIF', 'SMAE%');
        $totalIPSEks = $this->totalPendaftar->totalEks('IPS EKSKUTIF', 'SMAE%');
        $tesRPL = $this->tesModel->tesRPL();
        $tesMM = $this->tesModel->tesMM();
        $tesBC = $this->tesModel->tesBC();
        $tesTKJ = $this->tesModel->tesTKJ();
        $tesIPS = $this->tesModel->tesIPS();
        $tesIPA = $this->tesModel->tesIPA();
        
        $tesIPAE = $this->tesModel->tesEks('IPA EKSKUTIF', 'sudah');
        $tesIPSE = $this->tesModel->tesEks('IPS EKSKUTIF', 'sudah');
        $daftarUlangRPL = $this->daftarulang->daftarUlangRPL();
       
        $daftarUlangTKJ = $this->daftarulang->daftarUlangTKJ();
        $daftarUlangMM = $this->daftarulang->daftarUlangMM();
        $daftarUlangBC = $this->daftarulang->daftarUlangBC();
        $daftarUlangIPA = $this->daftarulang->daftarUlangIPA();
        $daftarUlangIPS = $this->daftarulang->daftarUlangIPS();
        
         $daftarUlangIPSE = $this->daftarulang->daftarUlangEks('IPS EKSKUTIF');
         $daftarUlangIPAE = $this->daftarulang->daftarUlangEks('IPA EKSKUTIF');
        
        
        $sdhVerifSMK = $this->daftarulang->sdhVerifSMK();
        $sdhVerifSMKcicil = $this->daftarulang->sdhVerifSMKcicil();
        
        
 
        
        $rombel = $this->rombel->where('kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG')->get()->getRow()->rombel;
        $rombel1 = $rombel*2;
        $rombel2 = $rombel*3;
        $rombel3 = $rombel*4;
        $rombel4 = $rombel*5;
        $rombel5 = $rombel*6;
        $rombel6 = $rombel*7;
        $rombel7 = $rombel*8;
        $rombel8 = $rombel*9;
        $rombel9 = $rombel*10;
        $rombel10 = $rombel*11;
        
     $rombelBiasa = $this->rombel->where('kdJurusan', 'IPA')->get(1)->getRow()->rombel;

$rombelBiasa1 = $rombelBiasa * 2;
$rombelBiasa2 = $rombelBiasa * 3;
$rombelBiasa3 = $rombelBiasa * 4;
$rombelBiasa4 = $rombelBiasa * 5;
$rombelBiasa5 = $rombelBiasa * 6;
$rombelBiasa6 = $rombelBiasa * 7;
$rombelBiasa7 = $rombelBiasa * 8;
$rombelBiasa8 = $rombelBiasa * 9;
$rombelBiasa9 = $rombelBiasa * 10;
$rombelBiasa10 = $rombelBiasa * 11;

        
       $rombelEkskutif = $this->rombel->where('kdJurusan', 'IPA EKSKUTIF')->get()->getRow()->rombel;
$rombelEkskutif1 = $rombelEkskutif * 2;
$rombelEkskutif2 = $rombelEkskutif * 3;
$rombelEkskutif3 = $rombelEkskutif * 4;
$rombelEkskutif4 = $rombelEkskutif * 5;
$rombelEkskutif5 = $rombelEkskutif * 6;
$rombelEkskutif6 = $rombelEkskutif * 7;
$rombelEkskutif7 = $rombelEkskutif * 8;
$rombelEkskutif8 = $rombelEkskutif * 9;
$rombelEkskutif9 = $rombelEkskutif * 10;
$rombelEkskutif10 = $rombelEkskutif * 11;

        $data = [
            'title' => 'Rekapitulasi Pendaftaran Peserta PPDB 2025/2026',
            'tesRPL' => $tesRPL,
            'tesMM' => $tesMM,
            'tesBC' => $tesBC,
            'tesTKJ' => $tesTKJ,
            'tesIPA' => $tesIPA,
            'tesIPS' => $tesIPS,
            'tesIPSE' => $tesIPSE,
            'tesIPAE' => $tesIPAE,
            'daftarUlangRPL' => $daftarUlangRPL,
            'daftarUlangMM' => $daftarUlangMM,
            'daftarUlangBC' => $daftarUlangBC,
            'daftarUlangTKJ' => $daftarUlangTKJ,
            'daftarUlangIPA' => $daftarUlangIPA,
            'daftarUlangIPS' => $daftarUlangIPS,
             'daftarUlangIPSE' => $daftarUlangIPSE,
             'daftarUlangIPAE' => $daftarUlangIPAE,
            
            'sdhVerifSMK' => $sdhVerifSMK,
            'sdhVerifSMKcicil' => $sdhVerifSMKcicil,
            'targetRPL' => $this->rombel->where('kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG')->get()->getRow()->target,
            'targetBC' => $this->rombel->where('kdJurusan', 'BROADCASTING / BCF')->get()->getRow()->target,
            'targetTKJ' => $this->rombel->where('kdJurusan', 'TEKNIK KOMPUTER JARINGAN / TJKT')->get()->getRow()->target,
            'targetMM' => $this->rombel->where('kdJurusan', 'MULTIMEDIA / DKV')->get()->getRow()->target,
            'targetIPA' => $this->rombel->where('kdJurusan', 'IPA')->get()->getRow()->target,
            'targetIPS' => $this->rombel->where('kdJurusan', 'IPS')->get()->getRow()->target,
            'targetIPAE' => $this->rombel->where('kdJurusan', 'IPA EKSKUTIF')->get()->getRow()->target,
            'targetIPSE' => $this->rombel->where('kdJurusan', 'IPS EKSKUTIF')->get()->getRow()->target,
            'bc' => $totalBC,
            'rpl' => $totalRPL,
            'mm' => $totalMM,
            'tkj' => $totalTKJ,
            'ipa' => $totalIPA,
            'ips' => $totalIPS,
            'ipae' => $totalIPAEks,
            'ipse' => $totalIPSEks,
            'active' => 'laporan',
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar,
            'rombel' => $rombel,
            'rombel1' => $rombel1,
            'rombel2' => $rombel2,
            'rombel3' => $rombel3,
            'rombel4' => $rombel4,
            'rombel5' => $rombel5,
            'rombel6' => $rombel6,
            'rombel7' => $rombel7,
            'rombel8' => $rombel8,
            'rombel9' => $rombel9,
            'rombel10' => $rombel10,
           'rombelBiasa' => $rombelBiasa,
'rombelBiasa1' => $rombelBiasa1,
'rombelBiasa2' => $rombelBiasa2,
'rombelBiasa3' => $rombelBiasa3,
'rombelBiasa4' => $rombelBiasa4,
'rombelBiasa5' => $rombelBiasa5,
'rombelBiasa6' => $rombelBiasa6,
'rombelBiasa7' => $rombelBiasa7,
'rombelBiasa8' => $rombelBiasa8,
'rombelBiasa9' => $rombelBiasa9,
'rombelBiasa10' => $rombelBiasa10,
            'rombelEkskutif' => $rombelEkskutif,
'rombelEkskutif1' => $rombelEkskutif1,
'rombelEkskutif2' => $rombelEkskutif2,
'rombelEkskutif3' => $rombelEkskutif3,
'rombelEkskutif4' => $rombelEkskutif4,
'rombelEkskutif5' => $rombelEkskutif5,
'rombelEkskutif6' => $rombelEkskutif6,
'rombelEkskutif7' => $rombelEkskutif7,
'rombelEkskutif8' => $rombelEkskutif8,
'rombelEkskutif9' => $rombelEkskutif9,
'rombelEkskutif10' => $rombelEkskutif10,

            'bersamaRPL' => $this->totalPendaftar->bersamaRPL(),
              'bersamaTKJ' => $this->totalPendaftar->bersamaTKJ(),
                'bersamaBC' => $this->totalPendaftar->bersamaBC(),
                  'bersamaMM' => $this->totalPendaftar->bersamaMM(),
                    'bersamaIPA' => $this->totalPendaftar->bersamaIPA(),
                      'bersamaIPS' => $this->totalPendaftar->bersamaIPS(),
                      'bersamaIPAE' => $this->totalPendaftar->totalEks('IPA EKSKUTIF', 'PPDB-B-SMAE%'),
                      'bersamaIPSE' => $this->totalPendaftar->totalEks('IPS EKSKUTIF', 'PPDB-B-SMAE%'),
            'rombelSMK' => $this->rombel->where('instansi', 'SMK')->get()->getResultObject(),
            'rombelSMA' => $this->rombel->where('instansi', 'SMA')->get()->getResultObject(),
        ];
        
        return view('admin/laporan/laporan', $data);
    }

}
