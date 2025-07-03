<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\SIMLibrary;
use App\Models\daftarUlangModel;
use App\Models\formulirModel;
use App\Models\pengumumanModel;
use App\Models\PointerModel;
use App\Models\PointerOrtuModel;
use App\Models\registerModel;
use App\Models\tesModel;
use CodeIgniter\Validation\Rules;
use Config\Services;

class Siswa extends BaseController
{
    protected $pendaftarModel;
    protected $formulirModel;
    protected $pengumumanModel;
    protected $tesModel;
    protected $daftarUlangModel;
    protected $registerModel;
    protected $pointerSiswa;
    protected $pointerOrtu;
    protected $SIMLib;

    public function __construct()
    {
        $this->pendaftarModel = new registerModel();
        $this->formulirModel = new formulirModel();
        $this->pengumumanModel = new pengumumanModel();
        $this->tesModel = new tesModel();
        $this->daftarUlangModel = new daftarUlangModel();
        $this->registerModel = new registerModel();
        $this->pointerSiswa = new PointerModel();
        $this->pointerOrtu = new PointerOrtuModel();
        $this->SIMLib = new SIMLibrary();
    }
    public function dashboard($id)
    {
        $idPendaftar = $this->pendaftarModel->findAll();
        //id otomatis

        session();
        $user = $this->registerModel->getAktifitas(base64_decode($id))->getRow();
        $tesp = $this->tesModel->getAktivityTes(base64_decode($id))->getRow();
        $daft = $this->daftarUlangModel->ambilStatusDaftarUlang(base64_decode($id))->getRow();
        $wawancaraSiswa = $this->pointerSiswa->getPointerSiswa(base64_decode($id))->getRow();
        $data = [
            'title' => 'Dashboard Siswa',
            'active' => 'dashboard',
            'aktifitas' => $user,
            'tesp' => $tesp,
            'daft' => $daft,
            'wawancaraSiswa' => $wawancaraSiswa,
            'dataPendaftar' => $idPendaftar,
            'validasi' => \Config\Services::validation(),

        ];
        return view('siswa/sDashboard', $data);
    }
    public function formulir()
    {
        $dariDB = $this->formulirModel->idOtomatis();
        $nourut = (int) substr($dariDB, 5, 4);
        $nourut++;
        $huruf = "FORM-";
        $kdPembayaran = $huruf . sprintf("%04s", $nourut);
        session();

        // $formulir_data = $this->formulirModel->getDataByStudentId(session('idPendaftar'));
        $formulir_data = $this->formulirModel->getDataByStudentId(session('idPendaftar'));
        if (!$formulir_data) {
            $formulir_data = [
                'idPembayaran' => '',
                'noFormulir' => '',
                'jnsPembayaran' => '',
                'tglPembayaran' => '',
                'totalPembayaran' => '',
                'gmbBuktiBayar' => '',
                'status' => '',
                'idPendaftar' => session('idPendaftar'),
                'kwitansi' => '',
                'invoice_id' => '',
                'invoice_payment_status' => '',
                'invoice_payment_date' => '',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
        }

        $data = [
            'title' => 'Pembelian Formulir',
            'active' => 'sformulir',
            'validasi' => \Config\Services::validation(),
            'kdPembayaran' => $kdPembayaran,
            'formulir_data' => $formulir_data
        ];

        return view('siswa/sFormulir', $data);
    }




    public function save()
    {
        if (!$this->validate([
            'gbrBuktiBayar' => [
                'rules' => 'uploaded[gbrBuktiBayar]|max_size[gbrBuktiBayar,1024]|ext_in[gbrBuktiBayar,png,jpg,gif,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ],
            'idPendaftar' => [
                'rules' => 'is_unique[pembayaran.idPendaftar]',
                'errors' => [
                    'is_unique' => 'Maaf, Anda Sudah Melakukan Konfirmasi'
                ]
            ]

        ])) {
            return redirect()->to(base_url('siswa/formulir'))->withInput();
        }


        if (!empty($_FILES['gbrBuktiBayar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gbrBuktiBayar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vformulir/', $namabaru);

            // masuk database
            $today = date("Y-m-d H:i:s");
            $data = array(

                'idPembayaran'        => $this->request->getVar('idPembayaran'),
                'noFormulir' => '',
                'jnsPembayaran'        => 'formulir',
                'tglPembayaran'        => $this->request->getVar('tglPembayaran'),
                'totalPembayaran'                => $this->request->getVar('totalPembayaran'),
                'gbrBuktiBayar'             => $namabaru,
                'status'                => 'pending',
                'idPendaftar'             => $this->request->getVar('idPendaftar'),
                'created_at' => $today,
                'updated_at' => $today,


            );


            // wa otomatis
            //                         $nama = $this->request->getVar('nmPendaftar');
            //                         $hp = $this->request->getVar('hp');
            //                         $waotomatis = [
            //                             'api_key' => '91ee7fc9f9378603f88ca505eba5b75244e734e5',
            //                             'sender'  => '6282315388686',
            //                             'number'  => $hp,
            //                             'message' => "Terima kasih, " . "*" . $nama . "* " .
            // "sudah melakukan pembelian formulir pendaftaran di Sekolah Prestasi Prima. Mohon untuk menunggu proses verifikasi dari Panitia, maksimal 1x24 Jam.

            // Untuk melanjutkan proses pendaftaran, silahkan mengakses kembali portal:
            // https://ppdb.prestasiprima.sch.id/sign-in

            // Info lanjut dapat menghubungi:
            // Panitia: 082315388686"
            //                         ];

            //                         $curl = curl_init();
            //                         curl_setopt_array(
            //                             $curl,
            //                             array(
            //                                 CURLOPT_URL => "https://wa.rplsmkpp.online/api/send-message.php",
            //                                 CURLOPT_RETURNTRANSFER => true,
            //                                 CURLOPT_ENCODING => "",
            //                                 CURLOPT_MAXREDIRS => 10,
            //                                 CURLOPT_TIMEOUT => 0,
            //                                 CURLOPT_FOLLOWLOCATION => true,
            //                                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //                                 CURLOPT_CUSTOMREQUEST => "POST",
            //                                 CURLOPT_POSTFIELDS => json_encode($waotomatis)
            //                             )
            //                         );

            //                         $response = curl_exec($curl);

            //                         curl_close($curl);


            $this->formulirModel->saveKonfirmasi($data);
            session()->setFlashdata('konfirmasiBerhasil', 'Berhasil Konfirmasi, Mohon Tunggu Verifikasi Dari Panitia PPDB');


            return redirect()->to(base_url('siswa/formulir'));
        }
    }

    public function pengumuman()
    {
        $pengumuman = $this->pengumumanModel->listPengumuman();
        $data = [
            'title' => 'Pengumuman',
            'active' => 'pengumuman',
            'pengumuman' => $pengumuman
        ];

        return view('siswa/sPengumuman', $data);
    }

    public function tes($id)
    {

        $user = $this->tesModel->getTes(base64_decode($id))->getRow();
        $tes = $this->tesModel->ambilTes();

        $data = [
            'title' => 'Tes Potensi Akademik',
            'active' => 'tes',
            'formu' => $user,
            'tes' => $tes
        ];

        return view('siswa/sTes', $data);
    }


    public function daftarUlang()
    {
        $rereg_data = $this->daftarUlangModel->getDataByStudentId(session('idPendaftar'));
        session();
        $data = [
            'title' => 'Pembayaran Daftar Ulang',
            'active' => 'daftarUlang',
            'validasi' => \Config\Services::validation(),
            'rereg_data' => $rereg_data
        ];
        return view('siswa/sDaftarUlang', $data);
    }


    public function simpanDaftarUlang()
    {
        if (!$this->validate([
            'gbrBuktiBayar' => [
                'rules' => 'uploaded[gbrBuktiBayar]|max_size[gbrBuktiBayar,1024]|ext_in[gbrBuktiBayar,png,jpg,gif,jpeg]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ],
            'idPendaftar' => [
                'rules' => 'is_unique[daftarulang.idPendaftar]',
                'errors' => [
                    'is_unique' => 'Maaf, Anda Sudah Melakukan Konfirmasi'
                ]
            ]

        ])) {
            return redirect()->to(base_url('siswa/daftar-ulang'))->withInput();
        }


        if (!empty($_FILES['gbrBuktiBayar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gbrBuktiBayar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../../ppdb/assets/assets/img/vdaftarulang/', $namabaru);

            // masuk database
            $today = date("Y-m-d H:i:s");
            $data = array(

                'idPembayaran'        => $this->request->getVar('idPembayaran'),
                'noFormulir' => $this->request->getVar('noFormulir'),
                'jnsPembayaran'        => 'daftar ulang',
                'tglPembayaran'        => $this->request->getVar('tglPembayaran'),
                'totalPembayaran'                => $this->request->getVar('totalPembayaran'),
                'gbrBuktiBayar'             => $namabaru,
                'status'                => 'pending',
                'idPendaftar'             => $this->request->getVar('idPendaftar'),
                'created_at' => $today,
                'updated_at' => $today,


            );


            // wa otomatis

            $this->daftarUlangModel->saveKonfirmasi($data);
            session()->setFlashdata('konfirmasiBerhasil', 'Berhasil Konfirmasi, Mohon Tunggu Verifikasi Dari Panitia PPDB');

            return redirect()->to(base_url('siswa/daftar-ulang'));
        }
    }

    public function pointerSiswa($id)
    {

        $user = $this->pointerSiswa->getPointerSiswa(base64_decode($id))->getRow();


        $data = [
            'title' => 'Pointer Wawancara Calon Siswa',
            'active' => 'pointerSiswa',
            'pointSiswa' => $user,

        ];

        return view('siswa/sPointerSiswa', $data);
    }

    public function simpanPointerSiswa()
    {
        $id = $this->request->getVar('idPendaftar');
        $today = date("Y-m-d H:i:s");
        // masuk database
        $data = array(


            'nmPendaftar'        => $this->request->getVar('nmPendaftar'),
            'hp'        => $this->request->getVar('hp'),
            'jk'                => $this->request->getVar('jk'),
            'noFormulir' => $this->request->getVar('noFormulir'),
            'sekolah' => $this->request->getVar('sekolah'),
            'kdJurusan' => $this->request->getVar('kdJurusan'),
            'peraturan1' => $this->request->getVar('peraturan1'),
            'peraturan2' => $this->request->getVar('peraturan2'),
            'peraturan3' => $this->request->getVar('peraturan3'),
            'peraturan4' => $this->request->getVar('peraturan4'),
            'status' => 'sudah',
            'created_at' => $today,
            'updated_at' => $today,

        );
        $this->pointerSiswa->updatePointerSiswa($data, $id);
        session()->setFlashdata('pointSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('siswa/pointerSiswa/') . '/' . base64_encode(session('idPendaftar')));
    }

    public function pointerOrtu($id)
    {

        $user = $this->pointerOrtu->getPointerOrtu(base64_decode($id))->getRow();


        $data = [
            'title' => 'Pointer Wawancara Orang Tua Calon Siswa',
            'active' => 'pointerOrtu',
            'pointOrtu' => $user,

        ];

        return view('siswa/sPointerOrtu', $data);
    }

    public function simpanPointerOrtu()
    {
        $id = $this->request->getVar('idPendaftar');
        $today = date("Y-m-d H:i:s");
        // masuk database
        $data = array(


            'nmPendaftar'        => $this->request->getVar('nmPendaftar'),
            'hpOrtu1'        => $this->request->getVar('hpOrtu1'),
            'hpOrtu2'        => $this->request->getVar('hpOrtu2'),
            'nmAyah' => $this->request->getVar('nmAyah'),
            'nmIbu' => $this->request->getVar('nmIbu'),
            'noFormulir' => $this->request->getVar('noFormulir'),


            'pertanyaan1' => $this->request->getVar('pertanyaan1'),
            'pertanyaan2' => $this->request->getVar('pertanyaan2'),
            'pertanyaan3' => $this->request->getVar('pertanyaan3'),
            'pertanyaan4' => $this->request->getVar('pertanyaan4'),
            'status' => 'sudah',
            'created_at' => $today,
            'updated_at' => $today,

        );
        $this->pointerOrtu->updatePointerOrtu($data, $id);
        session()->setFlashdata('pointSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('siswa/pointerOrtu/') . '/' . base64_encode(session('idPendaftar')));
    }

    public function gantiPass($id)
    {
        $user = $this->registerModel->getPendaftar(base64_decode($id))->getRow();


        $data = [
            'title' => 'Ganti Password',
            'active' => 'gantiPass',
            'validasi' => \Config\Services::validation(),
            'gantiPass' => $user,

        ];

        return view('siswa/sGantiPass', $data);
    }

    public function gantiPassEdit()
    {

        if (!$this->validate([

            sha1('passwordLama') => [
                'rules' => 'matches[pendaftaran.password]',
                'errors' => [
                    'matches' => 'Maaf, Password Lama Tidak Sesuai'
                ]
            ],
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
            return redirect()->to(base_url('siswa/gantiPass/') . '/' . base64_encode(session('idPendaftar')))->withInput();
        }

        $id = $this->request->getVar('idPendaftar');
        $data = array(
            'password' => sha1($this->request->getVar('password')),



        );
        $this->registerModel->ubahPassword($data, $id);
        session()->setFlashdata('pointSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('siswa/gantiPass/') . '/' . base64_encode(session('idPendaftar')));
    }

    /**
     * checkFormulirPayment
     *
     * @param  mixed $id
     * @return void
     */
    public function checkFormulirPayment($id)
    {

        $formulir_data = $this->formulirModel->getDataByStudentId($id);

        $url = "/api/v1/transaction-ppdb/{$formulir_data['invoice_id']}/detail";
        $result = $this->SIMLib->sendData($url, 'GET');
        if ($result['status']) {
            $data = $result['body']['data'];

            if ($data['is_processed']) {
                $formulir_update_data = [
                    'status' => 'lunas',
                    'invoice_payment_status' => 'dibayar',
                    'invoice_payment_date' => $data['processed_at']
                ];

                $result = $this->formulirModel->updateKonfirmasi($formulir_update_data, $formulir_data['idPembayaran']);
                session()->setFlashdata('success_message', 'Tagihan sudah dilakukan pembayaran');
            } else {
                session()->setFlashdata('info_message', 'Tagihan belum dilakukan pembayaran');
            }

            return redirect()->to(base_url('siswa/formulir'));
        } else {
            session()->setFlashdata('info_message', 'Tidak dapat melakukan pengecekan tagihan');
        }

        return redirect()->to(base_url('siswa/formulir'));
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function resendInvoice($id)
    {
        $formulir_data = $this->formulirModel->getDataByStudentId($id);

        if ($formulir_data['invoice_id'] != null) {
            $url = "/api/v1/transaction-ppdb/{$formulir_data['invoice_id']}/invoice-wa-notif";
            $result = $this->SIMLib->sendData($url, 'GET');

            // var_dump($formulir_data);
            // die();

            if ($result['status']) {
                session()->setFlashdata('success_message', 'Tagihan berhasil dikirim');
                return redirect()->to(base_url('siswa/formulir'));
            } else {
                session()->setFlashdata('info_message', 'Tagihan gagal dikirim');
            }
        }

        return redirect()->to(base_url('siswa/formulir'));
    }

    /**
     * checkFormulirPayment
     *
     * @param  mixed $id
     * @return void
     */
    public function checkReregPayment($id)
    {

        $rereg_data = $this->daftarUlangModel->getDataByStudentId($id);

        $url = "/api/v1/transaction-ppdb/{$rereg_data['invoice_id']}/detail";
        $result = $this->SIMLib->sendData($url, 'GET');
        if ($result['status']) {
            $data = $result['body']['data'];

            if ($data['is_processed']) {
                $formulir_update_data = [
                    'status' => 'lunas',
                    'totalPembayaran' => $data['total_amount'],
                    'invoice_payment_status' => 'dibayar',
                    'invoice_payment_date' => $data['processed_at']
                ];

                $result = $this->daftarUlangModel->updateKonfirmasi($formulir_update_data, $rereg_data['idPembayaran']);

                session()->setFlashdata('success_message', 'Tagihan sudah dilakukan pembayaran');
            } else {
                session()->setFlashdata('info_message', 'Tagihan belum dilakukan pembayaran');
            }

            return redirect()->to(base_url('siswa/daftar-ulang'));
        } else {
            session()->setFlashdata('info_message', 'Tidak dapat melakukan pengecekan tagihan');
        }



        return redirect()->to(base_url('siswa/daftar-ulang'));
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function resendReregInvoice($id)
    {
        $rereg_data = $this->daftarUlangModel->getDataByStudentId($id);

        $url = "/api/v1/transaction-ppdb/{$rereg_data['invoice_id']}/invoice-wa-notif";
        $result = $this->SIMLib->sendData($url, 'GET');

        if ($result['status']) {
            session()->setFlashdata('success_message', 'Tagihan berhasil dikirim');


            return redirect()->to(base_url('siswa/daftar-ulang'));
        } else {
            session()->setFlashdata('info_message', 'Tagihan gagal dikirim');
        }

        return redirect()->to(base_url('siswa/daftar-ulang'));
    }
}
