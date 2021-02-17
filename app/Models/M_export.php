<?php

namespace App\Models;

use CodeIgniter\Model;

class M_export extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = false;
    protected $allowedFields = [];

    public function getProhum($tahun = null, $unit = null)
    {
        if ($tahun && $unit) {
            $units = $_POST['unit'];
            $this->where('tahun', $tahun);
            $this->whereIn('tb_produk.id_unit', $units);
            $this->orderBy('tb_produk.id_unit');
        } elseif ($tahun && $unit == null) {
            $this->where('tahun', $tahun);
        } elseif ($unit && $tahun == null) {
            $units = $_POST['unit'];
            $this->whereIn('tb_produk.id_unit', $units);
            $this->orderBy('tb_produk.id_unit');
        }

        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->orderBy('tahun', 'DESC');
        return $this->findAll();
    }
}
