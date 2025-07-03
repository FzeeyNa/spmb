<?php

namespace App\Controllers;

use App\Models\tesModel;
use App\Models\formulirModel;
use CodeIgniter\Validation\Rules;
use Config\App;

class Formulir extends BaseController
{
    protected $formulirModel;
    protected $tesModel;
    protected $blmDaftarUlang;
    public function __construct()
    {
        $this->formulirModel = new formulirModel();
        $this->tesModel = new tesModel();
    }

    public function index()
    {

        $queryData = $this->formulirModel->formulirData();
        $blmVerif = $this->formulirModel->blmVerif();
        $sdhVerifSMA = $this->formulirModel->sdhVerifSMA();
        $sdhVerifSMK = $this->formulirModel->sdhVerifSMK();
        $blm = $this->formulirModel->belumDaftarUlang();
        $session = \Config\Services::session();
        if (session('level') == 'verifikator') {
            return redirect()->to(base_url('verifikator/formulir'));
        }
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

        ];
        return view('admin/formulir', $data);
    }

    public function edit()
    {
        helper('download');
        if (!$this->validate([
            'kwitansi' => [
                'rules' => 'max_size[kwitansi,1024]|ext_in[kwitansi,png,jpg,gif,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('formulir'))->withInput();
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
            'nmPendaftar' => $this->request->getPost('nmPendaftar'),
            'asalSekolah' => $this->request->getPost('asalSekolah'),
            'tempatLahir' => $this->request->getPost('tempatLahir'),
            'tglLahir' => $this->request->getPost('tglLahir'),
            'agama' => $this->request->getPost('agama'),
            'email' => $this->request->getPost('email'),
            'hp' => $this->request->getPost('hp'),
            'sekolah' => $this->request->getPost('sekolah'),
            'kdJurusan' => $this->request->getPost('kdJurusan'),
            'alamat' => $this->request->getPost('alamat'),
            'hpOrtu' => $this->request->getPost('hpOrtu'),
            'updated_at' => $today,

        );
        $data2 = array(
            'noFormulir' => $this->request->getPost('noFormulir'),
            'updated_at' => $today,
            'status' => $this->request->getPost('status'),
            'verifikator' => $this->request->getPost('verifikator'),
            'kwitansi' => $namabaru
        );




        $this->formulirModel->editDataFormulir($data, $data2, $idPembayaran, $idPendaftar);
        session()->setFlashdata('formulirEdit', 'Data berhasil diubah');

        //    wa
      $nmPendaftar = $this->request->getPost('nmPendaftar');
        $hp = $this->request->getPost('hp');
              
       $waotomatis = [
        'api_key' => '91ee7fc9f9378603f88ca505eba5b75244e734e5',
        'sender'  => '6282315388686',
        'number'  => $hp,
        'message' => '*PPDB SEKOLAH PRESTASI PRIMA*
        
Selamat, '.$nmPendaftar.' pembelian formulirmu telah berhasil di *verifikasi*.
Berikut bukti pembayaran, yang dapat di download pada link berikut:
    
'. base_url().'/assets/assets/img/vformulir/'. $namabaru.'

Jika ada pertanyaan dapat segera menghubungi kami
Panitia: 082315388686

Salam hormat,
Panitia PPDB Sekolah Prestasi Prima'

    ];

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => "https://wa.rplsmkpp.online/api/send-message.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($waotomatis)
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);

        return redirect()->to(base_url('formulir'));
    }

    public function delete($idPembayaran)
    {
        $this->formulirModel->delete($idPembayaran);
        session()->setFlashdata('formulirHapus', 'Data telah dihapus');
        return redirect()->to(base_url('formulir'));
    }

    
}
