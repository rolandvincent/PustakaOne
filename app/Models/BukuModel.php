<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'daftar_buku';
    protected $allowedFields = ['count', 'img_sampul', 'judul', 'penulis', 'penerbit', 'tahun_terbit', 'kota_terbit', 'bahasa', 'ISBN-ISSN', 'edisi', 'subyek'];

    function remove_book($id)
    {
        $last_sampul = $this->find($id)['img_sampul'];
        if ($last_sampul != null) {
            unlink('img/sampul/' . $last_sampul);
        }
        $this->delete($id);
    }

    function updateSampul($id, $name)
    {
        $last_sampul = $this->find($id)['img_sampul'];
        if ($last_sampul != null) {
            unlink('img/sampul/' . $last_sampul);
        }
        $this->update($id, ['img_sampul' => $name]);
    }
}
