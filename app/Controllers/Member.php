<?php

namespace App\Controllers;

use App\Models\UserModel;

class Member extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            // "user" => $this->userModel->find(session()->get("user_id")),
            "title" => "Dashboard Member"
        ];
        return view('dashboard/index', $data);
    }
}
