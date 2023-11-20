<?php

namespace App\Controllers;

use App\Models\keranjangModel;
use App\Models\BuyersModel;

class Keranjang extends BaseController
{
    public function home()
    {
        $keranjangModel = new keranjangModel();
        $keranjangItems = $keranjangModel->findAll();
        // Inisialisasi total harga
        $totalHarga = 0;

        // Iterasi melalui setiap item dalam keranjang
        foreach ($keranjangItems as $item) {
            // Pastikan total_harga ada dalam setiap item (sesuai dengan struktur data)
            if (isset($item['total_harga'])) {
                // Tambahkan total harga dari setiap item ke totalHarga
                $totalHarga += $item['total_harga'];
            }
        }


        $data = [
            'raw_keranjang' => $keranjangItems,
            'sub_total' => $totalHarga
        ];

        return view('frontEnd/page/keranjang', $data);
    }
    public function hapus($id_pesanan)
    {
        $builder = \Config\Database::connect()->table('keranjang')->where('id_pesanan', $id_pesanan);
        $builder->delete(['id_pesanan' => $id_pesanan]);


        session()->setFlashdata('pesan', 'Produk Telah Dihapus Dari Keranjang');
        return redirect()->to(base_url('produk/keranjang'));
    }
    public function edit()
    {
        // $idPesanan = $this->request->getPost('id');
        // $builder = \Config\Database::connect()->table('keranjang')->where('id_pesanan', $idPesanan);
        $keranjangModel = new keranjangModel();
        $idPesanan = $this->request->getPost('id');
        $keranjangItems = $keranjangModel->find($idPesanan);



        // var_dump($keranjangItems);
        // die();

        echo json_encode($keranjangItems);
    }
    public function update()
    {
        $keranjangModel = new keranjangModel();
        $id = $this->request->getPost('id_hidden');
        $builder = \Config\Database::connect()->table('keranjang')->where('id_pesanan', $id);
        $jumlahBaru = $this->request->getPost('jumlah_pesanan');
        $pesananById = $keranjangModel->find($id);
        $harga = $pesananById['harga_produk'];

        $totalHargaBaru = $harga * $jumlahBaru;

        $data = [
            'jumlah_pesanan' => $jumlahBaru,
            'total_harga' => $totalHargaBaru
        ];
        $builder->update($data);
        session()->setFlashdata('pesan', 'Pesanan Telah Diedit');
        return redirect()->to(base_url('/produk/keranjang'));
    }
    public function precheckout()
    {
        $keranjangModel = new keranjangModel();

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

        return view('frontEnd/page/precheckout', $data);
    }
    public function checkout()
    {
        $userModel = new BuyersModel();
        $keranjangModel = new keranjangModel();
        $allItems = $keranjangModel->findAll();
        $data = [
            'sub_total' => $this->request->getPost('sub_total'),
            'items' => $allItems,
            'nama_depan' => $this->request->getPost('nama_depan'),
            'nama_belakang' => $this->request->getPost('nama_belakang'),
            'email' => $this->request->getPost('email'),
            'no_telephone' => $this->request->getPost('no_telephone'),
            'address' => $this->request->getPost('address'),
            'token' => $this->request->getPost('token'),
            'order_id' => $this->request->getPost('order_id')
        ];
        $userModel->save($data);
        return view('frontEnd/page/checkout', $data);
    }
}
