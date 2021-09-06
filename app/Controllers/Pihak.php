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

        $penandatangan = $this->request->getVar('penandatangan');
        $lembaga = $this->request->getVar('lembaga');

        if ($penandatangan == "" || $lembaga == "") {
            return $this->fail_add();
        }

        $data = [
            'penandatangan' => $this->request->getVar('penandatangan'),
            'lembaga' => $this->request->getVar('lembaga'),
            'bagian' => $this->request->getVar('bagian'),
            'jabatan_penandatangan' => $this->request->getVar('jabatan_penandatangan'),
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
                        <td>: ' . $row['penandatangan'] . '</td>
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
                        <td>: ' . $row['jabatan_penandatangan'] . '</td>
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
        $penandatangan = $this->request->getVar('penandatangan');
        $lembaga = $this->request->getVar('lembaga');

        if ($penandatangan == "" && $lembaga == "") {
            $msg = [
                'gagal' => "Gagal menambahkan pihak",
                'penandatangan' => "Nama penandatangan harus diisi",
                'lembaga' => "Nama Lembaga harus diisi"
            ];
        } elseif ($penandatangan == "") {
            $msg = [
                'gagal' => "Gagal menambahkan pihak",
                'penandatangan' => "Nama penandatangan harus diisi",
            ];
        } elseif ($lembaga == "") {
            $msg = [
                'gagal' => "Gagal menambahkan pihak",
                'lembaga' => "Nama Lembaga harus diisi"
            ];
        }

        echo json_encode($msg);
    }
}
