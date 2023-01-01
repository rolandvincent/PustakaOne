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
            "user" => $this->userModel->find(session()->get("user_id")),
            "title" => "Dashboard Member"
        ];
        return view('dashboard/index', $data);
    }

    public function edit_profile()
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Edit Profil",
            'user' => $user,
            'redirect' => '/profil/edit',
            'user_select' => $user,
            "validation" => \Config\Services::validation()
        ];
        return view('admin/edit_user', $data);
    }

    public function change_password()
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Change Password",
            'user' => $user,
            "validation" => \Config\Services::validation()
        ];
        return view('member/change_password', $data);
    }

    public function apply_password()
    {
        if (!$this->validate([
            "current_password" => [
                'label' => "Password Saat Ini",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus diisi"
                ]
            ],
            "new_password" => [
                'label' => "Password Baru",
                'rules' => "required|min_length[8]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'min_length' => "{field} minimal 8 karakter"
                ]
            ],
            "confirm_password" => [
                'label' => "Password Konfirmasi",
                'rules' => "required|matches[new_password]",
                'errors' => [
                    'required' => "{field} harus diisi",
                    'matches' => "{field} harus sama dengan Password Baru"
                ]
            ]
        ])) {
            return redirect()->to('/profil/edit-password')->withInput();
        } else {
            $new_password =  $this->request->getPost("new_password");
            $current_password =  $this->request->getPost("current_password");
            $user = $this->userModel->find(session()->get('user_id'));
            if (password_verify($current_password, $user['password'])) {
                $this->userModel->update($user['id'], ['password' => password_hash($new_password, PASSWORD_BCRYPT)]);
                session()->setFlashdata("message", "Password telah diubah");
                session()->setFlashdata("type", "success");
                return redirect()->to('/profil/edit-password');
            } else {
                session()->setFlashdata("message", "Password Sekarang salah!");
                session()->setFlashdata("type", "danger");
                return redirect()->to('/profil/edit-password');
            }
        }
    }
}
