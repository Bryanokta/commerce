<?php

namespace App\Controllers;

use App\Models\PemesananModel;

class pemesanan extends BaseController
{
    public function home()
    {
        $pemesananModel = new PemesananModel();
        $pemesanan = $pemesananModel->findAll();
        $data = [
            'title' => 'pemesanan',
            'raw_pemesanan' => $pemesanan

        ];
        return view('BackOffice/page/Pemesanan', $data);
    }
}
