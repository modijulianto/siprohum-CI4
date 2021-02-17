<?php

namespace App\Models;

use CodeIgniter\Model;

class M_admin extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['name', 'email', 'image', 'password', 'role_id', 'id_unit', 'is_active', 'date_created'];

    public function get_unit()
    {
        $unit = $this->db->table('tb_unit')
            ->orderBy('id_unit', 'ASC')->get();

        return $unit->getResultArray();
    }

    public function get_admin()
    {
        $this->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        $this->orderBy('id', 'DESC');
        $this->where(['role_id' => 1]);
        return $this->findAll();
    }

    public function get_num_rows_admin()
    {
        $this->where(['role_id' => 1]);
        return $this->countAllResults();
    }

    public function get_operator()
    {
        $this->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        $this->orderBy('id', 'DESC');
        $this->where(['role_id' => 2]);
        return $this->findAll();
    }

    public function get_num_rows_operator()
    {
        $this->where(['role_id' => 2]);
        return $this->countAllResults();
    }

    public function get_user_md5($id)
    {
        return $this->db->table('tb_user')
            ->where('md5(id)', $id)->get()->getRowArray();
    }

    public function get_user_wh($id)
    {
        $this->where(['id' => $id]);
        return $this->first();
    }
}
