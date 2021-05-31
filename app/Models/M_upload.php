<?php

use \CodeIgniter\Model;

class M_upload extends Model
{
    protected $table = 'tb_upload';
    protected $primaryKey = 'id_upload';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_unit', 'id_produk', 'ket_upload'];
}
