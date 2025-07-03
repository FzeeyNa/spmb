<?php

namespace App\Controllers;

use App\Models\formulirModel;
use App\Models\LoginModel;
use App\Models\pendaftarLogin;

class Home extends BaseController
{
    protected $pendaftarModel;
    protected $formulirModel;
    public function __construct()
    {
        $this->pendaftarModel = new pendaftarLogin();
        $this->formulirModel = new formulirModel();
    }
    public function index()
    {
        $data = [
            'title' => 'SPMB Sekolah Prestasi Prima'
        ];
        return view('index', $data);
    }
    public function sk()
    {
        $data = [
            'title' => 'Syarat dan Ketentuan Pendaftaran'
        ];
        return view('sk', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login Calon Siswa'
        ];
        return view('siswa/sLogin', $data);
    }


    public function berhasil()
    {
        session();
        $data = [
            'title' => 'Registasi Berhasil'
        ];
        return view('siswa/sBerhasil', $data);
    }

    public function tesLogin()
    {
        $username = $this->request->getPost('username');
        $password = sha1($this->request->getPost('password'));

        $row = $this->pendaftarModel->cekLogin($username, $password);


        if (($row['idPendaftar'] == $username) && ($row['password'] == $password)) {
            session()->set('idPendaftar', $row['idPendaftar']);
            session()->set('nmPendaftar', $row['nmPendaftar']);
            session()->set('status', $row['status']);
            session()->set('asalSekolah', $row['asalSekolah']);
            session()->set('tempatLahir', $row['tempatLahir']);
            session()->set('tglLahir', $row['tglLahir']);
            session()->set('sekolah', $row['sekolah']);
            session()->set('hp', $row['hp']);
            session()->set('hpOrtu', $row['hpOrtu']);
            session()->set('jk', $row['jk']);
            session()->set('kdJurusan', $row['kdJurusan']);
            session()->set('noFormulir', $row['noFormulir']);
            session()->setFlashdata('berhasil', 'Selamat anda berhasil login');
            return redirect()->to(base_url("siswa/dashboard/" . base64_encode(session('idPendaftar'))));
        } else {
            session()->setFlashdata('gagal', 'Username dan Password Salah !!!');
            return redirect()->to(base_url('/sign-in'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
