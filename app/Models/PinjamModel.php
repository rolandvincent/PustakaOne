<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'daftar_pinjam';
    protected $allowedFields = ['user_id', 'book_id', 'tgl_pinjam', 'tgl_kembali', 'tgl_tenggat', 'denda', 'status'];

    public function getLoan($membershipId)
    {
        return $this->where('membership_id', $membershipId)->findAll();
    }

    public function getHistoryLoan($user_id)
    {
        return $this->where('user_id', $user_id)->findAll();
    }

    public function getActiveLoan($user_id)
    {
        return $this->where('user_id', $user_id)->where('tgl_kembali', null)->findAll();
    }
}
