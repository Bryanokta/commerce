<?php

namespace App\Models;

use CodeIgniter\Model;

class BuyersModel extends Model
{
    protected $table = 'buyers';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['nama_depan', 'nama_belakang', 'email', 'no_telephone', 'address', 'token', 'order_id', 'sub_total'];
}
