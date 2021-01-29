<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_auth;
use App\Models\M_user;

class User extends BaseController
{
    protected $m_admin;
    protected $m_auth;
    protected $m_user;
    public function __construct()
    {
        $this->m_admin = new M_admin();
        $this->m_auth = new M_auth();
        $this->m_user = new M_user();
    }

    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Dashboard',
            'meta' => 'Dashboard',
            'unit' => $this->m_admin->get_unit(),
            'status' => $this->m_user->getStatus(),
            'jmlAdm' => $this->m_user->getJmlAdmin(),
            'jmlOpr' => $this->m_user->getJmlOperator(),
            'blmValidasi' => $this->m_user->getJmlProhumBlmValid(),

            // Chart
            'tahun' => $this->m_user->getTahun(),
            'chartUnit' => $this->m_user->getUnit(),
            'jenis' => $this->m_user->getJenis(),
            'katProduk' => $this->m_user->getKatProduk()
        ];

        return view('/user/dashboard', $data);
    }
}
