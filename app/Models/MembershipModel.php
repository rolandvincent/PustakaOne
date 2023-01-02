<?php

namespace App\Models;

use CodeIgniter\Model;

class MembershipModel extends Model
{
    protected $table = 'membership';
    protected $allowedFields = ['jenis', 'status', 'date_start', 'remaining_loan'];
}
