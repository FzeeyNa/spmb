<?php

namespace App\Models;

use CodeIgniter\Model;

class jurusanModel extends Model
{
    protected $table      = 'jurusan';
    protected $primaryKey = 'kdJurusan';
    protected $allowedFields = ['kdJurusan', 'nmJurusan', 'instansi', 'kuota', 'status', 'created_at', 'update_at'];

    public function saveJurusan($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getJurusan($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['kdJurusan' => $id]);
        }
    }

    public function updateJurusan($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('kdJurusan' => $id));
        return $query;
    }

    public function cekJurusan($sekolah)
    {
        return $this->select("*")->where("instansi", $sekolah)->findAll();
    }
}
