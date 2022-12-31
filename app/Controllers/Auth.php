<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            "title" => "Login",
            "validation" => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function check()
    {
        if (!$this->validate([
            "username" => [
                'rules' => "required",
                'errors' => [
                    'required' => "Username/Email harus di isi!"
                ]
            ],
            "password" => [
                'rules' => "required",
                'errors' => [
                    'required' => "Password harus di isi!"
                ]
            ]
        ])) {
            return redirect()->to("/login")->withInput();
        } else {
            $username =  $this->request->getPost("username");
            $password =  $this->request->getPost("password");
            $user = $this->userModel->where("email",)->orWhere("username", $username)->first();
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    session()->set("user_id", $user['id']);
                    session()->set("user_role", $user['role']);
                    return redirect()->to("/dashboard");
                    die;
                }
            }

            session()->setFlashdata("message", "Pengguna atau password salah!");
            return redirect()->to('/login')->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
