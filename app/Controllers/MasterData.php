<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_auth;
use App\Models\M_masterData;

class MasterData extends BaseController
{
    protected $m_admin;
    protected $m_md;
    protected $m_auth;

    public function __construct()
    {
        $this->m_admin = new M_admin();
        $this->m_md = new M_masterData();
        $this->m_auth = new M_auth();
        $this->validation = \Config\Services::validation();
    }

    ////////////////////////////////// JENIS PRODUK //////////////////////////////////
    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Jenis Produk',
            'meta' => 'Data Jenis Produk',
            'unit' => $this->m_admin->get_unit(),
            'jenis' => $this->m_md->get_jenis(),
            'validation' => $this->validation,
        ];

        return view('DataTable/data_jenis_produk', $data);
    }

    public function save_jenis()
    {
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required|is_unique[tb_jenis_produk.id_jenis]',
                'errors' => [
                    'required' => 'Nama jenis produk hukum harus diisi',
                    'is_unique' => 'Nama jenis sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/MasterData/jenis')->withInput();
        }

        $data = [
            'nama_jenis' => $this->request->getVar('jenis')
        ];

        $this->m_md->simpan('tb_jenis_produk', $data);
        session()->setFlashdata('jenis', 'Ditambahkan');
        return redirect()->to('/MasterData/jenis');
    }

    public function update_jenis()
    {
        echo json_encode($this->m_md->get_where($_POST['table'], $_POST['primaryKey'], $_POST['id']));
    }

    public function save_update_jenis()
    {
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required|is_unique[tb_jenis_produk.nama_jenis]',
                'errors' => [
                    'required' => 'Nama jenis produk hukum harus diisi',
                    'is_unique' => 'Nama jenis sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/MasterData/jenis')->withInput();
        }

        $id = $this->request->getVar('id');
        $data = [
            'nama_jenis' => $this->request->getVar('jenis')
        ];

        $this->m_md->edit('tb_jenis_produk', $data, 'id_jenis', $id);
        session()->setFlashdata('jenis', 'Diubah');
        return redirect()->to('/MasterData/jenis');
    }

    public function delete_jenis($id)
    {
        $table = 'tb_jenis_produk';
        $primaryKey = 'id_jenis';
        $this->m_md->hapus($table, $primaryKey, $id);
        session()->setFlashdata('jenis', 'Dihapus');
        return redirect()->to('/MasterData/jenis');
    }
    ////////////////////////////////// END JENIS PRODUK //////////////////////////////////


    ////////////////////////////////// KATEGORI //////////////////////////////////
    public function kategori()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Kategori',
            'meta' => 'Data Kategori',
            'unit' => $this->m_admin->get_unit(),
            'kat' => $this->m_md->get_kategori(),
            'jenis' => $this->m_md->get_jenis(),
            'validation' => $this->validation,
        ];

        return view('DataTable/data_kategori', $data);
    }

    public function save_kategori()
    {
        if (!$this->validate([
            'kategori' => [
                'rules' => 'required|is_unique[tb_kategori.nama_kategori]',
                'errors' => [
                    'required' => 'Nama kategori produk hukum harus diisi',
                    'is_unique' => 'Nama kategori sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/MasterData/kategori')->withInput();
        }

        $data = [
            'id_jenis' => $this->request->getVar('id_jenis'),
            'nama_kategori' => $this->request->getVar('kategori')
        ];

        $this->m_md->simpan('tb_kategori', $data);
        session()->setFlashdata('kategori', 'Ditambahkan');
        return redirect()->to('/MasterData/kategori');
    }

    public function update_kategori()
    {
        echo json_encode($this->m_md->get_where($_POST['table'], $_POST['primaryKey'], $_POST['id']));
    }

    public function save_update_kategori()
    {
        if (!$this->validate([
            'kategori' => 'required'
        ])) {
            return redirect()->to('/MasterData/kategori')->withInput();
        }

        $id = $this->request->getVar('id');
        $data = [
            'id_jenis' => $this->request->getVar('id_jenis'),
            'nama_kategori' => $this->request->getVar('kategori')
        ];

        $this->m_md->edit('tb_kategori', $data, 'id_kategori', $id);
        session()->setFlashdata('kategori', 'Diubah');
        return redirect()->to('/MasterData/kategori');
    }

    public function delete_kategori($id)
    {
        $table = 'tb_kategori';
        $primaryKey = 'id_kategori';
        $this->m_md->hapus($table, $primaryKey, $id);
        session()->setFlashdata('kategori', 'Dihapus');
        return redirect()->to('/MasterData/kategori');
    }
    ////////////////////////////////// END KATEGORI //////////////////////////////////


    ////////////////////////////////// TENTANG //////////////////////////////////
    public function tentang()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Tentang',
            'meta' => 'Data Tentang',
            'unit' => $this->m_admin->get_unit(),
            'tentang' => $this->m_md->get_tentang(),
            'validation' => $this->validation,
        ];

        return view('DataTable/data_tentang', $data);
    }

    public function save_tentang()
    {
        if (!$this->validate([
            'tentang' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama tentang produk hukum harus diisi',]
            ]
        ])) {
            return redirect()->to('/MasterData/tentang')->withInput();
        }

        $data = [
            'nama_tentang' => $this->request->getVar('tentang'),
            'id_unit' => session()->get('id_unit')
        ];

        $this->m_md->simpan('tb_tentang', $data);
        session()->setFlashdata('tentang', 'Ditambahkan');
        return redirect()->to('/MasterData/tentang');
    }

    public function update_tentang()
    {
        echo json_encode($this->m_md->get_where($_POST['table'], $_POST['primaryKey'], $_POST['id']));
    }


    public function save_update_tentang()
    {
        if (!$this->validate([
            'tentang' => [
                'rules' => 'required|is_unique[tb_tentang.nama_tentang]',
                'errors' => [
                    'required' => 'Nama tentang produk hukum harus diisi',
                    'is_unique' => 'Nama tentang sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/MasterData/tentang')->withInput();
        }

        $id = $this->request->getVar('id');
        $data = [
            'nama_tentang' => $this->request->getVar('tentang'),
            'id_unit' => session()->get('id_unit')
        ];

        $this->m_md->edit('tb_tentang', $data, 'id_tentang', $id);
        session()->setFlashdata('tentang', 'Diubah');
        return redirect()->to('/MasterData/tentang');
    }

    public function delete_tentang($id)
    {
        $this->m_md->hapus('tb_tentang', 'id_tentang', $id);
        session()->setFlashdata('tentang', 'Dihapus');
        return redirect()->to('/MasterData/tentang');
    }
    ////////////////////////////////// END TENTANG //////////////////////////////////
}
