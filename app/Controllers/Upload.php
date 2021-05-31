<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_admin;
use App\Models\M_auth;
use M_upload;

class Upload extends BaseController
{
    protected $m_upload;
    protected $m_auth;
    protected $m_admin;

    public function __construct()
    {
        $this->m_upload = new M_upload();
        $this->m_auth = new M_auth();
        $this->m_admin = new M_admin();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data['akun'] = $this->m_auth->getAkun(session()->get('email'));
        $data['title'] = "Galeri";
        $data['unit'] = $this->m_admin->get_unit();

        return view('User/upload', $data);
    }
}
