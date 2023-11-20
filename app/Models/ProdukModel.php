<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'product';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_produk', 'gambar_produk', 'stok_produk', 'deskripsi_produk', 'harga_produk'];
}