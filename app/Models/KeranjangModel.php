<?php

namespace App\Models;

use CodeIgniter\Model;

class keranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['nama_pesanan', 'jumlah_pesanan', 'gambar_pesanan', 'total_harga', 'harga_produk'];
}
