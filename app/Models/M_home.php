<?php

namespace App\Models;

use CodeIgniter\Model;

class M_home extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = false;

    public function cari($cari)
    {
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->like('judul', $cari['prohum']);
        $this->like('no', $cari['no']);
        $this->like('tahun', $cari['tahun']);
        $this->like('tb_produk.id_unit', $cari['id_unit']);
        $this->like('id_kategori', $cari['id_kategori']);
        $this->like('status', $cari['status']);
        return $this->paginate(10, 'tb_produk');
    }

    public function get_unit()
    {
        $unit = $this->db->table('tb_unit')
            ->orderBy('id_unit', 'ASC')->get();

        return $unit->getResultArray();
    }

    public function get_prohum_terbaru()
    {
        return $this->db->table('tb_produk')
            ->orderBy('tahun', 'DESC')
            ->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang')
            ->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit')
            ->get(5)->getResultArray();
    }

    public function get_status()
    {
        return $this->db->table('tb_produk')
            ->select('status')
            ->groupBy('status')
            ->orderBy('status', 'ASC')
            ->get()->getResultArray();
    }

    public function get_statistik_by_jenis()
    {
        return $this->db->table('tb_produk')
            ->join('tb_kategori', 'tb_produk.id_kategori=tb_kategori.id_kategori')
            ->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis')
            ->select('nama_jenis')
            ->select('COUNT(IF(status="Berlaku",tb_produk.id_produk,NULL)) AS berlaku')
            ->select('COUNT(IF(status="Tidak Berlaku",tb_produk.id_produk,NULL)) AS tidak_berlaku')
            ->groupBy('tb_kategori.id_jenis')
            ->orderBy('tb_kategori.id_jenis', 'ASC')
            ->get()->getResultArray();
    }

    public function get_statistik_by_tahun()
    {
        return $this->db->table('tb_produk')
            ->select('tahun')
            ->select('COUNT(IF(status="Berlaku", tahun, NULL)) AS berlaku')
            ->select('COUNT(IF(status="Tidak Berlaku", tahun, NULL)) AS tidak_berlaku')
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->get()->getResultArray();
    }

    public function get_unit_by_id($id)
    {
        return $this->db->table('tb_unit')
            ->where('md5(id_unit)', $id)
            ->get()->getRowArray();
    }

    public function get_kategori_by_id($id)
    {
        return $this->db->table('tb_kategori')
            ->where('md5(id_kategori)', $id)
            ->get()->getRowArray();
    }

    public function get_prohum_by_id_unit($id)
    {

        $this->orderBy('tahun', 'DESC');
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->where('md5(tb_produk.id_unit)', $id);
        return $this->paginate(2, 'tb_produk');
    }

    public function get_prohum_by_id_kategori($id)
    {
        return $this->db->table('tb_produk')
            ->orderBy('tahun', 'DESC')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori')
            ->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis')
            ->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang')
            ->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit')
            ->where('md5(tb_produk.id_kategori)', $id)
            ->get()->getResultArray();
    }

    public function get_prohum_by_id_produk($id)
    {
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->orderBy('tahun', 'DESC');
        $this->where('md5(id_produk)', $id);
        return $this->first();
    }

    public function get_kategori()
    {
        return $this->db->table('tb_kategori')->get()->getResultArray();
    }

    public function get_tahun()
    {
        return $this->db->table('tb_produk')
            ->select('tahun')
            ->groupBy('tahun')
            ->orderBy('tahun', 'ASC')
            ->get()->getResultArray();
    }

    public function get_jml_produk_by_unit($id_unit)
    {
        return $this->db->table('tb_produk')
            ->where('id_unit', $id_unit)
            ->countAllResults();
    }

    public function get_jml_produk_by_kategori($id_kategori)
    {
        return $this->db->table('tb_produk')
            ->where('id_kategori', $id_kategori)
            ->countAllResults();
    }
}