<?php

namespace App\Controllers;

use App\Models\userModel;
use CodeIgniter\Validation\Rules;
use Config\App;

class User extends BaseController
{
    protected $usermodel;
    public function __construct()
    {
        $this->usermodel = new userModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $idUser = $this->usermodel->findAll();
        if (session('level') == 'verifikator') {
            return redirect()->to(base_url('verifikator'));
        }
        $data = [
            'title' => 'PPDB | Manajemen Pengguna',
            'idUser' => $idUser,
            'session' => $session,
            'validasi' => \Config\Services::validation(),
            'active' => 'user'
        ];
        return view('admin/user', $data);
    }

    public function save()
    {
        if (!$this->validate(
            [
                'username' => [
                    'rules' => 'required|is_unique[user.username]',
                    'errors' => [
                        'required' => '{field} harus diisi',
                        'is_unique' => '{field} sudah terdaftar'
                    ]
                ]
            ]
        )) {

            return redirect()->to(base_url('user'))->withInput();
        }
        $today = date("Y-m-d H:i:s");
        // masuk database
        $data = array(

            'idUser' => $this->request->getVar('idUser'),
            'nmUser'        => $this->request->getVar('nmUser'),
            'username'        => $this->request->getVar('username'),
            'password'                => sha1($this->request->getVar('password')),
            'level' => $this->request->getVar('level'),
            'status' => "aktif",
            'created_at' => $today,
            'update_at' => $today,

        );
        $this->usermodel->saveUser($data);
        session()->setFlashdata('userSimpan', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('user'));
    }
    public function delete($idUser)
    {

        $this->usermodel->delete($idUser);
        session()->setFlashdata('userHapus', 'Data telah dihapus');
        return redirect()->to(base_url('user'));
    }

    public function edit()
    {

        $today = date("Y-m-d H:i:s");
        $id = $this->request->getPost('idUser');
        $data = array(
            'idUser' => $this->request->getPost('idUser'),
            'nmUser'        => $this->request->getPost('nmUser'),
            'username'        => $this->request->getPost('username'),
            'password'                => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
            'status' => $this->request->getPost('status'),
            'created_at' => $this->request->getPost('created_at'),
            'update_at' => $today,
        );
        $this->usermodel->updateUser($data, $id);
        session()->setFlashdata('userEdit', 'Data berhasil diubah');
        return redirect()->to(base_url('user'));
    }

    public function ubahPassword($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idUser' => $id));
        return $query;
    }
}
