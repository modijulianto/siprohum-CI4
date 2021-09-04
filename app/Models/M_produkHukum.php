<?php

namespace App\Models;

use CodeIgniter\Model;

class M_produkHukum extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'id_produk';
    protected $useTimestamps = true;
    protected $allowedFields = ['no', 'id_kategori', 'id_tentang', 'judul', 'tahun', 'status', 'keterangan', 'file', 'id_unit', 'created_by', 'perjanjian', 'validasi', 'pesan'];

    public function get_produk_hukum($id_unit)
    {
        $this->where('md5(tb_produk.id_unit)', $id_unit);
        $this->where('validasi', 1);

        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->orderBy('id_produk', 'DESC');
        return $this->findAll();
    }

    public function get_prohum_blmValid()
    {
        $this->where('validasi', 0);

        // Jika yang login bukan admin, maka hanya get data dari unit nya saja
        if (session()->get('role_id') != 1) {
            $id_unit = session()->get('id_unit');
            $this->where('tb_produk.id_unit', $id_unit);
        } else {
            $request = \Config\Services::request();
            $id_unit = $request->uri->getSegment('2');;
            $this->where('md5(tb_produk.id_unit)', $id_unit);
        }

        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->orderBy('id_produk', 'DESC');
        return $this->findAll();
    }

    public function get_prohum_by_id($id)
    {
        $this->where('id_produk', $id);
        return $this->first();
    }

    public function get_produk_hukum_by_id($id)
    {
        $this->select('*');
        $this->join('tb_unit', 'tb_unit.id_unit=tb_produk.id_unit');
        $this->join('tb_tentang', 'tb_tentang.id_tentang=tb_produk.id_tentang');
        $this->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori');
        $this->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis');
        $this->select('tb_produk.id_unit AS id_unit_produk');
        $this->where('md5(tb_produk.id_produk)', $id);
        return $this->first();
    }

    public function get_tahun()
    {
        $this->select('tahun');
        $this->groupBy('tahun');
        $this->orderBy('tahun', 'ASC');
        return $this->findAll();
    }

    public function validasi_prohum()
    {
        $ids = $_POST['id'];
        return $this->db->table('tb_produk')
            ->whereIn('id_produk', $ids)
            ->set('validasi', '1')
            ->update();
    }
}
