<?php

namespace App\Controllers;

use App\Models\M_admin;
use App\Models\M_auth;

class Operator extends BaseController
{
    protected $m_admin;
    protected $m_auth;
    function __construct()
    {
        $this->m_admin = new M_admin();
        $this->m_auth = new M_auth();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $data = [
            'akun' => $this->m_auth->getAkun(session()->get('email')),
            'title' => 'Data Operator',
            'meta' => 'Data Operator',
            'unit' => $this->m_admin->get_unit(),
            'opr' => $this->m_admin->get_operator(),
            'validation' => $this->validation
        ];

        return view('data_table/data_operator', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => 'required',
            'email' => [
                'rules' => 'required|valid_email|is_unique[tb_user.email]',
                'errors' => ['is_unique' => 'Email sudah terdaftar']
            ],
            'operator' => [
                'rules' => 'is_image[operator]|mime_in[operator,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]',
                'errors' => [
                    'is_image' => 'File tidak valid, upload gambar.',
                    'mime_in' => 'Format gambar harus <i>jpg, jpeg, png, JPG, JPEG</i>.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|matches[retypePassword]',
                'errors' => [
                    'min_length' => 'Panjang password minimal 6 karakter',
                    'matches' => 'Password tidak sama.'
                ]
            ],
            'retypePassword' => [
                'rules' => 'required|min_length[6]|matches[password]',
                'errors' => [
                    'min_length' => 'Panjang password minimal 6 karakter',
                    'matches' => 'Password tidak sama.'
                ]
            ],
        ])) {
            return redirect()->to('/Operator')->withInput();
        }

        // ambil data file gambar
        $fileFoto = $this->request->getFile('operator');
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
            'role_id' => 2,
            'id_unit' => 1,
            'is_active' => 1,
            'date_created' => time(),
        ]);

        session()->setFlashdata('operator', 'Ditambahkan');

        return redirect()->to('/Operator');
    }

    public function activate()
    {
        $data['active'] = $this->m_admin->get_user_wh($_POST['id']);
        $is_active = $data['active']['is_active'];

        if ($is_active == 1) {
            $this->m_admin->save([
                'id' => $_POST['id'],
                'is_active' => 0
            ]);
            $msg = ['nonaktif' => "Dinonaktifkan."];
        } else {
            $this->m_admin->save([
                'id' => $_POST['id'],
                'is_active' => 1
            ]);
            $msg = ['aktif' => "Diaktifkan."];
        }

        echo json_encode($msg);
    }

    public function update_operator()
    {
        echo json_encode($this->m_admin->get_user_wh($_POST['id']));
    }

    public function save_update()
    {
        if (!$this->validate([
            'nama' => 'required',
            'operator' => [
                'rules' => 'is_image[operator]|mime_in[operator,image/jpg,image/jpeg,image/png,image/JPG,image/JPEG,image/PNG]',
                'errors' => [
                    'is_image' => 'File tidak valid, upload gambar.',
                    'mime_in' => 'Format gambar harus <i>jpg, jpeg, png, JPG, JPEG</i>.'
                ]
            ],
        ])) {
            return redirect()->to('/Operator')->withInput();
        }

        $fileFoto = $this->request->getFile('operator');
        $old_image = $this->request->getVar('old_image');

        // cek gambar, apakah tetap gambar yang lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('old_image');
        } else {
            // generate nama file random untuk nama foto
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan gambar ke folder
            $fileFoto->move('upload', $namaFoto);
            if ($old_image != 'default.jpeg') {
                // hapus foto lama
                unlink('upload/' . $this->request->getVar('old_image'));
            }
        }

        $this->m_admin->save([
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('nama'),
            'image' => $namaFoto,
        ]);

        session()->setFlashdata('operator', 'Diubah');

        return redirect()->to('/Operator');
    }

    public function delete($id)
    {
        $data = $this->m_auth->getAkun(session()->get('email'));

        if (md5($data['id_user']) != $id) {
            $user = $this->m_admin->get_user_md5($id);
            // dd($user);

            // cek jika file gambar default.jpeg
            if ($user['image'] != 'default.jpeg') {
                // hapus foto admin
                unlink('upload/' . $user['image']);
            }

            $this->m_admin->delete($user['id']);
            session()->setFlashdata('operator', 'Dihapus');
        } else {
            session()->setFlashdata('message', '
            <script>
                $(document).ready(function() {
                    notify();
                });
            </script>
            ');
        }
        return redirect()->to('/Operator');
    }
}
