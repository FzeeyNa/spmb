<?php

namespace App\Controllers;

use App\Models\daftarUlangModel;
use App\Models\tesModel;
use App\Models\formulirModel;
use CodeIgniter\Validation\Rules;
use Config\App;

class DaftarUlang extends BaseController
{
    protected $daftarUlang;
    protected $tesModel;

    public function __construct()
    {
        $this->daftarUlang = new daftarUlangModel();
        $this->tesModel = new tesModel();
    }

    public function index()
    {

        $query = $this->daftarUlang->daftarUlangData();
        $blmVerif = $this->daftarUlang->blmVerif();
        $sdhVerifSMK = $this->daftarUlang->sdhVerifSMK();
        $sdhVerifSMKcicil = $this->daftarUlang->sdhVerifSMKcicil();
        $sdhVerifSMA = $this->daftarUlang->sdhVerifSMA();
        $sdhVerifSMAcicil = $this->daftarUlang->sdhVerifSMAcicil();
        $session = \Config\Services::session();
        if (session('level') == 'verifikator') {
            return redirect()->to(base_url('verifikator/daftarUlang'));
        }
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
            'sdhVerifSMAcicil' => $sdhVerifSMAcicil

        ];
        return view('admin/daftarUlang', $data);
    }

    public function edit()
    {
        if (!$this->validate([
            'kwitansi' => [
                'rules' => 'max_size[kwitansi,1024]|ext_in[kwitansi,png,jpg,gif,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('DaftarUlang'))->withInput();
        }


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

 
       

        $this->daftarUlang->editDataDaftarUlang($data, $idPembayaran);
        session()->setFlashdata('daftarUlangEdit', 'Data berhasil diubah');
      
   //    wa
      $nmPendaftar = $this->request->getPost('nmPendaftar');
        $hp = $this->request->getPost('hp');
              
       $yuhuu = [
        'api_key' => '91ee7fc9f9378603f88ca505eba5b75244e734e5',
        'sender'  => '6282315388686',
        'number'  => $hp,
        'message' => '*PPDB SEKOLAH PRESTASI PRIMA*
        
Selamat,'.$nmPendaftar.' Pembayaran Daftar Ulang telah berhasil di *verifikasi*.
Berikut bukti pembayaran, yang dapat di download pada link berikut:
    
'. base_url().'/assets/assets/img/vdaftarulang/'. $namabaru.'

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
            CURLOPT_POSTFIELDS => json_encode($yuhuu)
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);    

      
        return redirect()->to(base_url('DaftarUlang'));
    }

    public function delete($idPembayaran)
    {
        $this->daftarUlang->delete($idPembayaran);
        session()->setFlashdata('formulirHapus', 'Data telah dihapus');
        return redirect()->to(base_url('DaftarUlang'));
    }

    public function ambilStatus($idPendaftar)
    {
        $jenismodel = new DaftarUlang();
        $ambilstatus = $jenismodel->ambilStatus($idPendaftar);
        return json_encode($ambilstatus);
    }
}
