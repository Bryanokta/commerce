<?php

namespace App\Controllers;

use App\Models\keranjangModel;
use App\Models\BuyersModel;

class Checkout extends BaseController
{
    public function checkout()
    {
        $keranjangModel = new keranjangModel();
        $userModel = new BuyersModel();
        $allItems = $keranjangModel->findAll();
        $subTotal = $this->request->getPost('sub_total');
        //data user
        $namaDepan = $this->request->getPost('nama_depan');
        $namaBelakang = $this->request->getPost('nama_belakang');
        $email = $this->request->getPost('email');
        $noTelephone = $this->request->getPost('no_telephone');
        $address = $this->request->getPost('address');
        $order_id = rand();


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-sPYxOO1Bzr0sIJU6iVAJ0FWB';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order_id,
                'gross_amount' => $subTotal,
            ),
            'customer_details' => array(
                'first_name' => $namaDepan,
                'last_name' => $namaBelakang,
                'email' => $email,
                'phone' => $noTelephone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $token = $snapToken;

        $data = [
            'items' => $allItems,
            'order_id' => $order_id,
            'nama_depan' => $namaDepan,
            'nama_belakang' => $namaBelakang,
            'email' => $email,
            'no_telephone' => $noTelephone,
            'address' => $address,
            'sub_total' => $subTotal,
            'token' => $token
        ];
        $userModel->insert($data);

        return view('frontEnd/page/checkout', $data);
    }
}
