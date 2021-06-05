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
        $data['validation'] = $this->validation;

        $id_upload = $this->m_upload->get_upload();
        $array = [];

        foreach ($id_upload as $up) {
            $files = [
                'id_upload' => $up['id_upload'],
                'ket' => $up['ket_upload']
            ];
            $gal = $this->m_upload->get_galeri($up['id_upload']);
            array_push($files, $gal);
            array_push($array, $files);
        }
        $data['galeri'] = $array;

        return view('User/upload', $data);
    }

    public function save()
    {
        $ket = $this->request->getVar('keterangan');
        $files = $this->request->getFiles();

        if (!$this->validate([
            'media' => [
                'rules' => 'uploaded[media]|mime_in[media,image/jpg,image/jpeg,image/gif,image/png]|max_size[media,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada media yang di upload & Ukuran file maksimal 2 MB',
                    'mime_in' => 'Upload media berformat <i>.jpg, .jpeg, .gif, .png</i>',
                    'max_size' => 'Ukuran file maksimal 2 MB'
                ]
            ],
        ])) {
            return redirect()->to('/Upload')->withInput();
        }

        if ($files) {
            // cek id_upload terakhir pada table tb_upload
            $id_upload_terakhir = $this->m_upload->cek_id_upload();
            $id_upload = $id_upload_terakhir['id'] + 1;

            $data_uploads = [
                'id_upload' => $id_upload,
                'id_produk' => '',
                'id_unit' => session()->get('id_unit'),
                'ket_upload' => $ket,
            ];
            $this->m_upload->insert_upload($data_uploads);

            foreach ($files['media'] as $key => $img) {
                $randomName = $img->getRandomName();
                $data_galeri = [
                    'id_upload' => $id_upload,
                    'file' => $randomName
                ];
                $this->m_upload->insert_galeri($data_galeri);
                $img->move('upload/galeri', $randomName);
            }

            session()->setFlashdata('upload', 'Ditambahkan');
            return redirect()->to('/Upload');
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><b>Failed!</b> Ukuran file terlalu besar atau Anda belum memilih file yang akan diupload!</div>');
            return redirect()->to('/Upload');
        }
    }

    public function tambah_media($id)
    {
        $files = $this->request->getFiles();

        if (!$this->validate([
            'media' => [
                'rules' => 'uploaded[media]|mime_in[media,image/jpg,image/jpeg,image/gif,image/png]|max_size[media,2048]',
                'errors' => [
                    'uploaded' => 'Harus ada media yang di upload & Ukuran file maksimal 2 MB',
                    'mime_in' => 'Upload media berformat <i>.jpg, .jpeg, .gif, .png</i>',
                    'max_size' => 'Ukuran file maksimal 2 MB'
                ]
            ],
        ])) {
            return redirect()->to('/Upload')->withInput();
        }

        if ($files) {
            foreach ($files['media'] as $key => $img) {
                $randomName = $img->getRandomName();
                $data_galeri = [
                    'id_upload' => $id,
                    'file' => $randomName
                ];
                $this->m_upload->insert_galeri($data_galeri);
                $img->move('upload/galeri', $randomName);
            }
            session()->setFlashdata('upload', 'Ditambahkan');
            return redirect()->to('/Upload');
        } else {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert"><b>Failed!</b> Ukuran file terlalu besar atau Anda belum memilih file yang akan diupload!</div>');
            return redirect()->to('/Upload');
        }
    }

    public function delete($id)
    {
        $files = $this->m_upload->get_galeri($id);
        foreach ($files as $row) {
            if (file_exists('upload/galeri/' . $row['file'])) {
                unlink('upload/galeri/' . $row['file']);
            }
        }
        $this->m_upload->delete_upload($id);
        $this->m_upload->delete_galeri($id);
        session()->setFlashdata('upload', 'Dihapus');
        return redirect()->to('/Upload');
    }

    public function single_delete($id)
    {
        $file = $this->m_upload->get_galeri_by_id($id);
        if (file_exists('upload/galeri/' . $file['file'])) {
            unlink('upload/galeri/' . $file['file']);
        }
        $this->m_upload->delete_galeri_by_id($id);
        session()->setFlashdata('upload', 'Dihapus');
        return redirect()->to('/Upload');
    }
}
