<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'daftar_pinjam';
    protected $allowedFields = ['user_id', 'book_id', 'tgl_pinjam', 'tgl_kembali', 'tgl_tenggat', 'denda', 'status'];
}
