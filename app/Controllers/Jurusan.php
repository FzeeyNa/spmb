<?php

namespace App\Controllers;

use App\Models\jurusanModel;
use CodeIgniter\Validation\Rules;
use Config\App;

class Jurusan extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->jurusanmodel = new jurusanModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $kdJurusan = $this->jurusanmodel->findAll();
        $data = [
            'title' => 'PPDB | Jurusan',
            'kdJurusan' => $kdJurusan,
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'jurusan'
        ];
        return view('admin/jurusan', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'kdJurusan' => [
                    'rules' => 'required|is_unique[jurusan.kdJurusan]',
                    'errors' => [
                        'required' => 'Mohon Kode Jurusan Diisi',
                        'is_unique' => 'Kode Jurusan sudah terdaftar'
                    ]
                ]
            ]
        )) {

            return redirect()->to(base_url('jurusan'))->withInput();
        }
        $today = date("Y-m-d H:i:s");
        // masuk database
        $data = array(

            'kdJurusan' => $this->request->getVar('kdJurusan'),
            'nmJurusan'        => $this->request->getVar('nmJurusan'),
            'instansi'        => $this->request->getVar('instansi'),
            'kuota'        => $this->request->getVar('kuota'),
            'status' => "aktif",
            'created_at' => $today,
            'updated_at' => $today,

        );
        $this->jurusanmodel->saveJurusan($data);
        session()->setFlashdata('jurusanSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('jurusan'));
    }
    public function delete($kdJurusan)
    {

        $this->jurusanmodel->delete($kdJurusan);
        session()->setFlashdata('jurusanHapus', 'Data telah dihapus');
        return redirect()->to(base_url('jurusan'));
    }

    public function edit()
    {

        $today = date("Y-m-d H:i:s");
        $id = $this->request->getPost('kdJurusan');
        $data = array(
            'kdJurusan' => $this->request->getPost('kdJurusan'),
            'nmJurusan'        => $this->request->getPost('nmJurusan'),
            'instansi'        => $this->request->getPost('instansi'),
            'kuota'        => $this->request->getPost('kuota'),

            'status' => $this->request->getPost('status'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $today,
        );
        $this->jurusanmodel->updateJurusan($data, $id);
        session()->setFlashdata('jurusanEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('jurusan'));
    }
}
