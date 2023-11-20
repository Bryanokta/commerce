<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class produk extends BaseController
{
    public function Home()
    {
        $produkModel = new ProdukModel();
        $produk = $produkModel->findAll();
        $data = [
            'title' => 'Produk',
            'raw_produk' => $produk
        ];

        return view('BackOffice/page/Produk', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Produk',

        ];
        return view('BackOffice/page/Tambah', $data);
    }
    public function save()
    {
        $file = $this->request->getFile('gambar_produk');
        $file->move('img');
        $namaFile = $file->getName();

        $produkModel = new ProdukModel();
        $produkModel->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'gambar_produk' =>  $namaFile,
            'stok_produk' =>  $this->request->getPost('stok_produk'),
            'harga_produk' =>  $this->request->getPost('harga_produk'),
            'deskripsi_produk' =>  $this->request->getPost('deskripsi_produk')
        ]);
        session()->setFlashdata('pesan', 'Produk Telah Berhasil Ditambahkan');

        return redirect()->to(base_url('produk/home'));
    }
    public function delete($id)
    {
        $produkModel = new ProdukModel();
        $allData = $produkModel->find($id);

        unlink('img/' . $allData['gambar_produk']);

        $produkModel->delete($id);
        session()->setFlashdata('pesan', 'Produk Telah Berhasil Dihapus');
        return redirect()->to(base_url('produk/home'));
    }
    public function edit($id)
    {
        $produkModel = new ProdukModel();
        $produkById = $produkModel->find($id);
        $data = [
            'title' => 'Edit Produk',
            'produk' => $produkById
        ];
        return view('BackOffice/page/Edit', $data);
    }
    public function update($id)
    {
        $produkModel = new ProdukModel();
        $produkById = $produkModel->find($id);
        $builder = \Config\Database::connect()->table('product')->where('id', $id);
        $file = $this->request->getFile('gambar_produk');
        $namaFile = $file->getName();
        if (empty($namaFile)) {
            $gambarLama = $produkById['gambar_produk'];
            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'gambar_produk' =>  $gambarLama,
                'stok_produk' =>  $this->request->getPost('stok_produk'),
                'harga_produk' =>  $this->request->getPost('harga_produk'),
                'deskripsi_produk' =>  $this->request->getPost('deskripsi_produk')
            ];
        } else {
            $gambarBaru = $this->request->getFile('gambar_produk');
            $gambarBaru->move('img');
            $namaGambarbaru = $gambarBaru->getName();

            $data = [
                'nama_produk' => $this->request->getPost('nama_produk'),
                'gambar_produk' =>  $namaGambarbaru,
                'stok_produk' =>  $this->request->getPost('stok_produk'),
                'harga_produk' =>  $this->request->getPost('harga_produk'),
                'deskripsi_produk' =>  $this->request->getPost('deskripsi_produk')
            ];
            
        }
        session()->setFlashdata('pesan', 'Produk Telah Berhasil Diubah');
        $builder->update($data);

        return redirect()->to(base_url('produk/home'));
    }
}
