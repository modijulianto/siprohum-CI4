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
        if ($this->request->getVar('no') != "") {
            return $this->update_pihak();
        }
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
        $result = [
            'tambah' => 'Pihak berhasil di tambah',
            'pihaks' => $this->show_pihak()
        ];
        echo json_encode($result);
    }

    public function update_pihak()
    {
        $penandatangan = $this->request->getVar('penandatangan');
        $lembaga = $this->request->getVar('lembaga');

        if ($penandatangan == "" || $lembaga == "") {
            return $this->fail_add();
        }

        $pihak = array_values(session('cart'));
        $pihak[$_POST['no']] = [
            'penandatangan' => $_POST['penandatangan'],
            'lembaga' => $_POST['lembaga'],
            'bagian' => $_POST['bagian'],
            'jabatan_penandatangan' => $_POST['jabatan_penandatangan'],
            'alamat' => $_POST['alamat'],
        ];

        session()->set('cart', $pihak);
        $result = [
            'edit' => 'Pihak berhasil di update',
            'pihaks' => $this->show_pihak()
        ];
        echo json_encode($result);
    }

    public function show_pihak()
    {
        $output = '';
        $no = 1;
        $arr_no = 0;

        foreach ($this->cart->totals() as $row) {
            $output .= '
            <div class="alert" style="background-color: #E8F0FE;">
                <h6 class="mb-2"><span class="badge badge-secondary badge-lg">Pihak ke- ' . $no++ . '</span>
                    <div class="float-right">
                        <button type="button" class="btn btn-sm btn-info edit-pihak" data-toggle="modal" data-target=".modalPihak" onclick="edit_pihak(' . $arr_no . ')"><i class="fas fa-edit"></i></button>
                        <button type="button" class="btn btn-sm btn-danger hapus-pihak" onclick="hapus_pihak(' . $arr_no++ . ')"><i class="fas fa-trash"></i></button>
                    </div>
                </h6>
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

    public function edit_pihak($id)
    {
        return json_encode($this->cart->load_pihak_for_edit($id));
    }

    public function hapus_pihak()
    {
        $this->cart->hapus_pihak($_POST['id']);

        return json_encode($this->show_pihak());
    }
}
