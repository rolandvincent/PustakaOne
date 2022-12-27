<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "menu_select" => 1
        ];
        return view('welcome_message', $data);
    }
}
