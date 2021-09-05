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
        if (session()->get('role_id') > 1) {
            $this->where('id_unit', session()->get('id_unit'));
        }

        $this->orderBy('id_upload', 'ASC');
        return $this->findAll();
    }

    public function get_upload_by_id_produk($id)
    {
        $this->where('md5(id_produk)', $id);
        $this->orderBy('id_upload', 'DESC');
        return $this->first();
    }

    public function get_galeri($id)
    {
        return $this->db->table('tb_galeri')
            // ->join('tb_upload', 'tb_upload.id_upload=tb_galeri.id_upload')
            ->where('id_upload', $id)
            ->orderBy('id_upload', 'ASC')
            ->get()->getResultArray();
    }

    public function get_galeri_gambar($id)
    {
        return $this->db->table('tb_galeri')
            // ->join('tb_upload', 'tb_upload.id_upload=tb_galeri.id_upload')
            ->where('id_upload', $id)
            ->where('jenis', "gambar")
            ->orderBy('id_upload', 'ASC')
            ->get()->getResultArray();
    }

    public function get_galeri_video($id)
    {
        return $this->db->table('tb_galeri')
            // ->join('tb_upload', 'tb_upload.id_upload=tb_galeri.id_upload')
            ->where('id_upload', $id)
            ->where('jenis', "video")
            ->orderBy('id_upload', 'ASC')
            ->get()->getResultArray();
    }

    public function get_galeri_by_id($id)
    {
        return $this->db->table('tb_galeri')
            ->join('tb_upload', 'tb_upload.id_upload=tb_galeri.id_upload')
            ->where('md5(id_galeri)', $id)
            ->get()->getRowArray();
    }

    public function insert_upload($data)
    {
        return $this->insert($data);
    }

    public function insert_galeri($data)
    {
        return $this->db->table('tb_galeri')->insert($data);
    }

    public function delete_upload($id)
    {
        $this->where('id_upload', $id);
        return $this->delete();
    }
    public function delete_galeri($id)
    {
        return $this->db->table('tb_galeri')
            ->where('id_upload', $id)
            ->delete();
    }
    public function delete_galeri_by_id($id)
    {
        return $this->db->table('tb_galeri')
            ->where('md5(id_galeri)', $id)
            ->delete();
    }
}
