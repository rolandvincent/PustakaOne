<?php

namespace App\Controllers;

class Member extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard Member"
        ];
        return view('dashboard/index', $data);
    }
}
