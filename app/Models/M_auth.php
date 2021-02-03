<?php

namespace App\Models;

use CodeIgniter\Model;

class M_auth extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['name', 'email', 'image', 'password', 'role_id', 'id_unit', 'is_active', 'date_created'];


    public function getAkun($email)
    {
        $this->select('*');
        $this->select('tb_user.id AS id_user');
        $this->join('tb_unit', 'tb_unit.id_unit=tb_user.id_unit');
        $this->join('user_role', 'tb_user.role_id=user_role.id');
        return $this->where(['email' => $email])->first();
    }
}
