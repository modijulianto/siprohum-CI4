<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Wildanfuady\WFcart\WFcart;

class Pihak extends BaseController
{
    public function __construct()
    {
        $this->cart = new WFcart();
    }

    public function tambah()
    {
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required',
        //         'errors' => ['required' => 'Nama penandatangan harus diisi']
        //     ],
        //     'lembaga' => [
        //         'rules' => 'required',
        //         'errors' => ['required' => 'Nama lembaga harus diisi']
        //     ],
        // ])) {
        //     return redirect()->to('/ProdukHukum/add')->withInput();

        // }

        $nama = $this->request->getVar('nama');
        $lembaga = $this->request->getVar('lembaga');

        if ($nama == "" || $lembaga == "") {
            return $this->fail_add();
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'lembaga' => $this->request->getVar('lembaga'),
            'bagian' => $this->request->getVar('bagian'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->cart->add_cart($data);
        echo json_encode($this->show_pihak());
    }

    public function show_pihak()
    {
        $output = '';
        $no = 1;

        foreach ($this->cart->totals() as $row) {
            $output .= '
            <div class="alert" style="background-color: #E8F0FE;">
                <h6 class="mb-0"><span class="badge badge-secondary badge-lg">Pihak ke- ' . $no++ . '</span></h6> <br>
                <table border="0">
                    <tr>
                        <td>Nama</td>
                        <td>: ' . $row['nama'] . '</td>
                    </tr>
                    <tr>
                        <td>Lembaga</td>
                        <td>: ' . $row['lembaga'] . '</td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td>: ' . $row['bagian'] . '</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>: ' . $row['jabatan'] . '</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: ' . $row['alamat'] . '</td>
                    </tr>
                </table>
            </div>';
        }
        return $output;
    }

    public function load_pihak()
    {
        echo $this->show_pihak();
    }

    public function fail_add()
    {
        $msg = [];
        $nama = $this->request->getVar('nama');
        $lembaga = $this->request->getVar('lembaga');

        if ($nama == "") {
            $msg_nama = [
                'nama' => "Nama penandatangan harus diisi"
            ];
            array_push($msg, $msg_nama);
        }
        if ($lembaga == "") {
            $msg_lembaga = [
                'lembaga' => "Nama Lembaga harus diisi"
            ];
            array_push($msg, $msg_lembaga);
        }

        echo json_encode($msg);
    }
}
