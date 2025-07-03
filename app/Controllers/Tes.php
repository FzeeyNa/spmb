<?php

namespace App\Controllers;

use App\Models\tesModel;
use App\Models\userModel;
use CodeIgniter\Validation\Rules;
use Config\App;

class Tes extends BaseController
{
    protected $tesModel;
    public function __construct()
    {
        $this->tesModel = new tesModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $id = $this->tesModel->ambilTes();
        $data = [
            'title' => 'PPDB | Dasboard Admin',
            'id' => $id,
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'tes',
        ];
        return view('admin/tes', $data);
    }


    public function edit()
    {

        $id = $this->request->getPost('noFormulir');
        $data = array(
            'tglTes' => $this->request->getPost('tglTes'),
            'status' => $this->request->getPost('status'),

        );
        $this->tesModel->updateTes($data, $id);
        session()->setFlashdata('tesEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('tes'));
    }

    public function ambilStatus($idPendaftar)
    {
        $jenismodel = new tesModel();
        $ambilstatus = $jenismodel->getTes($idPendaftar);
        return json_encode($ambilstatus);
    }
}
