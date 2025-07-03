<?php

namespace App\Controllers;

use App\Libraries\SIMLibrary;
use App\Models\jurusanModel;
use App\Models\registerModel;
use App\Models\formulirModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Validation\Validation;


class Register extends BaseController
{
    protected $registerModel;
    protected $jurusan;
    protected $formulirModel;
    protected $SIMLib;
    public function __construct()
    {
        $this->registerModel = new registerModel();
        $this->jurusan = new jurusanModel();
        $this->SIMLib = new SIMLibrary();
        $this->formulirModel = new formulirModel();
    }


    public function index()
    {
        helper('text');
        $idPendaftar = $this->registerModel->findAll();
        $ambilSekolah = $this->registerModel->ambilSekolah();
        //id otomatis
        $dariDB = $this->registerModel->idOtomatis();
if (!empty($dariDB)) {
    $nourut = (int) substr($dariDB, 6, 4);
} else {
    $nourut = 0; // Atau angka urut default jika database kosong
}
$nourut++;
$huruf = "PPDB22";
$kdPendaftar = $huruf . sprintf("%04s", $nourut);
        session();
        $data = [
            'title' => 'Form Registrasi',
            'idPendaftar' => $idPendaftar,
            'kodePendaftar' => $kdPendaftar,
            'ambilSekolah' => $ambilSekolah,
            'validasi' => \Config\Services::validation(),
            'pass' => random_string('alnum', 5)

        ];


        return view('siswa/sRegister', $data);
    }





    public function save()
    {

        if (!$this->validate([

            'email' => [
                'rules' => 'is_unique[pendaftaran.email]',
                'errors' => [
                    'is_unique' => 'Maaf, Email Sudah Terdaftar'
                ]
            ]

        ])) {
            return redirect()->to(base_url('register'))->withInput();
        }

        $today = date("Y-m-d H:i:s");


        // random pass
        helper('text');
        // masuk database
        $pass = $this->request->getVar('123456');
        $hp = $this->request->getVar('hp');
        $hpOrtu = $this->request->getVar('hpOrtu');
        $data = array(

            'idPendaftar' => $this->request->getVar('idPendaftar'),
            'noFormulir'        => $this->request->getVar('noFormulir'),
            'nmPendaftar'        => $this->request->getVar('nmPendaftar'),
            'asalSekolah'        => $this->request->getVar('asalSekolah'),
            'hp'                => $hp,
            'email' => $this->request->getVar('email'),
            'status' => $this->request->getVar('status'),
            'tempatLahir' => $this->request->getVar('tempatLahir'),
            'tglLahir' => $this->request->getVar('tglLahir'),
            'agama' => $this->request->getVar('agama'),
            'ket' => $this->request->getVar('ket'),
            'sekolah' => $this->request->getVar('sekolah'),
            'kdJurusan' => $this->request->getVar('kdJurusan'),
            'hpOrtu' => $hpOrtu,
            'alamat' => $this->request->getVar('alamat'),
            'jk' => $this->request->getVar('jk'),
            'statusTes' => 'belum',
            'statusPointSiswa' => 'belum',
            'statusPointOrtu' => 'belum',
            'statusdu' => 'belum',
            'password' => sha1('123456'),
            'created_at' => $today,
            'updated_at' => $today,

        );

        $this->registerModel->savePendaftar($data);
        $emailPenerima = $this->request->getVar('email');
        $nama = $this->request->getVar('nmPendaftar');
        $username = $this->request->getVar('idPendaftar');
        session()->setFlashdata('password', '123456');
        session()->setFlashdata('nama', $nama);
        session()->setFlashdata('username', $username);
        session()->setFlashdata('register', 'Data Berhasil Disimpan');

        $pre_student_result = $this->createPreStudent($data);

        if (isset($pre_student_result['id'])) {
            $invoice_result = $this->createInvoice($data, $pre_student_result['id']);

            $this->registerModel->updatePendaftar(['pre_student_id' => $pre_student_result['id']], $data['idPendaftar']);

            $this->createFormulirPayment($data, $invoice_result);
        }

        // format kirim email otomatis
        $email = \Config\Services::email();
        $alamatEmail = "$emailPenerima";
        $email->setTo($alamatEmail);
        $alamatPengirim = "ppdb@prestasiprima.sch.id";
        $email->setFrom($alamatPengirim);
        $subject = "Pendaftaran SPMB Sekolah Prestasi Prima";
        $email->setSubject($subject);
        $isiPesan = "Selamat $nama, Pendaftaranmu di Portal SPMB Sekolah prestasi prima telah berhasil. Silahkan login menggunakan akun berikut: <br> <br>
        
        Username: $username <br>
        Password: 123456 <br><br>
        
        Pada Link Berikut: <a href='https://ppdb.prestasiprima.sch.id' target='_blank'>https://ppdb.prestasiprima.sch.id</a> <br><br>
        
        Informasi lebih lanjut dapat menghubungi panitia:
            <br>
        Panitia : +6282310261245";



        $email->setMessage($isiPesan);
        $email->send();

        // wa otomatis
        $pesanWa = "Selamat *$nama*, Pendaftaranmu di Portal SPMB Sekolah prestasi prima telah berhasil. Silahkan login menggunakan akun berikut:\n\nUsername: $username\nPassword: 123456\n\nPada Link Berikut:\n https://ppdb.prestasiprima.sch.id\n\nInformasi lebih lanjut dapat menghubungi panitia:\n\nPanitia :\n +6282310261245";
        kirimWA($hp, $pesanWa);
        kirimWA($hpOrtu, $pesanWa);

        //                 $hp = $this->request->getVar('hp');
        //                 $waotomatis = [
        //                     'api_key' => '91ee7fc9f9378603f88ca505eba5b75244e734e5',
        //                     'sender'  => '6282315388686',
        //                     'number'  => $hp,
        //                     'message' => "
        // *SPMB SEKOLAH PRESTASI PRIMA*

        // Selamat, " . $nama .
        //                         "
        // Pendaftaranmu di website SPMB Sekolah Prestasi Prima telah berhasil, berikut informasi akunmu:

        // Username: " . $username .
        //                         "
        // Password: " . $pass .

        //                         "

        // Silahkan login pada link di bawah ini, untuk melanjutkan proses pendaftaran:

        // https://ppdb.prestasiprima.sch.id/sign-in

        // Jika ada pertanyaan dapat segera menghubungi kami
        // Panitia: 082315388686

        // Salam hormat,
        // Panitia SPMB Sekolah Prestasi Prima "
        //                 ];

        //                 $curl = curl_init();
        //                 curl_setopt_array(
        //                     $curl,
        //                     array(
        //                         CURLOPT_URL => "https://wa.rplsmkpp.online/api/send-message.php",
        //                         CURLOPT_RETURNTRANSFER => true,
        //                         CURLOPT_ENCODING => "",
        //                         CURLOPT_MAXREDIRS => 10,
        //                         CURLOPT_TIMEOUT => 0,
        //                         CURLOPT_FOLLOWLOCATION => true,
        //                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //                         CURLOPT_CUSTOMREQUEST => "POST",
        //                         CURLOPT_POSTFIELDS => json_encode($waotomatis)
        //                     )
        //                 );

        //                 $response = curl_exec($curl);

        //                 curl_close($curl);

        $recaptchaResponse = trim($this->request->getVar('g-recaptcha-response'));

        // form data

        $secret = env('RECAPTCHAV3_SITEKEY');

        $credential = array(
            'secret' => $secret,
            'response' => $recaptchaResponse
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);

        $session = session();

        if ($status['success']) {

            $session->setFlashdata('msg', 'Form has been successfully submitted');
        } else {

            $session->setFlashdata('msg', 'Please check your inputs');
        }

        return redirect()->to(base_url('home/berhasil'));
    }

    public function showKdJurusan($sekolah)
    {
        $jenismodel = new jurusanModel();
        $isiSekolah = $jenismodel->cekJurusan($sekolah);
        return json_encode($isiSekolah);
    }

    /**
     * createPreStudent
     *
     * @param  mixed $data
     * @return void
     */
    public function createPreStudent($data)
    {
        $url = '/api/v1/pre-student/create/student';

        $domain = [
            'SMA' => '01hq7zx5ghgx7zn2ywfq82ckd3',
            'SMK' => '01hq4w8kz6zhvb7btw5zenm496'
        ];

        $religion = [
            'islam' => 'Islam',
            'protestan' => 'Protestan',
            'katolik' => 'Katholik',
            'hindu' => 'Hindu',
            'buddha' => 'Buddha',
            'khonghucu' => 'Konghucu',
        ];

        $request_data = [
            'first_name' => $data['nmPendaftar'], // Mandatory
            'last_name' => '', // Optional
            'gender' => ($data['jk'] == 'laki-laki' ? 'L' : 'P'), // Optional
            'religion' => (isset($religion[$data['agama']]) ? $religion[$data['agama']] : 'Kepercayaan'), // Optional
            'birthplace' => ($data['tempatLahir'] != null ? ucwords($data['tempatLahir']) : 'Undefined'), // Mandatory
            'birth_date' => $data['tglLahir'], // Mandatory
            'is_active' => true, // Mandatory
            'domain_id' => $domain[$data['sekolah']], // Mandatory
            'nik' => date('YmdHiss'), // Optional
            'is_prestudent' => true, // Optional
            'detail' => [
                'nis' => $data['idPendaftar'], // Optional
                'nisn' => $data['idPendaftar'], // Optional
                'student_start_date' => date('Y-m-d') // Optional
            ],
            'address' => [
                'name' => 'alamat utama', // Mandatory
                'address' => $data['alamat'], // Mandatory
                'rt' => '000', // Mandatory
                'rw' => '000', // Mandatory
                'ward' => 'Undefined', // Mandatory
                'subdistrict' => 'Undefined', // Mandatory
                'regency' => 'Undefined', // Mandatory
                'province' => 'Undefined', // Mandatory
                'code_pos' => '00000' // Mandatory
            ],
            'contact' => [
                'name' => 'nomor utama', // Mandatory
                'phone_number' => $data['hpOrtu'], //Optional
                'email' => $data['email'] // Optional
            ]
        ];

        $result = $this->SIMLib->sendData($url, 'POST', $request_data);

        // var_dump($result);
        // die();

        if ($result['status']) {
            return $result['body']['data'];
        }
    }

    /**
     * createInvoice
     *
     * @param  mixed $data
     * @param  mixed $people_id
     * @return void
     */
    public function createInvoice($data, $people_id)
    {
        $url = '/api/v1/transaction-ppdb/create/invoice';

        $domain = [
            'SMA' => [
                'id' => '01hq7zx5ghgx7zn2ywfq82ckd3',
                'bill_type_id' => '01hzrprbth7gz5exzkvt65ns68',
                'payment_method_id' => '01hrrbta20vr3e4hjr1s21j78v',
                'receiver_source_of_fund_id' => '01hrrbs2wr05wp0fr2jyw3dkbm'
            ],
            'SMK' => [
                'id' => '01hq4w8kz6zhvb7btw5zenm496',
                'bill_type_id' => '01hzrpt9ds1q1rptcg247k0csj',
                'payment_method_id' => '01hq4wjpavp42607eny9tp7v6w',
                'receiver_source_of_fund_id' => '01hq4xv0xnb8q1p0sj4gqgpaz7'
            ]
        ];

        $request_data = [
            'name' => 'Tagihan Formulir', // Mandatory
            'domain_id' => $domain[$data['sekolah']]['id'], // Mandatory
            'bill_type_id' => $domain[$data['sekolah']]['bill_type_id'], // Mandatory
            'payment_method_id' => $domain[$data['sekolah']]['payment_method_id'], // Mandatory
            'amount' => getenv('FORMULIR_INVOICE_AMOUNT'), // Mandatory
            'people_id' => $people_id, // Optional
            'receiver_source_of_fund_id' => $domain[$data['sekolah']]['receiver_source_of_fund_id'], // Optional
            'due_date' => date('Y-m-d'), // Optional
            'note' => '-' // Optional
        ];



        $result = $this->SIMLib->sendData($url, 'POST', $request_data);


        if ($result['status']) {
            return $result['body']['data'];
        }
    }

    /**
     * createFormulirPayment
     *
     * @return void
     */
    public function createFormulirPayment($data, $invoice): void
    {
        $today = date("Y-m-d H:i:s");
        $idPembayaran = date("ymdHis");

        $data_formulir = array(
            'idPembayaran'        => $idPembayaran,
            'noFormulir' => '',
            'jnsPembayaran'        => 'formulir',
            'tglPembayaran'        => $today,
            'totalPembayaran'      => getenv('FORMULIR_INVOICE_AMOUNT'),
            'gbrBuktiBayar'        => '',
            'status'               => 'pending',
            'idPendaftar'          => $data['idPendaftar'],
            'invoice_id' => (isset($invoice['id']) ? $invoice['id'] : ''),
            'invoice_payment_status' => '',
            'created_at' => $today,
            'updated_at' => $today,
        );

        $this->formulirModel->saveKonfirmasi($data_formulir);
    }
}
