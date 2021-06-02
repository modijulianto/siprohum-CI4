<?php

use \CodeIgniter\Model;

class M_upload extends Model
{
    protected $table = 'tb_upload';
    protected $primaryKey = 'id_upload';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_upload', 'id_unit', 'id_produk', 'ket_upload'];

    public function cek_id_upload()
    {
        return $this->db->table('tb_upload')
            ->select('MAX(id_upload) as id')
            ->get()->getRowArray();
    }

    public function get_upload()
    {
        $this->orderBy('id_upload', 'ASC');
        return $this->findAll();
    }

    public function get_galeri($id)
    {
        return $this->db->table('tb_galeri')
            // ->join('tb_upload', 'tb_upload.id_upload=tb_galeri.id_upload')
            ->where('id_upload', $id)
            ->orderBy('id_upload', 'ASC')
            ->get()->getResultArray();
    }

    public function insert_upload($data)
    {
        return $this->insert($data);
    }

    public function insert_galeri($data)
    {
        return $this->db->table('tb_galeri')->insert($data);
    }
}
