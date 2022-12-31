<?php

namespace App\Controllers;

use App\Models\MembershipModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $membershipModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->membershipModel = new MembershipModel();
    }

    public function index()
    {
        $data = [
            "user" => $this->userModel->find(session()->get('user_id')),

            "title" => "Dashboard Admin"
        ];

        return view('dashboard/index', $data);
    }

    public function kelolaMember()
    {
        $members = $this->userModel->where("role", 2)->findAll();
        for ($i = 0; $i < count($members); $i++) {
            $members[$i]["membership"] = $this->membershipModel->where("user_id", $members[$i]["id"])->first()["jenis"];
        }
        $data = [
            "user" => $this->userModel->find(session()->get('user_id')),
            "members" => $members,
            "title" => "Kelola Member"
        ];
        return view('admin/kelola_member', $data);
    }

    public function user_detail($id)
    {
        $user = $this->userModel->where('username', $id)->first();
        if ($user) {
            $data = [
                'title' => "User Details",
                'user' => $user
            ];
            return view('admin/detail_user', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan username '$id' tidak ditemukan!");
        }
    }

    public function user_edit($id)
    {
        $user = $this->userModel->where('username', $id)->first();
        if ($user) {
            $data = [
                'title' => "Edit User",
                'user' => $user
            ];
            return view('admin/edit_user', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan username '$id' tidak ditemukan!");
        }
    }
}
