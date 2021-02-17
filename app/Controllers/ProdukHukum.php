<?php

namespace App\Controllers;

use App\Models\M_auth;
use App\Models\M_admin;
use App\Models\M_produkHukum;
use App\Models\M_masterData;

class ProdukHukum extends BaseController
{
    protected $m_auth;
    protected $m_admin;
    protected $m_prohum;
    protected $m_md;
    public function __construct()
    {
        $this->m_auth = new M_auth();
        $this->m_admin = new M_admin();
        $this->m_prohum = new M_produkHukum();
        $this->m_md = new M_masterData();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Produk Hukum',
            'meta' => 'Data Produk Hukum',
            'unit' => $this->m_admin->get_unit(),
            'prohum' => $this->m_prohum->get_produk_hukum(md5(session()->get('id_unit'))),
            'prohum_blmValid' => $this->m_prohum->get_prohum_blmValid(),
            'opt_tahun' => $this->m_prohum->get_tahun(),
            'validation' => $this->validation
        ];

        return view('data_table/data_produk_hukum', $data);
    }

    public function produk_hukum($id_unit)
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Produk Hukum',
            'meta' => 'Data Produk Hukum',
            'unit' => $this->m_admin->get_unit(),
            'prohum' => $this->m_prohum->get_produk_hukum($id_unit),
            'prohum_blmValid' => $this->m_prohum->get_prohum_blmValid(),
            'opt_tahun' => $this->m_prohum->get_tahun(),
            'validation' => $this->validation,
        ];

        return view('data_table/data_produk_hukum', $data);
    }

    public function detail($id)
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Detail Produk Hukum',
            'meta' => 'Detail Produk Hukum',
            'unit' => $this->m_admin->get_unit(),
            'prohum' => $this->m_prohum->get_produk_hukum_by_id($id),
        ];

        return view('detail/detail_produk_hukum', $data);
    }

    public function find_tentang()
    {
        $db = \Config\Database::connect();
        $q = $this->request->getVar("tentang");
        $sql = "select id_tentang as id,nama_tentang as text from tb_tentang where nama_tentang like '%" . $q . "%' order by id_tentang asc";
        //die($sql);
        $data_tindakan = $db->query($sql)->getResultArray();


        echo json_encode($data_tindakan);
    }

    public function save_tentang_baru()
    {
        if (!$this->validate([
            'tentangBaru' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
        ])) {
            return redirect()->to('/ProdukHukum/add')->withInput();
        }

        $data = [
            'nama_tentang' => $this->request->getVar('tentangBaru'),
            'id_unit' => session()->get('id_unit')
        ];

        $result = $this->m_md->simpan('tb_tentang', $data);
        echo json_encode($result);
    }

    public function add()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Tambah Data Produk Hukum',
            'meta' => 'Tambah Data Produk Hukum',
            'unit' => $this->m_admin->get_unit(),
            'kat' => $this->m_md->get_kategori(),
            'validation' => $this->validation,
        ];

        return view('form/input_produk_hukum', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nomor' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor produk hukum harus diisi']
            ],
            'tahun' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Tahun produk hukum harus diisi',
                    'numeric' => 'Field tahun hanya boleh diisi dengan angka'
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul produk hukum harus diisi']
            ],
            'tentang' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tentang produk hukum harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Keterangan produk hukum harus diisi']
            ],
            'status' => [
                'rules' => 'required',
                'errors' => ['required' => 'Status produk hukum harus diisi']
            ],
            'produk' => [
                'rules' => 'mime_in[produk,application/pdf,application/doc,application/docx]',
                'errors' => ['mime_in' => 'Upload file produk hukum berformat <i>.pdf, .doc,</i> atau <i>.docx</i>']
            ],
        ])) {
            return redirect()->to('/ProdukHukum/add')->withInput();
        }

        $file = $this->request->getFile('produk');
        // generate nama random untuk nama File
        $namaFile = $file->getRandomName();
        // pindahkan file ke folder
        $file->move('upload/produk', $namaFile);

        if (session()->get('role_id') == 1) {
            $valid = 1;
        } else {
            $valid = 0;
        }

        $this->m_prohum->save([
            'no' => $this->request->getVar('nomor'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_tentang' => $this->request->getVar('tentang'),
            'judul' => $this->request->getVar('judul'),
            'tahun' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => $namaFile,
            'id_unit' => session()->get('id_unit'),
            'validasi' => $valid
        ]);

        session()->setFlashdata('prohum', 'Ditambahkan');

        return redirect()->to('/ProdukHukum');
    }

    public function update($id)
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Tambah Data Produk Hukum',
            'meta' => 'Tambah Data Produk Hukum',
            'prohum' => $this->m_prohum->get_produk_hukum_by_id($id),
            'unit' => $this->m_admin->get_unit(),
            'kat' => $this->m_md->get_kategori(),
            'validation' => $this->validation,
        ];

        return view('form/update_produk_hukum', $data);
    }

    public function save_update()
    {
        // dd($_POST);
        if (!$this->validate([
            'nomor' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nomor produk hukum harus diisi']
            ],
            'tahun' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Tahun produk hukum harus diisi',
                    'numeric' => 'Field tahun hanya boleh diisi dengan angka'
                ]
            ],
            'judul' => [
                'rules' => 'required',
                'errors' => ['required' => 'Judul produk hukum harus diisi']
            ],
            'keterangan' => [
                'rules' => 'required',
                'errors' => ['required' => 'Keterangan produk hukum harus diisi']
            ],
            'status' => [
                'rules' => 'required',
                'errors' => ['required' => 'Status produk hukum harus diisi']
            ],
            'produk' => [
                'rules' => 'mime_in[produk,application/pdf,application/doc,application/docx]',
                'errors' => ['mime_in' => 'Upload file produk hukum berformat <i>.pdf, .doc,</i> atau <i>.docx</i>']
            ],
        ])) {
            return redirect()->to('/ProdukHukum/update/' . md5($this->request->getVar('id')))->withInput();
        }

        $file = $this->request->getFile('produk');
        $old_produk = $this->request->getVar('old_produk');

        // cek file, apakah tetap file yang lama
        if ($file->getError() == 4) {
            $namaFile = $old_produk;
        } else {
            // generate nama file random untuk nama foto
            $namaFile = $file->getRandomName();

            // pindahkan file ke folder
            $file->move('upload/produk', $namaFile);

            // Hapus file lama
            if ($old_produk != "") {
                unlink('upload/produk/' . $old_produk);
            }
        }

        $tentangBaru = $this->request->getVar('tentang');
        $tentangLama = $this->request->getVar('old_tentang');
        if ($tentangBaru) {
            $id_tentang = $tentangBaru;
        } else {
            $id_tentang = $tentangLama;
        }

        $this->m_prohum->save([
            'id_produk' => $this->request->getVar('id'),
            'no' => $this->request->getVar('nomor'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'id_tentang' => $id_tentang,
            'judul' => $this->request->getVar('judul'),
            'tahun' => $this->request->getVar('tahun'),
            'status' => $this->request->getVar('status'),
            'keterangan' => $this->request->getVar('keterangan'),
            'file' => $namaFile,
            // 'id_unit' => session()->get('id_unit')
        ]);

        session()->setFlashdata('prohum', 'Diubah');

        return redirect()->to('/ProdukHukum/' . md5($this->request->getVar('id_unit')));
    }

    public function delete($id)
    {
        $data = $this->m_prohum->get_produk_hukum_by_id($id);

        if (session()->get('role_id') == 1) {
            if ($data['file'] != "") {
                if (file_exists('upload/produk/' . $data['file'])) {
                    unlink('upload/produk/' . $data['file']);
                }
            }
            $this->m_prohum->delete($data['id_produk']);
            session()->setFlashdata('prohum', 'Dihapus');
            return redirect()->back();
        } else {
            if ($data['id_unit'] == session()->get('id_unit')) {
                if ($data['file'] != "") {
                    unlink('upload/produk/' . $data['file']);
                }
                $this->m_prohum->delete($data['id_produk']);
                session()->setFlashdata('prohum', 'Dihapus');
                return redirect()->back();
            } else {
                return redirect()->to('/Auth/blocked');
            }
        }
    }
}