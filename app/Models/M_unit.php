<?php

namespace App\Models;

use CodeIgniter\Model;

class M_unit extends Model
{
    protected $table = 'tb_unit';
    protected $primaryKey = 'id_unit';
    protected $useTimeStamp = FALSE;
    protected $allowedFields = ['nama_unit', 'nama_singkat'];

    public function get_unit()
    {
        $unit = $this->db->table('tb_unit')
            ->orderBy('id_unit', 'ASC')->get();

        return $unit->getResultArray();
    }

    public function get_unit_wh($id)
    {
        $this->where(['id_unit' => $id]);
        return $this->first();
    }

    public function get_unit_md5($id)
    {
        return $this->db->table('tb_unit')
            ->where('md5(id_unit)', $id)->get()->getRowArray();
    }
}
