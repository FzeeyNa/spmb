<?php

namespace App\Models;

use CodeIgniter\Model;

class registerModel extends Model
{
    protected $table      = 'pendaftaran';
    protected $primaryKey = 'idPendaftar';
    protected $allowedFields = ['nmPendaftar', 'noFormulir', 'nmPendaftar', 'asalSekolah', 'hp', 'email', 'tempatLahir', 'tglLahir', 'agama', 'password', 'status', 'ket', 'sekolah', 'kdJurusan', 'created_at', 'update_at', 'hpOrtu', 'alamat', 'jk', 'statusTes', 'statusPointSiswa', 'statusPointOrtu', 'statusdu', 'pre_student_id'];

    public function savePendaftar($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getPendaftar($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }

    public function getDataByPreId($id = false)
    {
        return $this->getWhere(['pre_student_id' => $id]);
    }

    public function getNama($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['noFormulir' => $id]);
        }
    }

    public function updatePendaftar($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }

    public function idOtomatis()
    {
        $query = $this->db->query("SELECT MAX(idPendaftar) as idTerbesar from pendaftaran");
        $hasil = $query->getRow();
        return $hasil->idTerbesar;
    }

    public function barudaftar()
    {
        $query = $this->db->query("select * from pendaftaran order by created_at desc")->getResultArray();

        return $query;
    }
    public function barudaftarsmk()
    {
        $query = $this->db->query("select * from pendaftaran where sekolah = 'SMK'")->getResultArray();

        return $query;
    }
    public function barudaftarsma()
    {
        $query = $this->db->query("select * from pendaftaran where sekolah = 'SMA'")->getResultArray();

        return $query;
    }

    public function ambilSekolah()
    {
        $query = $this->db->query("select instansi from jurusan group by instansi")->getResultArray();
        return $query;
    }

    public function getAktifitas($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }

    public function ubahPassword($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }

    public function totalPendaftar()
    {
        $builder = $this->db->table('pendaftaran');
        $query = $builder->countAllResults();
        return $query;
    }

    public function totalPendaftarSMK()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('sekolah', 'SMK');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalPendaftarSMA()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('sekolah', 'SMA');
        $query = $builder->countAllResults();
        return $query;
    }

    public function totalBC()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'BROADCASTING / BCF');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaBC()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'BROADCASTING / BCF');
        $builder->like('noFormulir', 'PPDB-B-SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalRPL()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaRPL()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG');
        $builder->like('noFormulir', 'PPDB-B-SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalMM()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'MULTIMEDIA / DKV');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaMM()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'MULTIMEDIA / DKV');
        $builder->like('noFormulir', 'PPDB-B-SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalTKJ()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'TEKNIK KOMPUTER JARINGAN / TJKT');
        $builder->like('noFormulir', 'SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaTKJ()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'TEKNIK KOMPUTER JARINGAN / TJKT');
        $builder->like('noFormulir', 'PPDB-B-SMK%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalIPA()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'IPA');
        $builder->like('noFormulir', 'SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaIPA()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'IPA');
        $builder->like('noFormulir', 'PPDB-B-SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function totalIPS()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'IPS');
        $builder->like('noFormulir', 'SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    public function bersamaIPS()
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', 'IPS');
        $builder->like('noFormulir', 'PPDB-B-SMA%');
        $query = $builder->countAllResults();
        return $query;
    }
    
     public function totalEks($kdJurusan, $prefix)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', $kdJurusan);
        $builder->like('noFormulir', $prefix);
        $query = $builder->countAllResults();
        return $query;
    }
    
    public function bersamaEks($kdJurusan, $prefix)
    {
        $builder = $this->db->table('pendaftaran');
        $builder->like('kdJurusan', $kdJurusan);
        $builder->like('noFormulir', $prefix);
        $query = $builder->countAllResults();
        return $query;
    }

    public function search($keyword)
    {
        return $this->db->query("SELECT * FROM pendaftaran where idPendaftar like '$keyword'")->getResultObject();
    }
}
