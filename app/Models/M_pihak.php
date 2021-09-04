<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pihak extends Model
{
    protected $table = 'tb_pihak';
    protected $primaryKey = 'id_pihak';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_perjanjian', 'pihak_ke', 'lembaga', 'bagian', 'penandatangan', 'jabatan_penandatangan', 'alamat'];
}
