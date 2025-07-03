<?php

namespace App\Controllers;


use App\Models\registerModel;
use App\Models\daftarUlangModel;
use App\Models\formulirModel;
use CodeIgniter\Validation\Rules;
use Config\App;
use App\Libraries\SIMLibrary;


class Pendaftar extends BaseController
{
    protected $pendaftarModel;
    protected $daftarUlang;
    protected $formulirModel;

    protected $SIMLib;

    public function __construct()
    {
        $this->pendaftarModel = new registerModel();
        $this->daftarUlang = new daftarUlangModel(); 
        $this->formulirModel = new formulirModel(); 
        $this->SIMLib = new SIMLibrary();

    }

    public function index()
    {
        $idPendaftar = $this->pendaftarModel->barudaftar();
        $data = [
            'title' => 'SPMB | Pendaftar',
            'active' => 'pendaftar',
            'idPendaftar' => $idPendaftar

        ];
        return view('admin/pendaftar', $data);
    }
    public function delete($idPendaftar)
    {

        $this->pendaftarModel->delete($idPendaftar);
        session()->setFlashdata('pendaftarHapus', 'Data telah dihapus');
        return redirect()->to(base_url('pendaftar'));
    }

    public function edit()
    {

        $today = date("Y-m-d H:i:s");
        $id = $this->request->getPost('idPendaftar');
        $data = array(
            'idPendaftar' => $this->request->getPost('idPendaftar'),
            'noFormulir' => $this->request->getPost('noFormulir'),
            'nmPendaftar'        => $this->request->getPost('nmPendaftar'),
            'asalSekolah'        => $this->request->getPost('asalSekolah'),
            'hp' => $this->request->getPost('hp'),
            'hpOrtu' => $this->request->getPost('hpOrtu'),
            'email' => $this->request->getPost('email'),
            'tempatLahir' => $this->request->getPost('tempatLahir'),
            'tglLahir' => $this->request->getPost('tglLahir'),
            'agama' => $this->request->getPost('agama'),
            'password' => sha1($this->request->getPost('password')),
          
            'ket' => $this->request->getPost('ket'),
            'sekolah' => $this->request->getPost('sekolah'),
            'kdJurusan' => $this->request->getPost('kdJurusan'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $today,
        );
        $this->pendaftarModel->updatePendaftar($data, $id);
        session()->setFlashdata('pendaftarEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('pendaftar'));
    }

    public function smk()
    {
        $idPendaftar = $this->pendaftarModel->barudaftarsmk();
        $data = [
            'title' => 'SPMB | Pendaftar SMK',
            'active' => 'smk',
            'idPendaftar' => $idPendaftar

        ];
        return view('admin/pendaftarSMK', $data);
    }

    public function sma()
    {
        $idPendaftar = $this->pendaftarModel->barudaftarsma();
        $data = [
            'title' => 'SPMB | Pendaftar SMA',
            'active' => 'sma',
            'idPendaftar' => $idPendaftar

        ];
        return view('admin/pendaftarSMA', $data);
    }

    public function createReregistrationInvoice($id) {
        $amount = getenv('REREG_INVOICE_AMOUNT');

        $data = $this->pendaftarModel->getPendaftar($id)->getRowArray();

        $data_payment = $this->daftarUlang->getDataByStudentId($id);
        

        if ($data_payment) {

            session()->setFlashdata('info_message', 'Data tagihan sudah ada');
            return redirect()->to(base_url('pendaftar'));

        } else {
            $url = '/api/v1/transaction-ppdb/create/invoice';

            $domain = [
                'SMA' => [
                    'id' => '01hq7zx5ghgx7zn2ywfq82ckd3',
                    'bill_type_id' => '01hzrps4y8g4tpmqjmq3d9bd0c',
                    'payment_method_id' => '01hrrbta20vr3e4hjr1s21j78v',
                    'receiver_source_of_fund_id' => '01hrrbs2wr05wp0fr2jyw3dkbm'
                ],
                'SMK' => [
                    'id' => '01hq4w8kz6zhvb7btw5zenm496',
                    'bill_type_id' => '01hzrptxb8gntx6mmxpv24y39v',
                    'payment_method_id' => '01hq4wjpavp42607eny9tp7v6w',
                    'receiver_source_of_fund_id' => '01hq4xv0xnb8q1p0sj4gqgpaz7'
                ]
            ];

            $request_data = [
                'name' => 'Tagihan Daftar Ulang', // Mandatory
                'domain_id' => $domain[$data['sekolah']]['id'], // Mandatory
                'bill_type_id' => $domain[$data['sekolah']]['bill_type_id'], // Mandatory
                'payment_method_id' => $domain[$data['sekolah']]['payment_method_id'], // Mandatory
                'amount' => $amount, // Mandatory
                'people_id' => $data['pre_student_id'], // Optional
                'receiver_source_of_fund_id' => $domain[$data['sekolah']]['receiver_source_of_fund_id'], // Optional
                'due_date' => date('Y-M-d', strtotime('+3 months')), // Optional
                'note' => '-' // Optional
            ];

            

            $result = $this->SIMLib->sendData($url, 'POST', $request_data);


            if ($result['status']) {

                $this->createReregistrationPayment(['idPendaftar' => $id], $result['body']['data']);
                session()->setFlashdata('success_message', 'Data tagihan berhasil dibuat');

                return redirect()->to(base_url('pendaftar'));
            }
            else {
                session()->setFlashdata('info_message', 'Data tagihan gagal dibuat');

                return redirect()->to(base_url('pendaftar'));
            }
        }
    }

    /**
     * createFormulirPayment
     *
     * @return void
     */
    public function createReregistrationPayment($data, $invoice) : void {
        $today = date("Y-m-d H:i:s");
        $idPembayaran = date("ymdHis");

        $amount = getenv('REREG_INVOICE_AMOUNT');
        
        $data_formulir = array(
            'idPembayaran'        => $idPembayaran,
            'noFormulir' => '',
            'jnsPembayaran'        => 'daftar ulang',
            'tglPembayaran'        => $today,
            'totalPembayaran'      => $amount,
            'gbrBuktiBayar'        => '',
            'status'               => 'pending',
            'idPendaftar'          => $data['idPendaftar'],
            'invoice_id' => (isset($invoice['id']) ? $invoice['id'] : ''),
            'invoice_payment_status' => '',
            'created_at' => $today,
            'updated_at' => $today,
        );

        $this->daftarUlang->saveKonfirmasi($data_formulir);
    }
    
    /**
     * createFormulirInvoice
     *
     * @param  mixed $id
     * @return void
     */
    public function createFormulirInvoice($id) {
        $amount = getenv('FORMULIR_INVOICE_AMOUNT');

        $data = $this->pendaftarModel->getPendaftar($id)->getRowArray();

        $data_payment = $this->formulirModel->getDataByStudentId($id);
        

        if ($data_payment && $data_payment['invoice_id'] != null) {

            session()->setFlashdata('info_message', 'Data tagihan sudah ada');
            return redirect()->to(base_url('pendaftar'));

        } else {
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
                'amount' => $amount, // Mandatory
                'people_id' => $data['pre_student_id'], // Optional
                'receiver_source_of_fund_id' => $domain[$data['sekolah']]['receiver_source_of_fund_id'], // Optional
                'due_date' => date('Y-m-d'), // Optional
                'note' => '-' // Optional
            ];

            

            $result = $this->SIMLib->sendData($url, 'POST', $request_data);


            if ($result['status']) {

                
                if ($data_payment && isset($result['body']['data']['id'])) {
                    $this->formulirModel->updateKonfirmasi(['invoice_id' => $result['body']['data']['id']], $data_payment['idPembayaran']);
                }
                else {
                    $this->createFormulirPayment(['idPendaftar' => $id], $result['body']['data']);
                }

                session()->setFlashdata('success_message', 'Data tagihan berhasil dibuat');

                return redirect()->to(base_url('pendaftar'));
            }
            else {
                session()->setFlashdata('info_message', 'Data tagihan gagal dibuat');

                return redirect()->to(base_url('pendaftar'));
            }
        }
    }
        /**
         * createFormulirPayment
         *
         * @return void
         */
    public function createFormulirPayment($data, $invoice) : void {
        $today = date("Y-m-d H:i:s");
        $idPembayaran = date("ymdHis");

        $amount = getenv('FORMULIR_INVOICE_AMOUNT');
        
        $data_formulir = array(
            'idPembayaran'        => $idPembayaran,
            'noFormulir' => '',
            'jnsPembayaran'        => 'daftar ulang',
            'tglPembayaran'        => $today,
            'totalPembayaran'      => $amount,
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

    public function syncIntegration($id) {
        $data = $this->pendaftarModel->getPendaftar($id)->getRowArray();

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
            'first_name'=> $data['nmPendaftar'], // Mandatory
            'last_name' => '', // Optional
            'gender' => ($data['jk'] == 'laki-laki' ? 'L' : 'P'), // Optional
            'religion' => (isset($religion[$data['agama']]) ? $religion[$data['agama']] : 'Kepercayaan' ), // Optional
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
                    'phone_number' => (int) $data['hpOrtu'], //Optional
                    'email' => $data['email'] // Optional
                ]
            ];
        
        $result = $this->SIMLib->sendData($url, 'POST', $request_data);
        if ($result['status']) {
            if (isset($result['body']['data']['id'])) {
                $this->pendaftarModel->updatePendaftar(['pre_student_id' => $result['body']['data']['id']], $data['idPendaftar']);
            }
        }
        // var_dump($result);
        // die();
        
        
        if ($result['status']) {
            session()->setFlashdata('success_message', 'Data berhasil dibuat');

            return redirect()->to(base_url('pendaftar'));
        }
        else {

            $msg = isset($result['body']['message']) ? $result['body']['message'] : '';
            
            session()->setFlashdata('info_message', "Data gagal dibuat Error : {$msg}");

            return redirect()->to(base_url('pendaftar'));
        }

    }

}
