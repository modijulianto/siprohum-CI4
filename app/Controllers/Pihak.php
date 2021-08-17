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
        $data = [
            'nama' => $this->request->getVar('nama'),
            'lembaga' => $this->request->getVar('lembaga'),
            'bagian' => $this->request->getVar('bagian'),
            'jabatan' => $this->request->getVar('jabatan'),
            'alamat' => $this->request->getVar('alamat'),
        ];

        $this->cart->add_cart($data);
        echo $this->show_pihak();
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
}
