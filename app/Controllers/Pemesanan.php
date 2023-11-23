<?php

namespace App\Controllers;

use App\Models\BuyersModel;

class pemesanan extends BaseController
{
    public function home()
    {

        $buyersModel = new BuyersModel();
        $pesanan = $buyersModel->findAll();
        $data['raw_pesanan'] = [];
        foreach ($pesanan as $pesanan) {

            $tokenMid = base64_encode("SB-Mid-server-sPYxOO1Bzr0sIJU6iVAJ0FWB:");
            $url = "https://api.sandbox.midtrans.com/v2/" . $pesanan['order_id'] . "/status";
            $header = [
                'Accept: application/json',
                'Authorization: Basic ' . $tokenMid,
                'Content-Type: application/json'
            ];
            $method = 'GET';
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
            curl_setopt($ch, CURLOPT_POSTFIELDS, false);
            curl_setopt($ch, CURLINFO_HEADER_OUT, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            $hasil = json_decode($result, true);
            $data['raw_pemesanan'][] = [
                'order_id' => $pesanan['order_id'],
                'nama_depan' => $pesanan['nama_depan'],
                'nama_belakang' => $pesanan['nama_belakang'],
                'sub_total'  => $pesanan['sub_total'],
                'email' => $pesanan['email'],
                'address' => $pesanan['address'],
                'status_code' => $hasil['status_code']
            ];
        }
        $data['title'] = "Pesanan";
        return view('BackOffice/page/Pemesanan', $data);
    }
}
