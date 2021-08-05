<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Produk implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user yang login adalah admin maka block
        // admin tidak bisa melakukan tambah produk hukum, hanya operator saja yang bisa menambahkannya
        if (session()->get('role_id') == 1) {
            return redirect()->to('/Auth/forbidden');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
