<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'idUser';
    protected $allowedFields = ['idUser', 'nmUser', 'username', 'password', 'level', 'status', 'created_at', 'update_at'];

    public function saveUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function getUser($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['idUser' => $id]);
        }
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('idUser' => $id));
        return $query;
    }
}
