<?php

namespace App\Controllers;

use App\Models\M_auth;
use App\Models\M_unit;

class Unit extends BaseController
{
    protected $m_auth;
    protected $m_unit;
    public function __construct()
    {
        $this->m_auth = new M_auth();
        $this->m_unit = new M_unit();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Unit',
            'meta' => 'Data Unit',
            'unit' => $this->m_unit->get_unit(),
            'validation' => $this->validation
        ];

        return view('DataTable/data_unit', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'unit' => [
                'rules' => 'required|is_unique[tb_unit.nama_unit]',
                'errors' => ['is_unique' => 'Unit ini sudah terdaftar']
            ],
            'singkatan' => [
                'rules' => 'required|is_unique[tb_unit.nama_singkat]',
                'errors' => ['is_unique' => 'Singkatan ini sudah terdaftar']
            ]
        ])) {
            return redirect()->to('/Unit')->withInput();
        }

        $this->m_unit->save([
            'nama_unit' => $this->request->getVar('unit'),
            'nama_singkat' => $this->request->getVar('singkatan')
        ]);

        session()->setFlashdata('unit', 'Ditambahkan');
        return redirect()->to('/Unit');
    }

    public function update_unit()
    {
        echo json_encode($this->m_unit->get_unit_wh($_POST['id']));
    }

    public function save_update()
    {
        if (!$this->validate([
            'unit' => 'required',
            'singkatan' => 'required'
        ])) {
            return redirect()->to('/Unit')->withInput();
        }

        $this->m_unit->save([
            'id_unit' => $this->request->getVar('id'),
            'nama_unit' => $this->request->getVar('unit'),
            'nama_singkat' => $this->request->getVar('singkatan')
        ]);

        session()->setFlashdata('unit', 'Diubah');
        return redirect()->to('/Unit');
    }

    public function delete($id)
    {
        $unit = $this->m_unit->get_unit_md5($id);
        $this->m_unit->delete($unit['id_unit']);
        session()->setFlashdata('unit', 'Dihapus');
        return redirect()->to('/Unit');
    }
}
