<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\keranjangModel;

class FrontEnd extends BaseController
{
    public function home()
    {
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
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
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $data = [
            'raw_produk' => $produk,
            'token' => $snapToken
        ];
        return view('frontEnd/page/home', $data);
    }
    public function getProdukById()
    {

        $idPost = $this->request->getPost('id');
        $produkModel = new ProdukModel();
        echo json_encode($produkModel->find($idPost));
    }
    public function keranjang()
    {
        //method mengambil harga produk
        $produkModel = new ProdukModel();
        $id_pesanan = $this->request->getPost('id');
        $produkById = $produkModel->find($id_pesanan);
        $namaProdukById = $produkById['nama_produk'];
        $hargaProdukById = $produkById['harga_produk'];

        //method menjumlah harga produk dan jumlah produk
        $jumlah_pesanan = $this->request->getPost('jumlah');
        $hargaTotal = $hargaProdukById * $jumlah_pesanan;
        $hasilRupiah = "Rp " . number_format($hargaTotal, 2, ',', '.');

        //method keranjang
        $keranjangModel = new keranjangModel();
        $keranjangModel->save([
            'id_pesanan' => rand(),
            'nama_pesanan' => $this->request->getPost('nama_produk'),
            'jumlah_pesanan' => $jumlah_pesanan,
            'gambar_pesanan' => $this->request->getPost('gambar_produk'),
            'total_harga' => $hargaTotal,
            'harga_produk' => $hargaProdukById
        ]);
        session()->setFlashdata('pesan', '' . $namaProdukById . ' Telah Berhasil Ditambahkan Ke keranjang');

        return redirect()->to(base_url('/'));
    }
}
