<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\Services;
use App\Models\formulirModel;
use App\Models\daftarUlangModel;
use App\Models\registerModel;
use DateTime;
use DateTimeZone;

class CallbackController extends BaseController
{
    protected $formulirModel;
    protected $daftarUlangModel;
    protected $pendaftarModel;

    public function __construct()
    {
        $this->formulirModel = new formulirModel();
        $this->daftarUlangModel = new daftarUlangModel();
        $this->pendaftarModel = new registerModel();
        
    }
    public function callback()
    {
        $data = $this->request->getGet();
        $billtype = [
            'formulir' => [
                '01hrtx0rwxvsjfec9h02ajnq3j',
                '01hrtx0rwxvsjfec9h02ajnq3j'
            ],
            'rereg' => [
                '01hrtx0rwxvsjfec9h02ajnq3j',
                '01hrtx0rwxvsjfec9h02ajnq3j'
            ]
        ];

        if (isset($data['id']) && (bool)$data['is_processed']) {
            if ($data['is_processed']) {
                // create a $dt object with the UTC timezone
                $dt = new DateTime($data['processed_at'], new DateTimeZone('UTC'));

                // get the local timezone
                $loc = (new DateTime)->getTimezone();

                // change the timezone of the object without changing its time
                $dt->setTimezone($loc);

                // format the datetime
                $dt->format('Y-m-d H:i:s');
                $update_data = [
                    'status' => 'lunas',
                    'totalPembayaran' => $data['total_amount'],
                    'invoice_payment_status' => 'dibayar',
                    'invoice_payment_date' => $data['processed_at'] != null ? $dt->format('Y-m-d H:i:s') : date('Y-m-d H:i:s')
                ];

                $billtype = [
                    'reregistration' => [
                        '01hzrps4y8g4tpmqjmq3d9bd0c',
                        '01hzrptxb8gntx6mmxpv24y39v'
                    ],
                    'formulir' => [
                        '01hzrprbth7gz5exzkvt65ns68',
                        '01hzrpt9ds1q1rptcg247k0csj'
                    ]
                ];

                $people = $this->pendaftarModel->getDataByPreId($data['people_id'])->getRowArray();

                if ($people && in_array($data['bill_type_id'], $billtype['reregistration'])) {

                    if ($data['total_amount'] < getenv('REREG_INVOICE_AMOUNT')) {
                        $update_data['status'] = 'cicil';
                    }

                    $result = $this->daftarUlangModel->callbackPaymentByStudentId($update_data, $people['idPendaftar']);

                    return $this->response->setJSON([
                        'status' => true,
                        'message' => 'Success',
                        'data' => $data

                    ]);
                }
                else if ($people && in_array($data['bill_type_id'], $billtype['formulir'])) {
                    $result = $this->formulirModel->callbackPayment($update_data, $data['id']);

                    return $this->response->setJSON([
                        'status' => true,
                        'message' => 'Success',
                        'data' => $data

                    ]);
                }
                else {
                    return $this->response->setJSON([
                        'status' => false,
                        'message' => 'Data not found',
                        'data' => $data

                    ]);
                }

                

             }
             else {
                return $this->response->setJSON([
                    'status' => false,
                    'message' => 'Data has been proceed',
                    'data' => $data

                ]);
             }

        }
        else {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Data not proceed',
                'data' => $data

            ]);
         
        }
        
        
        
    }
}
