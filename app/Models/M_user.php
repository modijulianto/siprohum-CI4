<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $useTimeStamps = FALSE;
    protected $allowedFields = ['name', 'image', 'password'];

    public function get_prohum_berlaku()
    {
        return $this->db->table('tb_produk')
            ->selectCount('id_produk', 'jumlah')
            ->where('status', "Berlaku")
            ->get()->getRowArray();
    }

    public function get_prohum_tidak_berlaku()
    {
        return $this->db->table('tb_produk')
            ->selectCount('id_produk', 'jumlah')
            ->where('status', "Tidak Berlaku")
            ->get()->getRowArray();
    }

    public function getJmlAdmin()
    {
        $query = $this->db->table('tb_user')
            ->where('role_id', 1)->countAllResults();

        return $query;
    }

    public function getJmlOperator()
    {
        $query = $this->db->table('tb_user')
            ->where('role_id', 2)->countAllResults();

        return $query;
    }

    public function getJmlProhumBlmValid()
    {
        $query = $this->db->table('tb_produk')
            ->where('validasi', 0)->countAllResults();

        return $query;
    }

    public function getTahun()
    {
        return $this->db->table('tb_produk')
            ->select('tahun')
            ->select('COUNT(IF(status="Berlaku", tahun, NULL)) AS berlaku')
            ->select('COUNT(IF(status="Tidak Berlaku", tahun, NULL)) AS tidak_berlaku')
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')->get()->getResultArray();
    }

    public function getUnit()
    {
        return $this->db->table('tb_produk')
            ->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit')
            ->select('nama_unit')
            ->select('COUNT(IF(status="Berlaku",tb_produk.id_unit,NULL)) AS berlaku')
            ->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_unit,NULL)) AS tidak_berlaku')
            ->groupBy('tb_produk.id_unit')
            ->orderBy('tb_produk.id_unit', 'ASC')->get()->getResultArray();
    }

    public function getJenis()
    {
        return $this->db->table('tb_produk')
            ->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori')
            ->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis')
            ->select('nama_jenis')
            ->select('COUNT(IF(status="Berlaku",tb_produk.id_produk,NULL)) AS berlaku')
            ->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_produk,NULL)) AS tidak_berlaku')
            ->groupBy('tb_kategori.id_jenis')
            ->orderBy('tb_kategori.id_jenis', 'ASC')->get()->getResultArray();
    }

    public function getKatProduk()
    {

        if (session()->get('role_id') == 1) {
            return $this->db->table('tb_produk')
                ->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori')
                ->select('nama_kategori')
                ->select('COUNT(IF(status="Berlaku",tb_produk.id_kategori,NULL)) AS berlaku')
                ->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_kategori,NULL)) AS tidak_berlaku')
                ->groupBy('tb_produk.id_kategori')
                ->orderBy('tb_produk.id_kategori', 'ASC')->get()->getResultArray();
        } else {
            return $this->db->table('tb_produk')
                ->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori')
                ->select('nama_kategori')
                ->select('COUNT(IF(status="Berlaku",tb_produk.id_kategori,NULL)) AS berlaku')
                ->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_kategori,NULL)) AS tidak_berlaku')
                ->where('tb_produk.id_unit', session()->get('id_unit'))
                ->groupBy('tb_produk.id_kategori')
                ->orderBy('tb_produk.id_kategori', 'ASC')->get()->getResultArray();
        }
    }
}
