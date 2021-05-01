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
        $this->validation = \Config\Services::validation();
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

        return view('/User/dashboard', $data);
    }

    public function my_profile()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'My Profile',
            'meta' => 'My Profile',
            'unit' => $this->m_admin->get_unit(),
            'validation' => $this->validation
        ];

        return view('/User/my_profile', $data);
    }

    public function update_profile()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => ['required' => 'Nama harus diisi']
            ],
        ])) {
            return redirect()->to('/Profile')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');
        $old_image = $this->request->getVar('old_image');

        // cek gambar, apakah tetap gambar yang lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $old_image;
        } else {
            // generate nama file random untuk nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar ke folder
            $fileFoto->move('upload', $namaFoto);
            if ($old_image != 'default.jpeg') {
                // hapus foto lama
                unlink('upload/' . $old_image);
            }
        }

        $this->m_user->save([
            'id' => $this->request->getVar('id'),
            'name' => trim($this->request->getVar('nama')),
            'image' => $namaFoto,
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your profile has been updated!</div>');

        return redirect()->to('/Profile');
    }

    public function deletePhoto()
    {
        $data = $this->m_auth->getAkun(session()->get('email'));

        if ($data['image'] != 'default.jpeg') {
            unlink('upload/' . $data['image']);
        }

        $this->m_user->save([
            'id' => $data['id_user'],
            'image' => 'default.jpeg',
        ]);

        session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your photo profile has been deleted!</div>');
        return redirect()->to('/Profile');
    }

    public function change_password()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Ubah Password',
            'meta' => 'Ubah Password',
            'unit' => $this->m_admin->get_unit(),
            'validation' => $this->validation
        ];

        return view('/User/change_password', $data);
    }

    public function save_change_password()
    {
        if (!$this->validate([
            'current_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Current password harus diisi',
                ]
            ],
            'new_password1' => [
                'rules' => 'required|min_length[6]|matches[new_password2]',
                'errors' => [
                    'min_length' => 'Panjang password minimal 6 karakter',
                    'matches' => 'Password tidak sama.'
                ]
            ],
            'new_password2' => [
                'rules' => 'required|min_length[6]|matches[new_password1]',
                'errors' => [
                    'min_length' => 'Panjang password minimal 6 karakter',
                    'matches' => 'Password tidak sama.'
                ]
            ],
        ])) {
            return redirect()->to('/ChangePassword')->withInput();
        }

        $data = $this->m_auth->getAkun(session()->get('email'));
        $current_password = $this->request->getVar('current_password');
        $new_password = $this->request->getVar('new_password1');

        if (!password_verify($current_password, $data['password'])) {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert" style="color:black;"><b>Opss!</b> wrong current password!</div>');
            return redirect()->to('/ChangePassword');
        } else {
            if ($current_password == $new_password) {
                session()->setFlashdata('message', '<div class="alert alert-warning" role="alert" style="color:black;"><b>Opss!</b> new password cannot be the same as current password!</div>');
                return redirect()->to('/ChangePassword');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                $this->m_user->save([
                    'id' => $data['id_user'],
                    'password' => $password_hash,
                ]);

                session()->setFlashdata('message', '<div class="alert alert-success" role="alert"><b>Congrats!</b> password changed!</div>');
                return redirect()->to('/ChangePassword');
            }
        }
    }
}
