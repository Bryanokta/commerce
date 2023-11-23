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
        return redirect()->to(base_url('/keranjang'));
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
        return redirect()->to(base_url('/keranjang'));
    }
}
