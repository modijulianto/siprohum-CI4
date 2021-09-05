<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pihak extends Model
{
    protected $table = 'tb_pihak';
    protected $primaryKey = 'id_pihak';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_produk', 'pihak_ke', 'lembaga', 'bagian', 'penandatangan', 'jabatan_penandatangan', 'alamat'];

    public function get_pihak($id_produk)
    {
        $this->where('id_produk', $id_produk);
        return $this->findAll();
    }

    public function delete_pihak($id_produk)
    {
        $this->where('id_produk', $id_produk);
        return $this->delete();
    }
}
