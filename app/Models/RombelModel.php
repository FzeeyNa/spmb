<?php

namespace App\Models;

use CodeIgniter\Model;

class RombelModel extends Model
{
    protected $table      = 'rombel';
    protected $primaryKey = 'id';
    protected $allowedFields = ['target', 'kdJurusan', 'rombel', 'created_at'];

    
}
