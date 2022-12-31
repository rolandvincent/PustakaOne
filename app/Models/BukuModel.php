<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'daftar_buku';
    protected $allowedFields = ['count', 'img_sampul', 'judul', 'penulis', 'penerbit', 'no_panggil', 'bahasa', 'ISSBN', 'klasifikasi', 'edisi', 'subyek'];
}
