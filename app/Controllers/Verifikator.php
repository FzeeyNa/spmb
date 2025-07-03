<?php

namespace App\Controllers;

use App\Models\daftarUlangModel;
use App\Models\formulirModel;
use App\Models\jurusanModel;
use App\Models\registerModel;
use App\Models\tesModel;
use App\Models\userModel;
use App\Models\RombelModel;
use App\Models\pengumumanModel;
use CodeIgniter\Validation\Rules;
use Config\App;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Verifikator extends BaseController
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
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
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
            'daftarUlangIPS' => $daftarUlangIPS,
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar


        ];
        return view('verifikator/index', $data);
    }

    public function daftarSiswa()
    {
        helper('text');
        $idPendaftar = $this->registerModel->findAll();
        $ambilSekolah = $this->registerModel->ambilSekolah();
        //id otomatis
       $dariDB = $this->registerModel->idOtomatis();
if (!empty($dariDB)) {
    $nourut = (int) substr($dariDB, 6, 4);
} else {
    $nourut = 0; // Atur nilai default jika belum ada data
}
$nourut++;
$huruf = "PPDB22";
$kdPendaftar = $huruf . sprintf("%04s", $nourut);
        session();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'Form Registrasi Siswa',
            'idPendaftar' => $idPendaftar,
            'kodePendaftar' => $kdPendaftar,
            'ambilSekolah' => $ambilSekolah,
            'validasi' => \Config\Services::validation(),
            'pass' => random_string('alnum', 5),
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];


        return view('verifikator/daftarSiswa/daftar', $data);
    }

    public function simpan()
    {
        // if (!$this->validate([

        //     'email' => [
        //         'rules' => 'is_unique[pendaftaran.email]',
        //         'errors' => [
        //             'is_unique' => 'Maaf, Email Sudah Terdaftar'
        //         ]
        //     ]

        // ])) {
        //     return redirect()->to(base_url('verifikator/daftarSiswa'))->withInput();
        // }

        $today = date("Y-m-d H:i:s");


        // random pass
        helper('text');
        // masuk database
        $pass = $this->request->getVar('pass');
        $data = array(

            'idPendaftar' => $this->request->getVar('idPendaftar'),
            'noFormulir'        => $this->request->getVar('noFormulir'),
            'nmPendaftar'        => $this->request->getVar('nmPendaftar'),
            'asalSekolah'        => $this->request->getVar('asalSekolah'),
            'hp'                => $this->request->getVar('hp'),
            'email' => $this->request->getVar('email'),
            'status' => $this->request->getVar('status'),
            'tempatLahir' => $this->request->getVar('tempatLahir'),
            'tglLahir' => $this->request->getVar('tglLahir'),
            'agama' => $this->request->getVar('agama'),
            'ket' => $this->request->getVar('ket'),
            'sekolah' => $this->request->getVar('sekolah'),
            'kdJurusan' => $this->request->getVar('kdJurusan'),
            'hpOrtu' => $this->request->getVar('hpOrtu'),
            'alamat' => $this->request->getVar('alamat'),
            'jk' => $this->request->getVar('jk'),
            'statusTes' => 'belum',
            'statusPointSiswa' => 'belum',
            'statusPointOrtu' => 'belum',
            'statusdu' => 'belum',
            'password' => sha1($pass),
            'created_at' => $today,
            'updated_at' => $today,

        );

        $this->registerModel->savePendaftar($data);
        $emailPenerima = $this->request->getVar('email');
        $nama = $this->request->getVar('nmPendaftar');
        $username = $this->request->getVar('idPendaftar');
        session()->setFlashdata('password', $pass);
        session()->setFlashdata('nama', $nama);
        session()->setFlashdata('username', $username);
        session()->setFlashdata('register', 'Data Berhasil Disimpan');

        return redirect()->to(base_url('home/berhasil'));
    }

    public function dataPendaftar()
    {
        $idPendaftar = $this->registerModel->barudaftar();
        $totalPendaftar = $this->totalPendaftar->totalPendaftar();
        $totalPendaftarSMK = $this->totalPendaftar->totalPendaftarSMK();
        $totalPendaftarSMA = $this->totalPendaftar->totalPendaftarSMA();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'PPDB | Pendaftar',
            'active' => 'dataPendaftar',
            'idPendaftar' => $idPendaftar,
            'pend' => $totalPendaftar,
            'sma' => $totalPendaftarSMA,
            'smk' => $totalPendaftarSMK,
            'validasi' => \Config\Services::validation(),
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];
        return view('verifikator/pendaftar/dataPendaftar', $data);
    }

    public function edit()
    {

        $today = date("Y-m-d H:i:s");
        $id = $this->request->getPost('idPendaftar');
        $data = array(

            'nmPendaftar'        => $this->request->getPost('nmPendaftar'),
            'asalSekolah'        => $this->request->getPost('asalSekolah'),
            'hp' => $this->request->getPost('hp'),
              'hpOrtu' => $this->request->getPost('hpOrtu'),
            'email' => $this->request->getPost('email'),
            'tempatLahir' => $this->request->getPost('tempatLahir'),
            'tglLahir' => $this->request->getPost('tglLahir'),
            'agama' => $this->request->getPost('agama'),


            'ket' => $this->request->getPost('ket'),
            'sekolah' => $this->request->getPost('sekolah'),
            'kdJurusan' => $this->request->getPost('kdJurusan'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $today,

        );
        $this->registerModel->updatePendaftar($data, $id);
        session()->setFlashdata('pendaftarEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('verifikator/dataPendaftar'));
    }

    public function gantiPassword()
    {

        $id = $this->request->getPost('idPendaftar');
        $data = array(

            'password' => sha1($this->request->getPost('password')),

        );
        $this->registerModel->updatePendaftar($data, $id);
        session()->setFlashdata('pendaftarEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('verifikator/dataPendaftar'));
    }

    public function formulir()
    {

        $queryData = $this->formulirModel->formulirData();
        $blmVerif = $this->formulirModel->blmVerif();
        $sdhVerifSMA = $this->formulirModel->sdhVerifSMA();
        $sdhVerifSMK = $this->formulirModel->sdhVerifSMK();
        $blm = $this->formulirModel->belumDaftarUlang();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $session = \Config\Services::session();
        $data = [
            'title' => 'PPDB | Verifikasi Formulir',
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'formulir',
            'blm' => $blm,
            'queryData' => $queryData,
            'blmVerif' => $blmVerif,
            'sdhVerifSMA' => $sdhVerifSMA,
            'sdhVerifSMK' => $sdhVerifSMK,
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];
        return view('verifikator/formulir/Vformulir', $data);
    }

    public function editFormulir()
    {

        if (!$this->validate([
            // 'kwitansi' => [
            //     'rules' => 'max_size[kwitansi,1024]|ext_in[kwitansi,png,jpg,gif,jpeg]',
            //     'errors' => [
            //         'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
            //         'ext_in' => 'Format gambar tidak sesuai'
            //     ]
            // ],
            'noFormulir' => [
                'rules' => 'is_unique[pembayaran.noFormulir]',
                'errors' => [
                    'is_unique' => 'Maaf, Nomor Formulir Sudah Digunakan'
                ]
            ]

        ])) {
            return redirect()->to(base_url('verifikator/formulir'))->withInput();
        }


        if (!empty($_FILES['kwitansi']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('kwitansi');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vformulir/', $namabaru);
        } else {
            $namabaru = '';
        }

        if ($namabaru == '') {
            $namabaru = $this->request->getPost('old');
        }


        $today = date("Y-m-d H:i:s");
        $idPembayaran = $this->request->getPost('idPembayaran');
        $idPendaftar =  $this->request->getPost('idPendaftar');
        $data = array(

            'updated_at' => $today,

        );
        $data2 = array(
            'noFormulir' => $this->request->getPost('noFormulir'),
            'updated_at' => $today,
            'status' => 'sudah formulir',
            'verifikator' => $this->request->getPost('verifikator'),
            'kwitansi' => $namabaru
        );




        $this->formulirModel->editDataFormulir($data, $data2, $idPembayaran, $idPendaftar);
        session()->setFlashdata('formulirEdit', 'Data berhasil diubah');



        return redirect()->to(base_url('verifikator/formulir'));
    }

    public function daftarUlang()
    {

        $query = $this->daftarulang->daftarUlangData();
        $blmVerif = $this->daftarulang->blmVerif();
        $sdhVerifSMK = $this->daftarulang->sdhVerifSMK();
        $sdhVerifSMKcicil = $this->daftarulang->sdhVerifSMKcicil();
        $sdhVerifSMA = $this->daftarulang->sdhVerifSMA();
        $sdhVerifSMAcicil = $this->daftarulang->sdhVerifSMAcicil();
        $session = \Config\Services::session();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'PPDB | Verifikasi Daftar Ulang',
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'daftarUlang',
            'query' => $query,

            'blmVerif' => $blmVerif,
            'sdhVerifSMK' => $sdhVerifSMK,
            'sdhVerifSMKcicil' => $sdhVerifSMKcicil,
            'sdhVerifSMA' => $sdhVerifSMA,
            'sdhVerifSMAcicil' => $sdhVerifSMAcicil,
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];
        return view('verifikator/daftarUlang/daftarUlang', $data);
    }

    public function editDaftarUlang()
    {
        // if (!$this->validate([
        //     'kwitansi' => [
        //         'rules' => 'max_size[kwitansi,1024]|ext_in[kwitansi,png,jpg,gif,jpeg]',
        //         'errors' => [
        //             'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
        //             'ext_in' => 'Format gambar tidak sesuai'
        //         ]
        //     ]

        // ])) {
        //     return redirect()->to(base_url('Verifikator/daftarUlang'))->withInput();
        // }


        if (!empty($_FILES['kwitansi']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('kwitansi');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vdaftarulang/', $namabaru);
        } else {
            $namabaru = '';
        }

        if ($namabaru == '') {
            $namabaru = $this->request->getPost('old');
        }

        $today = date("Y-m-d H:i:s");

        $idPembayaran = $this->request->getPost('idPembayaran');
        $data = array(

            'totalPembayaran' => $this->request->getPost('totalPembayaran'),
            'updated_at' => $today,
            'kwitansi' => $namabaru,
            'status' => $this->request->getPost('status'),
            'verifikator' => $this->request->getPost('verifikator'),
        );




        $this->daftarulang->editDataDaftarUlang($data, $idPembayaran);
        session()->setFlashdata('daftarUlangEdit', 'Data berhasil diubah');

        //    wa
     


        return redirect()->to(base_url('verifikator/daftarUlang'));
    }



    public function ambilStatus($idPendaftar)
    {
        $jenismodel = new DaftarUlang();
        $ambilstatus = $jenismodel->ambilStatus($idPendaftar);
        return json_encode($ambilstatus);
    }

    public function tes()
    {
        $session = \Config\Services::session();
        $id = $this->tesModel->ambilTes();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'PPDB | Dasboard Admin',
            'id' => $id,
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'tes',
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar
        ];
        return view('verifikator/tes/tes', $data);
    }

    public function editTes()
    {

        $id = $this->request->getPost('noFormulir');
        $data = array(
            'tglTes' => $this->request->getPost('tglTes'),
            'status' => $this->request->getPost('status'),

        );
        $this->tesModel->updateTes($data, $id);
        session()->setFlashdata('tesEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('verifikator/tes'));
    }

    public function pengumuman()
    {
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $query = $this->pengumumanModel->findAll();
        $data = [
            'title' => 'PPDB | Pengumuman',
            'active' => 'pengumuman',
            'query' => $query,
            'validasi' => \Config\Services::validation(),
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar
        ];
        return view('verifikator/pengumuman/pengumuman', $data);
    }

    public function savePengumuman()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('verifikator/pengumuman'))->withInput();
        }


        if (!empty($_FILES['gambar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gambar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../ppdb/assets/assets/img/pengumuman/', $namabaru);
        } else {
            $namabaru = '';
        }
        // masuk database
        $today = date("Y-m-d H:i:s");
        $data = array(


            'judul' => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'gambar'        => $namabaru,
            'author'                => $this->request->getVar('author'),
            'status'             => $this->request->getVar('status'),
            'kategori'                => $this->request->getVar('kategori'),

            'created_at' => $today,
            'updated_at' => $today,


        );
        $this->pengumumanModel->savePengumuman($data);
        session()->setFlashdata('pengumumanBerhasil', 'Pengumuman Berhasil Ditambahkan');
        return redirect()->to(base_url('verifikator/pengumuman'));
    }
    public function delete($id)
    {
        $this->pengumumanModel->delete($id);
        session()->setFlashdata('pengumumanHapus', 'Data telah dihapus');
        return redirect()->to(base_url('verifikator/pengumuman'));
    }

    public function update($idpeng)
    {
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'Update Pengumuman',
            'idpeng' => $this->pengumumanModel->getPengumuman($idpeng)->getRow(),
            'active' => 'pengumuman',
            'validasi' => \Config\Services::validation(),
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar
        ];
        return view('verifikator/pengumuman/editPengumuman', $data);
    }

    public function editPengumuman()
    {
        $today = date("Y-m-d H:i:s");
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('verifikator/pengumuman'))->withInput();
        }


        if (!empty($_FILES['gambar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gambar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../ppdb/assets/assets/img/pengumuman/', $namabaru);
        } else {
            $namabaru = '';
        }

        if ($namabaru == '') {
            $namabaru = $this->request->getPost('old');
        }
        $id = $this->request->getPost('id');
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status'),
            'kategori' => $this->request->getPost('kategori'),
            'author' => $this->request->getPost('author'),
            'gambar' => $namabaru,
            'updated_at' => $today,

        );
        $this->pengumumanModel->updatePengumuman($data, $id);
        return redirect()->to(base_url('verifikator/pengumuman'));
    }

    public function gPassword($id)
    {
        $user = $this->usermodel->getUser($id)->getRow();

        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'Ganti Password',
            'active' => 'gPassword',
            'validasi' => \Config\Services::validation(),
            'gantiPass' => $user,
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];

        return view('verifikator/gPassword', $data);
    }

    public function gPasswordEdit()
    {

        if (!$this->validate([


            'passwordverif' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Maaf, Password Tidak Sesuai'
                ]
            ],

            'password' => [
                'rules' => 'min_length[6]',
                'errors' => [
                    'min_length' => 'Maaf, Password Terlalu Singkat'
                ]
            ]


        ])) {
            return redirect()->to(base_url('Verifikator/gPassword') . '/' . session('idUser'))->withInput();
        }

        $id = $this->request->getVar('idUser');
        $data = array(
            'password' => sha1($this->request->getVar('password')),



        );
        $this->usermodel->ubahPassword($data, $id);
        session()->setFlashdata('pointSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('verifikator/gPassword') . '/' . session('idUser'));
    }

    public function konfirmasi()
    {
        $dariDB = $this->formulirModel->idOtomatis();
        $nourut = (int) substr($dariDB, 5, 4);
        $nourut++;
        $huruf = "FORM-";
        $kdPembayaran = $huruf . sprintf("%04s", $nourut);
        session();
        $keyword = $this->request->getVar('keyword');

        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $idPendaftar = $this->registerModel->search($keyword);
        $idPendaftar2 = $this->daftarulang->search($keyword);
        $data = [
            'title' => 'Pembelian Formulir',
            'active' => 'konfirmasi',
            'validasi' => \Config\Services::validation(),
            'kdPembayaran' => $kdPembayaran,
            'idPendaftar' => $idPendaftar,
            'idPendaftar2' => $idPendaftar2,
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar


        ];
        return view('verifikator/konfirmasi/konfirmasi', $data);
    }




    public function saveFormulir()
    {
        if (!$this->validate([
            // 'gbrBuktiBayar' => [
            //     'rules' => 'uploaded[gbrBuktiBayar]|max_size[gbrBuktiBayar,1024]|ext_in[gbrBuktiBayar,png,jpg,gif,jpeg]',
            //     'errors' => [
            //         'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
            //         'ext_in' => 'Format gambar tidak sesuai'
            //     ]
            // ],
            'idPendaftar' => [
                'rules' => 'is_unique[pembayaran.idPendaftar]',
                'errors' => [
                    'is_unique' => 'Maaf, Calon Siswa Sudah Melakukan Konfirmasi Pembelian Formulir'
                ]
            ]

        ])) {
            return redirect()->to(base_url('verifikator/formulir'))->withInput();
        }


        if (!empty($_FILES['gbrBuktiBayar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gbrBuktiBayar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vformulir/', $namabaru);
}else{
            // masuk database
            $today = date("Y-m-d H:i:s");
            $data = array(

                'idPembayaran'        => $this->request->getVar('idPembayaran'),
                'noFormulir' => '',
                'jnsPembayaran'        => 'formulir',
                'tglPembayaran'        => $this->request->getVar('tglPembayaran'),
                'totalPembayaran'                => $this->request->getVar('totalPembayaran'),
                // 'gbrBuktiBayar'             => $namabaru,
                'status'                => 'pending',
                'idPendaftar'             => $this->request->getVar('idPendaftar'),
                'created_at' => $today,
                'updated_at' => $today,


            );





            $this->formulirModel->saveKonfirmasi($data);
            session()->setFlashdata('konfirmasiBerhasil', 'Berhasil Konfirmasi, Mohon Tunggu Verifikasi Dari Panitia PPDB');


            return redirect()->to(base_url('verifikator/konfirmasi'));
        }
    
    }

    public function simpanDaftarUlang()
    {
        if (!$this->validate([
            // 'gbrBuktiBayar' => [
            //     'rules' => 'uploaded[gbrBuktiBayar]|max_size[gbrBuktiBayar,1024]|ext_in[gbrBuktiBayar,png,jpg,gif,jpeg]',
            //     'errors' => [
            //         'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
            //         'ext_in' => 'Format gambar tidak sesuai'
            //     ]
            // ],
            'idPendaftar' => [
                'rules' => 'is_unique[daftarulang.idPendaftar]',
                'errors' => [
                    'is_unique' => 'Maaf, Anda Sudah Melakukan Konfirmasi'
                ]
            ]

        ])) {
            return redirect()->to(base_url('verifikator/konfirmasi'))->withInput();
        }


        if (!empty($_FILES['gbrBuktiBayar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gbrBuktiBayar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vdaftarulang/', $namabaru);
}else{
            // masuk database
            $today = date("Y-m-d H:i:s");
            $data = array(

                'idPembayaran'        => $this->request->getVar('idPembayaran'),
                'noFormulir' => $this->request->getVar('noFormulir'),
                'jnsPembayaran'        => 'daftar ulang',
                'tglPembayaran'        => $this->request->getVar('tglPembayaran'),
                'totalPembayaran'                => $this->request->getVar('totalPembayaran'),
                // 'gbrBuktiBayar'             => $namabaru,
                  'gbrBuktiBayar' => '',
                'status'                => 'pending',
                'idPendaftar'             => $this->request->getVar('idPendaftar'),
                'created_at' => $today,
                'updated_at' => $today,


            );


            // wa otomatis

            $this->daftarulang->saveKonfirmasi($data);
            session()->setFlashdata('konfirmasiBerhasil', 'Berhasil Konfirmasi, Mohon Tunggu Verifikasi Dari Panitia PPDB');

            return redirect()->to(base_url('verifikator/dataPendaftar'));
        }
    }
     public function statusPendaftar()
    {
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $id = $this->registerModel->findAll();
        $data = [
            'title' => 'Status Pendaftaran Peserta PPDB 2022/2023',
            'id' => $id,
            'active' => 'statusPendaftar',
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar
        ];
        return view('verifikator/status/statusPendaftar', $data);
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
        
        return view('verifikator/laporan/laporan', $data);
    }
    
      public function exportPendaftar()
    {
        try {
            $dataPendaftar = $this->registerModel->findAll();
            
            if (empty($dataPendaftar)) {
                return $this->response->setJSON(['error' => 'Tidak ada data pendaftar']);
            }

            $spreadsheet = new Spreadsheet();
            // tulis header/nama kolom 
            $spreadsheet->setActiveSheetIndex(0)
             ->setCellValue('A1', 'No')
                ->setCellValue('B1', 'ID Pendaftar')
                ->setCellValue('C1', 'No Formulir')
                ->setCellValue('D1', 'Nama')
                ->setCellValue('E1', 'Alamat')
                ->setCellValue('F1', 'Tgl Mendaftar')
                ->setCellValue('G1', 'Asal Sekolah')
                ->setCellValue('H1', 'No HP Siswa')
                ->setCellValue('I1', 'No HP Ortu')
                ->setCellValue('J1', 'Pilihan Sekolah')
                ->setCellValue('K1', 'Jurusan')
                ->setCellValue('L1', 'Agama');

            $column = 2;
            $no = 1;
            // tulis data mobil ke cell
            foreach ($dataPendaftar as $data) {
                $spreadsheet->setActiveSheetIndex(0)
                 ->setCellValue('A' . $column, $no++)
                    ->setCellValue('B' . $column, $data['idPendaftar'])
                    ->setCellValue('C' . $column, $data['noFormulir'])
                     ->setCellValue('D' . $column, $data['nmPendaftar'])
                    ->setCellValue('E' . $column, $data['alamat'])
                    ->setCellValue('F' . $column, $data['created_at'])
                    ->setCellValue('G' . $column, $data['asalSekolah'])
                    ->setCellValue('H' . $column, $data['hp'])
                    ->setCellValue('I' . $column, $data['hpOrtu'])
                    ->setCellValue('J' . $column, $data['sekolah'])
                    ->setCellValue('K' . $column, $data['kdJurusan'])
                    ->setCellValue('L' . $column, $data['agama']);

                $column++;
            }

            // tulis dalam format .xlsx
            $writer = new Xlsx($spreadsheet);
            $fileName = 'Data Pendaftar PPDB 2022 - 2023';

            // Redirect hasil generate xlsx ke web client
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
            header('Cache-Control: max-age=0');

            ob_end_clean(); // Clear output buffer
            $writer->save('php://output');
            exit();

        } catch (\Exception $e) {
            return $this->response->setJSON(['error' => 'Terjadi kesalahan saat mengekspor data: ' . $e->getMessage()]);
        }
    }
    public function printPendaftar()
    {
        $idPendaftar = $this->registerModel->barudaftar();
        $totalPendaftar = $this->totalPendaftar->totalPendaftar();
        $totalPendaftarSMK = $this->totalPendaftar->totalPendaftarSMK();
        $totalPendaftarSMA = $this->totalPendaftar->totalPendaftarSMA();
        $blmVerifFormulir = $this->formulirModel->blmVerif();
        $blmVerifDaftar = $this->daftarulang->blmVerif();
        $data = [
            'title' => 'Data Pendaftar PPDB 2022 - 2023',
            'active' => 'dataPendaftar',
            'idPendaftar' => $idPendaftar,
            'pend' => $totalPendaftar,
            'sma' => $totalPendaftarSMA,
            'smk' => $totalPendaftarSMK,
            'validasi' => \Config\Services::validation(),
            'blmVerifFormulir' => $blmVerifFormulir,
            'blmVerifDaftar' => $blmVerifDaftar

        ];
        return view('verifikator/pendaftar/printPendaftar', $data);
    }
    public function printKartuTPA($id){
       $tess = $this->tesModel->getTes($id)->getRow();
        $pendaftar = $this->registerModel->getNama($id)->getRow();
        $data = [
            'title' => 'Kartu Peserta TPA SMA & SMK Prestasi Prima TP 2022/2023',
             'tess' => $tess,
            'pendaftar' => $pendaftar
            
            ];
          
        return view('verifikator/pendaftar/printKartuTPA', $data);
    }
      public function exportTPA()
    {
        $dataPendaftar = $this->tesModel->ambilTes();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
         
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Formulir')
             ->setCellValue('C1', 'Password')
              ->setCellValue('D1', 'Nama Pendaftar')
               ->setCellValue('E1', 'Instansi')
               ->setCellValue('F1', 'Jurusan')
               ->setCellValue('G1', 'Tanggal Tes')
               ->setCellValue('H1', 'Status');



        $column = 2;
        $no = 1;
        // tulis data mobil ke cell
        foreach ($dataPendaftar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
             ->setCellValue('A' . $column, $no++)
                
                ->setCellValue('B' . $column, $data['noFormulir'])
                 ->setCellValue('C' . $column, $data['password'])
                  ->setCellValue('D' . $column, $data['nmPendaftar'])
                   ->setCellValue('E' . $column, $data['sekolah'])
                    ->setCellValue('F' . $column, $data['kdJurusan'])
                     ->setCellValue('G' . $column, $data['tglTes'])
                      ->setCellValue('H' . $column, $data['status']);

            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data TPA PPDB 2022 - 2023';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
      public function exportDaftarUlang()
    {
        $dataPendaftar = $this->daftarulang->daftarUlangData();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
         
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Formulir')
             ->setCellValue('C1', 'Nama Siswa')
              ->setCellValue('D1', 'Jurusan')
               ->setCellValue('E1', 'Tanggal Bayar')
               ->setCellValue('F1', 'Pembayaran')
                ->setCellValue('G1', 'Agama')
                ->setCellValue('H1', 'Jenis Kelamin')
                ->setCellValue('I1', 'HP Siswa')
                 ->setCellValue('J1', 'HP Ortu');



        $column = 2;
        $no = 1;
        // tulis data mobil ke cell
        foreach ($dataPendaftar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
             ->setCellValue('A' . $column, $no++)
                
                ->setCellValue('B' . $column, $data['noFormulir'])
                 ->setCellValue('C' . $column, $data['nmPendaftar'])
                  ->setCellValue('D' . $column, $data['kdJurusan'])
                   ->setCellValue('E' . $column, $data['tglPembayaran'])
                    ->setCellValue('F' . $column, $data['totalPembayaran'])
                    ->setCellValue('G' . $column, $data['agama'])
                    ->setCellValue('H' . $column, $data['jk'])
                    ->setCellValue('I' . $column, $data['hp'])
                    ->setCellValue('J' . $column, $data['hpOrtu']);

            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Daftar Ulang PPDB 2022 - 2023';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
       public function exportFormulir()
    {
        $dataPendaftar = $this->formulirModel->formulirData();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
         
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Formulir')
             ->setCellValue('C1', 'Nama Siswa')
              ->setCellValue('D1', 'Jurusan')
               ->setCellValue('E1', 'Tanggal Bayar')
               ->setCellValue('F1', 'Asal Sekolah')
                ->setCellValue('G1', 'Agama')
                 ->setCellValue('H1', 'HP Siswa')
                  ->setCellValue('I1', 'HP Ortu');



        $column = 2;
        $no = 1;
        // tulis data mobil ke cell
        foreach ($dataPendaftar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
             ->setCellValue('A' . $column, $no++)
                
                ->setCellValue('B' . $column, $data['noFormulir'])
                 ->setCellValue('C' . $column, $data['nmPendaftar'])
                  ->setCellValue('D' . $column, $data['kdJurusan'])
                   ->setCellValue('E' . $column, $data['tglPembayaran'])
                    ->setCellValue('F' . $column, $data['asalSekolah'])
                    ->setCellValue('G' . $column, $data['agama'])
                    ->setCellValue('H' . $column, $data['hp'])
                    ->setCellValue('I' . $column, $data['hpOrtu']);

            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Pembelian Formulir PPDB 2022 - 2023';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
     public function exportBelumDaftarUlang()
    {
        $dataPendaftar = $this->formulirModel->belumDaftarUlang();
        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
         
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No Formulir')
             ->setCellValue('C1', 'Nama Siswa')
              ->setCellValue('D1', 'Jurusan')
               ->setCellValue('F1', 'Asal Sekolah')
                 ->setCellValue('G1', 'HP Siswa')
                  ->setCellValue('H1', 'HP Ortu');



        $column = 2;
        $no = 1;
        // tulis data mobil ke cell
        foreach ($dataPendaftar as $data) {
            $spreadsheet->setActiveSheetIndex(0)
             ->setCellValue('A' . $column, $no++)
                
                ->setCellValue('B' . $column, $data['noFormulir'])
                 ->setCellValue('C' . $column, $data['nmPendaftar'])
                  ->setCellValue('D' . $column, $data['kdJurusan'])
                   ->setCellValue('E' . $column, $data['tglPembayaran'])
                    ->setCellValue('F' . $column, $data['asalSekolah'])
                    ->setCellValue('G' . $column, $data['hp'])
                    ->setCellValue('H' . $column, $data['hpOrtu']);

            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Belum Daftar Ulang PPDB 2022 - 2023';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    
    public function updateRombelSMK()
{
    $request = service('request');
    $dataInput = $request->getPost('data');
    $rombelGlobal = $request->getPost('rombel_global');

   

    foreach ($dataInput as $row) {
        $this->rombel->where('kdJurusan', $row['kdJurusan'])
              ->set([
                  'target' => $row['target'],
                  'rombel' => $rombelGlobal
              ])->update();
    }

    return redirect()->back()->with('success', 'Data rombel dan target berhasil diperbarui.');
}
public function updateRombelSMA() 
{
    $request = service('request');
    $dataInput = $request->getPost('data');
    $rombelBiasa = $request->getPost('rombel_biasa');
    $rombelEkskutif = $request->getPost('rombel_ekskutif');

    foreach ($dataInput as $row) {
        // Tentukan nilai rombel berdasarkan jenis jurusan
        $rombel = (strpos(strtoupper($row['kdJurusan']), 'EKSKUTIF') !== false)
            ? $rombelEkskutif
            : $rombelBiasa;

        $this->rombel->where('kdJurusan', $row['kdJurusan'])
              ->set([
                  'target' => $row['target'],
                  'rombel' => $rombel
              ])->update();
    }

    return redirect()->back()->with('success', 'Data rombel dan target berhasil diperbarui.');
}


}
