<?php

namespace App\Models;

use CodeIgniter\Model;

class PointerOrtuModel extends Model
{
    protected $table      = 'pointerortu';
    protected $primaryKey = 'idPendaftar';
    protected $allowedFields = ['idPendaftar', 'noFormulir', 'nmPendaftar', 'nmAyah', 'nmIbu', 'sekolah', 'kdJurusan', 'created_at', 'updated_at', 'pertanyaan1', 'pertanyaan2', 'pertanyaan3', 'pertanyaan4', 'status'];

    public function savePointerOrtu($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getPointerOrtu($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idPendaftar' => $id]);
        }
    }

    public function updatePointerOrtu($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idPendaftar' => $id));
        return $query;
    }
}
