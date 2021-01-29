<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_auth;

class Admin extends BaseController
{
    protected $m_admin;
    protected $m_auth;
    public function __construct()
    {
        $this->m_admin = new M_admin();
        $this->m_auth = new M_auth();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Administrator',
            'meta' => 'Data Administrator',
            'unit' => $this->m_admin->get_unit(),
            'adm' => $this->m_admin->get_admin(),
            'validation' => $this->validation
        ];

        return view('data_table/data_admin', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => 'required',
            'email' => [
                'rules' => 'required|valid_email|is_unique[tb_user.email]',
                'errors' => ['is_unique' => 'Email already registered']
            ],
            'admin' => [
                'rules' => 'is_image[admin]|mime_in[admin,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]',
                'errors' => [
                    'is_image' => 'The file is not a valid, uploaded image file.',
                    'mime_in' => 'The file does not have a valid file type.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|matches[retypePassword]',
                'errors' => [
                    'min_length' => 'The Password field must be at least 6 characters in length',
                    'matches' => 'The Password field does not match the Retype Password field.'
                ]
            ],
            'retypePassword' => [
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'min_length' => 'The Password field must be at least 6 characters in length',
                    'matches' => 'The Retype Password field does not match the Password field.'
                ]
            ],
        ])) {
            return redirect()->to('/Admin')->withInput();
        }

        // ambil data file gambar
        $fileFoto = $this->request->getFile('admin');
        if ($fileFoto->getError() == 4) {
            $namaFoto = "default.jpeg";
        } else {
            // generate nama file random untuk nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar ke folder
            $fileFoto->move('upload', $namaFoto);
        }

        $this->m_admin->save([
            'name' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'image' => $namaFoto,
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'id_unit' => 1,
            'is_active' => 1,
            'date_created' => time(),
        ]);

        session()->setFlashdata('admin', 'Added');

        return redirect()->to('/Admin');
    }

    public function update_admin()
    {
        echo json_encode($this->m_admin->get_admin_wh($_POST['id']));
    }

    public function save_update()
    {
        if (!$this->validate([
            'nama' => 'required',
            'admin' => [
                'rules' => 'is_image[admin]|mime_in[admin,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]',
                'errors' => [
                    'is_image' => 'The file is not a valid, uploaded image file.',
                    'mime_in' => 'The file does not have a valid file type.'
                ]
            ],
        ])) {
            return redirect()->to('/Admin')->withInput();
        }

        $fileFoto = $this->request->getFile('admin');

        // cek gambar, apakah tetap gambar yang lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('old_image');
        } else {
            // generate nama file random untuk nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar ke folder
            $fileFoto->move('upload', $namaFoto);
            // hapus foto lama
            unlink('upload/' . $this->request->getVar('old_image'));
        }

        $this->m_admin->save([
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('nama'),
            'image' => $namaFoto,
        ]);

        session()->setFlashdata('admin', 'Updated');

        return redirect()->to('/Admin');
    }

    public function delete($id)
    {
        $user = $this->m_admin->getAdmin_byId($id);
        // dd($user);

        // cek jika file gambar default.jpeg
        if ($user['image'] != 'default.jpeg') {
            // hapus foto admin
            unlink('upload/' . $user['image']);
        }

        $this->m_admin->delete($user['id']);
        session()->setFlashdata('admin', 'Deleted');
        return redirect()->to('/Admin');
    }
}
