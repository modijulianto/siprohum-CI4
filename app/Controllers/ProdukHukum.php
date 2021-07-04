<?php

namespace App\Controllers;

use App\Models\M_auth;
use App\Models\M_admin;
use App\Models\M_produkHukum;
use App\Models\M_masterData;
use M_upload;

class ProdukHukum extends BaseController
{
    protected $m_auth;
    protected $m_admin;
    protected $m_prohum;
    protected $m_md;
    protected $m_upload;
    protected $c_upload;
    public function __construct()
    {
        $this->m_auth = new M_auth();
        $this->m_admin = new M_admin();
        $this->m_prohum = new M_produkHukum();
        $this->m_md = new M_masterData();
        $this->m_upload = new M_upload();
        $this->c_upload = new Upload();
        $this->validation = \Config\Services::validation();
        $this->request = \Config\Services::request();
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
            'validation' => $this->validation,
            'request' => $this->request,
        ];


        return view('DataTable/data_produk_hukum', $data);
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
            'request' => $this->request,
        ];

        return view('DataTable/data_produk_hukum', $data);
    }

    public function detail($id)
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Detail Produk Hukum',
            'meta' => 'Detail Produk Hukum',
            'unit' => $this->m_admin->get_unit(),
            'prohum' => $this->m_prohum->get_produk_hukum_by_id($id),
            'validation' => $this->validation
        ];

        $id_upload = $this->m_upload->get_upload_by_id_produk($id);
        $array = [];

        foreach ($id_upload as $up) {
            $files = [
                'id_upload' => $up['id_upload'],
                'ket' => $up['ket_upload']
            ];
            $gal = $this->m_upload->get_galeri($up['id_upload']);
            array_push($files, $gal);
            $array = $files;
        }
        $data['galeri'] = $array;

        return view('Detail/detail_produk_hukum', $data);
    }

    public function save_media()
    {
        $id_produk = $this->request->getVar('id_produk');
        if (!$this->validate([
            'media' => [
                'rules' => 'mime_in[media,image/jpg,image/jpeg,image/gif,image/png]|max_size[media,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada media yang di upload & Ukuran file maksimal 2 MB',
                    'mime_in' => 'Upload media berformat <i>.jpg, .jpeg, .gif, .png</i>',
                    'max_size' => 'Ukuran file maksimal 2 MB'
                ]
            ],
        ])) {
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk))->withInput();
        }

        $id_unit = $this->request->getVar('id_unit');
        $ket = $this->request->getVar('ket');
        $files = $this->request->getFileMultiple('media');
        $video = $_POST['video'];

        // cek id_upload terakhir pada table tb_upload
        $id_upload_terakhir = $this->m_upload->cek_id_upload();
        $id_upload = $id_upload_terakhir['id'] + 1;


        if ($files[0]->getError() != 4 || $video[0] != "") {
            // input ke tb_upload
            $data_uploads = [
                'id_upload' => $id_upload,
                'id_produk' => $id_produk,
                'id_unit' => $id_unit,
                'ket_upload' => $ket,
            ];
            $this->m_upload->insert_upload($data_uploads);
            // end input tb_upload

            // 
            if ($video[0] != "") {
                foreach ($video as $vid) {
                    $link_embed = str_replace('watch?v=', 'embed/', $vid);
                    $data_link = [
                        'id_upload' => $id_upload,
                        'file' => $link_embed,
                        'jenis' => "video"
                    ];
                    $this->m_upload->insert_galeri($data_link);
                }
            }

            if ($files[0]->getError() != 4) {
                foreach ($files as $img) {
                    $randomName = $img->getRandomName();
                    $data_galeri = [
                        'id_upload' => $id_upload,
                        'file' => $randomName,
                        'jenis' => "gambar"
                    ];
                    $this->m_upload->insert_galeri($data_galeri);
                    $img->move('upload/galeri', $randomName);
                }
            }

            session()->setFlashdata('upload', 'Ditambahkan');
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk));
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><b>Failed!</b> Anda belum memilih file yang akan diupload atau Ukuran file terlalu besar!</div>');
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk));
        }
    }

    public function tambah_media()
    {
        $id_produk = $this->request->getVar('id_produk');
        if (!$this->validate([
            'media' => [
                'rules' => 'mime_in[media,image/jpg,image/jpeg,image/gif,image/png]|max_size[media,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada media yang di upload & Ukuran file maksimal 2 MB',
                    'mime_in' => 'Upload media berformat <i>.jpg, .jpeg, .gif, .png</i>',
                    'max_size' => 'Ukuran file maksimal 2 MB'
                ]
            ],
        ])) {
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk))->withInput();
        }

        $id = $this->request->getVar('id');
        $files = $this->request->getFileMultiple('media');
        // dd($files[0]->getError());
        $video = $_POST['video'];
        // dd($video);
        if ($files[0]->getError() != 4 || $video[0] != "") {
            if ($video[0] != "") {
                foreach ($video as $vid) {
                    $link_embed = str_replace('watch?v=', 'embed/', $vid);
                    $data_link = [
                        'id_upload' => $id,
                        'file' => $link_embed,
                        'jenis' => "video"
                    ];
                    $this->m_upload->insert_galeri($data_link);
                }
            }

            if ($files[0]->getError() != 4) {
                foreach ($files as $img) {
                    $randomName = $img->getRandomName();
                    $data_galeri = [
                        'id_upload' => $id,
                        'file' => $randomName,
                        'jenis' => "gambar"
                    ];
                    $this->m_upload->insert_galeri($data_galeri);
                    $img->move('upload/galeri', $randomName);
                }
            }

            session()->setFlashdata('upload', 'Ditambahkan');
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk));
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><b>Failed!</b> Anda belum memilih file yang akan diupload atau Ukuran file terlalu besar!</div>');
            return redirect()->to('/ProdukHukum/detail/' . md5($id_produk));
        }
    }

    public function delete_media($id)
    {
        $file = $this->m_upload->get_galeri_by_id($id);
        if ($file != null) {
            if ($file['jenis'] == "gambar") {
                if (file_exists('upload/galeri/' . $file['file'])) {
                    unlink('upload/galeri/' . $file['file']);
                }
            }
        }
        $this->m_upload->delete_galeri_by_id($id);

        // cek apakah masih ada data dengan id_upload yang sama seperti pada data file diatas
        // jika sudah tidak ada, maka data pada tb_upload di hapus
        $cek_galeri = $this->m_upload->get_galeri($file['id_upload']);
        if ($cek_galeri == null) {
            $this->m_upload->delete_upload($file['id_upload']);
        }

        session()->setFlashdata('upload', 'Dihapus');
        return redirect()->to('/ProdukHukum/detail/' . md5($file['id_produk']));
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

    public function validasi_prohum()
    {
        if (!isset($_POST['id'])) {
            session()->setFlashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Pilih produk hukum yang akan di validasi.
                </div>'
            );
            return redirect()->to('/ProdukHukum/' . $this->request->getVar('id_unit'))->withInput();
        } else {
            $this->m_prohum->validasi_prohum();
            session()->setFlashdata('prohum', 'Tervalidasi');
            return redirect()->to('/ProdukHukum/' . $this->request->getVar('id_unit'));
        }
    }

    public function save_tentang_baru()
    {
        if (!$this->validate([
            'tentangBaru' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tentang harus diisi']
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

        return view('Form/input_produk_hukum', $data);
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

        return view('Form/update_produk_hukum', $data);
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

        if (session()->get('role_id') == 1) {
            return redirect()->to('/ProdukHukum/' . md5($this->request->getVar('id_unit')));
        } else {
            return redirect()->to('/ProdukHukum');
        }
    }

    public function delete($id)
    {
        $data = $this->m_prohum->get_produk_hukum_by_id($id);
        $id_upload =  $this->m_upload->get_upload_by_id_produk($id);

        if (session()->get('role_id') == 1) {
            if ($data['file'] != "") {
                if (file_exists('upload/produk/' . $data['file'])) {
                    unlink('upload/produk/' . $data['file']);
                }
            }
            $this->c_upload->delete($id_upload[0]['id_upload']);
            $this->m_prohum->delete($data['id_produk']);
            session()->setFlashdata('prohum', 'Dihapus');
            return redirect()->back();
        } else {
            if ($data['id_unit'] == session()->get('id_unit')) {
                if ($data['file'] != "") {
                    unlink('upload/produk/' . $data['file']);
                }
                $this->c_upload->delete($id_upload[0]['id_upload']);
                $this->m_prohum->delete($data['id_produk']);
                session()->setFlashdata('prohum', 'Dihapus');
                return redirect()->back();
            } else {
                return redirect()->to('/Auth/blocked');
            }
        }
    }
}
