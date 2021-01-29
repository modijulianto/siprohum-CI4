<?php

namespace App\Controllers;

use App\Models\M_auth;

class Auth extends BaseController
{
    protected $m_auth;
    public function __construct()
    {
        $this->m_auth = new M_auth();
        $session = \Config\Services::session();
    }

    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        return view('auth/login', $data);
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $akun = $this->m_auth->getAkun($email);

        if ($akun) {
            if (password_verify($password, $akun['password'])) {
                // dd($akun);
                $data = [
                    'id_akun' => $akun['id'],
                    'nama' => $akun['name'],
                    'email' => $akun['email'],
                    'foto' => $akun['image'],
                    'role_id' => $akun['role_id'],
                    'id_unit' => $akun['id_unit'],
                    'date_created' => $akun['date_created'],
                ];
                session()->set($data);
                return redirect()->to('/Dashboard');
            } else {
                session()->setFlashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> wrong password!</div>');
                return redirect()->to('/Auth');
            }
        } else {
            session()->setFlashdata('registered', '<div class="alert alert-warning" role="alert"><b>Failed!</b> your email is not registered!</div>');
            return redirect()->to('/Auth');
        }
    }

    public function registration()
    {
        $data = [
            'title' => 'Registrasi | YukNgotel',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/registration', $data);
    }

    public function regis()
    {
        if (!$this->validate([
            'name' => 'required',
            'email' => [
                'rules' => 'required|is_unique[tb_akun.email]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} sudah terdaftar.'
                ]
            ],
            'password1' => [
                'rules' => 'required|min_length[6]|matches[password2]',
                'errors' => [
                    'matches' => 'Password not match!',
                    'min_length' => 'Password at least 6 character!'
                ]
            ],
            'password2' => 'required|matches[password1]'
        ])) {
            $validaion = \Config\Services::validation();
            // dd($validaion);
            return redirect()->to('/Auth/registration')->withInput()->with('validation', $validaion);
        }

        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $this->m_admin->save([
            'nama' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'foto' => 'default.jpeg',
            'role_id' => 4
        ]);
        session()->setFlashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> your account has been created. Please login to your account!</div>');
        return redirect()->to('/Auth');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('registered', '<div class="alert alert-success" role="alert"><b>Congratulation!</b> you have been logout!</div>');
        return redirect()->to('/Auth');
    }

    //--------------------------------------------------------------------

}
