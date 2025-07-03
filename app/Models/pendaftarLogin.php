<?php

namespace App\Models;

use CodeIgniter\Model;

class pendaftarLogin extends Model
{
    public function cekLogin($username, $password)
    {
        return $this->db->table('pendaftaran')->where(
            array(
                'idPendaftar' => $username,
                'password' => $password,

            )
        )->get()->getRowArray();
    }
}
