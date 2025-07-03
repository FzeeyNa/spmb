<?php

namespace App\Models;

use CodeIgniter\Model;

class pengumumanModel extends Model
{
    protected $table      = 'pengumuman';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'judul', 'author', 'gambar', 'isi', 'created_at', 'updated_at', 'status', 'kategori'];

    public function savePengumuman($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getPengumuman($idpeng = false)
    {
        if ($idpeng === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $idpeng]);
        }
    }

    public function updatePengumuman($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('id' => $id));
        return $query;
    }

    public function listPengumuman()
    {
        $query = $this->db->query("select * from pengumuman where status='publish' order by updated_at DESC")->getResultArray();
        return $query;
    }
}
