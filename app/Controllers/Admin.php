<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard Admin"
        ];
        return view('dashboard/index', $data);
    }
}
