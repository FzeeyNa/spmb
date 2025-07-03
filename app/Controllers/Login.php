<?php

namespace App\Controllers;

use App\Models\loginModel;
use CodeIgniter\HTTP\Request;

$request = \Config\Services::request();


class Login extends BaseController
{
    protected $loginModel;
    public function __construct()
    {
        $this->loginModel = new loginModel();
    }

    public function index()
    {
        $session = \Config\Services::session();
        $data = [
            'title' => 'Halaman Login'
        ];
        return view('login', $data);
    }

    public function cekLogin()
    {
        $username = $this->request->getVar('username');
        $password = sha1($this->request->getVar('password'));

        $row = $this->loginModel->cekLogin($username, $password);

         if (isset($row['username']) == $username && ($row['password'] == $password)) {
            if (($row['status'] == "aktif") && ($row['level'] == "admin")) {
                session()->set('username', $row['username']);
                session()->set('nmUser', $row['nmUser']);
                session()->set('level', $row['level']);
                 session()->set('idUser', $row['idUser']);
                session()->setFlashdata('berhasil', 'Selamat Anda Berhasil Login');
                return redirect()->to(base_url('admin'));
            }
            if (($row['status'] == "aktif") && ($row['level'] == "verifikator")) {
                session()->set('username', $row['username']);
                session()->set('nmUser', $row['nmUser']);
                  session()->set('idUser', $row['idUser']);
                session()->set('level', $row['level']);
                session()->setFlashdata('berhasil', 'Selamat Anda Berhasil Login');
                return redirect()->to(base_url('verifikator'));
            } else {
                session()->setFlashdata('tidakAktif', 'Maaf, Akun Anda Tidak Aktif');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('gagal', 'Username dan Password Salah !!!');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
