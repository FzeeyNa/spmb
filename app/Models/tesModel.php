<?php

namespace App\Models;

use CodeIgniter\Model;

class tesModel extends Model
{
    protected $table      = 'tes';
    protected $primaryKey = 'idKartu';
    protected $allowedFields = ['idKartu', 'idPendaftar', 'password', 'tglTes', 'status'];

    public function saveTes($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getTes($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }

    public function getAktivityTes($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id]);
        }
    }

    public function updateTes($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }

    public function ambilTes()
    {
        $query = $this->db->query('select p.noFormulir,p.hp, p.hpOrtu, t.password, p.idPendaftar, p.nmPendaftar, p.sekolah, p.kdJurusan, t.tglTes, t.status, t.idKartu, t.idPendaftar as formu from pendaftaran p inner join tes t where p.noFormulir = t.idPendaftar order by p.created_at desc')->getResultArray();
        return $query;
    }
    
     public function tesRPL()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'REKAYASA PERANGKAT LUNAK / PPLG');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }

    public function tesBC()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'BROADCASTING / BCF');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }

    public function tesMM()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'MULTIMEDIA / DKV');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }

    public function tesTKJ()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'TEKNIK KOMPUTER JARINGAN / TJKT');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }

    public function tesIPA()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'IPA');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }
    public function tesIPS()
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', 'IPS');
        $builder->like('tes.status', 'sudah');

        $query = $builder->countAllResults();
        return $query;
    }
    
    public function tesEks($kdJurusan, $status)
    {
        $builder = $this->db->table('tes');

        $builder->join('pendaftaran', 'pendaftaran.idPendaftar = tes.id');
        $builder->like('pendaftaran.kdJurusan', $kdJurusan);
        $builder->like('tes.status', $status);

        $query = $builder->countAllResults();
        return $query;
    }
}
