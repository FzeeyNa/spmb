<?php

namespace App\Controllers;

use App\Models\pengumumanModel;

class Pengumuman extends BaseController
{
    protected $pengumumanModel;
    public function __construct()
    {
        $this->pengumumanModel = new pengumumanModel();
    }

    public function index()
    {

        $query = $this->pengumumanModel->findAll();
        $data = [
            'title' => 'PPDB | Pengumuman',
            'active' => 'pengumuman',
            'query' => $query,
            'validasi' => \Config\Services::validation(),
        ];
        return view('admin/pengumuman', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('pengumuman'))->withInput();
        }


        if (!empty($_FILES['gambar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gambar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../ppdb/assets/assets/img/pengumuman/', $namabaru);
        } else {
            $namabaru = '';
        }
        // masuk database
        $today = date("Y-m-d H:i:s");
        $data = array(


            'judul' => $this->request->getVar('judul'),
            'isi'        => $this->request->getVar('isi'),
            'gambar'        => $namabaru,
            'author'                => $this->request->getVar('author'),
            'status'             => $this->request->getVar('status'),
            'kategori'                => $this->request->getVar('kategori'),

            'created_at' => $today,
            'updated_at' => $today,


        );
        $this->pengumumanModel->savePengumuman($data);
        session()->setFlashdata('pengumumanBerhasil', 'Pengumuman Berhasil Ditambahkan');
        return redirect()->to(base_url('pengumuman'));
    }
    public function delete($id)
    {
        $this->pengumumanModel->delete($id);
        session()->setFlashdata('pengumumanHapus', 'Data telah dihapus');
        return redirect()->to(base_url('pengumuman'));
    }

    public function update($idpeng)
    {
        $data = [
            'title' => 'Update Pengumuman',
            'idpeng' => $this->pengumumanModel->getPengumuman($idpeng)->getRow(),
            'active' => 'pengumuman',
            'validasi' => \Config\Services::validation(),
        ];
        return view('admin/editPengumuman', $data);
    }

    public function edit()
    {
        $today = date("Y-m-d H:i:s");
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|ext_in[gambar,png,jpg,gif]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar Terlalu Besar, Max 1024Kb',
                    'ext_in' => 'Format gambar tidak sesuai'
                ]
            ]

        ])) {
            return redirect()->to(base_url('pengumuman'))->withInput();
        }


        if (!empty($_FILES['gambar']['name'])) {
            // Image upload
            $avatar      = $this->request->getFile('gambar');
            $namabaru     = str_replace(' ', '-', $avatar->getName());
            $avatar->move(WRITEPATH . '../ppdb/assets/assets/img/pengumuman/', $namabaru);
        } else {
            $namabaru = '';
        }

        if ($namabaru == '') {
            $namabaru = $this->request->getPost('old');
        }
        $id = $this->request->getPost('id');
        $data = array(
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'status' => $this->request->getPost('status'),
            'kategori' => $this->request->getPost('kategori'),
            'author' => $this->request->getPost('author'),
            'gambar' => $namabaru,
            'updated_at' => $today,

        );
        $this->pengumumanModel->updatePengumuman($data, $id);
        return redirect()->to(base_url('pengumuman'));
    }
}
