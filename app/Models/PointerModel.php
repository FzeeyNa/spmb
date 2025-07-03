<?php

namespace App\Models;

use CodeIgniter\Model;

class PointerModel extends Model
{
    protected $table      = 'pointersiswa';
    protected $primaryKey = 'noFormulir';
    protected $allowedFields = ['idPendaftar', 'noFormulir', 'jk', 'nmPendaftar', 'created_at', 'updated_at', 'hp', 'sekolah', 'kdJurusan', 'peraturan1', 'peraturan2', 'peraturan3', 'peraturan4', 'status'];

    public function savePointerSiswa($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getPointerSiswa($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }

    public function updatePointerSiswa($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }
}
