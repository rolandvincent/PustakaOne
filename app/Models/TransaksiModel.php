<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'daftar_transaksi';
    protected $allowedFields = ['user_id', 'jenis_transaksi', 'keterangan', 'nilai_uang', 'tanggal_transaksi', 'metode_pembayaran', 'sukses'];
}
