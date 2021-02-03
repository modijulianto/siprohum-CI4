<?php

namespace App\Models;

use CodeIgniter\Model;

class M_master_data extends Model
{
    // protected $table = 'tb_tentang';
    // protected $primaryKey = 'id_tentang';
    // protected $useTimeStamps = FALSE;
    // protected $allowFields = ['nama_tentang', 'id_unit'];


    public function get_jenis()
    {
        return $this->db->table('tb_jenis_produk')
            ->orderBy('id_jenis', 'DESC')->get()->getResultArray();
    }

    public function get_kategori()
    {
        return $this->db->table('tb_kategori')
            ->join('tb_jenis_produk', 'tb_jenis_produk.id_jenis=tb_kategori.id_jenis')
            ->orderBy('id_kategori', 'DESC')->get()->getResultArray();
    }

    public function get_tentang()
    {
        return $this->db->table('tb_tentang')
            ->where('id_unit', session()->get('id_unit'))
            ->orderBy('id_tentang', 'DESC')->get()->getResultArray();
    }

    public function get_where($table, $primaryKey, $id)
    {
        return $this->db->table($table)
            ->where($primaryKey, $id)->get()->getRowArray();
    }

    public function simpan($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }

    public function edit($table, $data, $primaryKey, $id)
    {
        return $this->db->table($table)->update($data, array($primaryKey => $id));
    }

    public function hapus($table, $primaryKey, $id)
    {
        return $this->db->table($table)->delete(array('md5(' . $primaryKey . ')' => $id));
    }
}
