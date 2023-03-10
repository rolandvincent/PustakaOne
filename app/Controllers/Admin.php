<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\MembershipModel;
use App\Models\PinjamModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    protected $userModel;
    protected $membershipModel;
    protected $bukuModel;
    protected $pinjamModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->membershipModel = new MembershipModel();
        $this->bukuModel = new BukuModel();
        $this->pinjamModel = new PinjamModel();
        helper('converter');
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
        $cari = $this->request->getGet('s');
        $members = [];
        if ($cari) {
            $members = $this->userModel->where("role", 2)->like('nama', $cari)->paginate(10, 'members');
        } else {
            $members = $this->userModel->where("role", 2)->paginate(10, 'members');
        }

        for ($i = 0; $i < count($members); $i++) {
            $membership = $this->userModel->getMembershipFromUserId($members[$i]["id"]);
            $members[$i]["membership"] = $membership ? $membership["jenis"] : 0;
        }
        $data = [
            "user" => $this->userModel->find(session()->get('user_id')),
            "members" => $members,
            "title" => "Kelola Member",
            "pager" => $this->userModel->pager
        ];
        return view('admin/kelola_member', $data);
    }

    public function user_detail($username)
    {
        $user_select = $this->userModel->where('username', $username)->first();
        if ($user_select) {
            $user = $this->userModel->find(session()->get('user_id'));
            $data = [
                'title' => "Profile Pengguna",
                'user' => $user,
                'user_select' => $user_select,
                'membership' =>  $this->userModel->getMembershipFromUserId($user_select["id"])
            ];
            return view('admin/detail_user', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan username '$username' tidak ditemukan!");
        }
    }

    public function user_edit()
    {
        $username = $this->request->getGet("username");
        $continue = $this->request->getGet("continue");
        $user = $this->userModel->find(session()->get('user_id'));
        $user_select = $this->userModel->where('username', $username)->first();
        if ($user) {
            $data = [
                'title' => "Ubah Pengguna",
                'user' => $user,
                'user_select' => $user_select,
                'redirect' => $continue,
                "validation" => \Config\Services::validation()
            ];
            return view('admin/edit_user', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan username '$username' tidak ditemukan!");
        }
    }

    public function user_add()
    {
        $continue = $this->request->getGet("continue");
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Tambah Pengguna",
            'user' => $user,
            'redirect' => $continue,
            "validation" => \Config\Services::validation()
        ];
        return view('admin/add_user', $data);
    }

    public function save()
    {
        $continue = $this->request->getGet("continue") ?: '/dashboard';
        $sender = $this->request->getGet("sender");
        $id = $this->request->getPost("id");
        $user = $this->userModel->find($id);
        $email = $this->request->getPost("email");
        $username = $this->request->getPost("username");
        if ($user) {
            $uservalid = "";
            $emailvalid = "";
            if (strtolower($user['email']) != strtolower($email) && $this->userModel->where('email', $email)->first()) {
                $emailvalid = "|is_unique[users.email]";
            }
            if (strtolower($user['username']) != strtolower($username) && $this->userModel->where('username', $username)->first()) {
                $uservalid = "|is_unique[users.username]";
            }
            $rule = [
                "username" => [
                    'label' => "Username",
                    'rules' => "required|regex_match[/^[a-z][\w\.]+$/i]" . $uservalid,
                    'errors' => [
                        'required' => "{field} harus di isi!",
                        'regex_match' => "{field} tidak valid!",
                        'is_unique' => "{field} sudah terdaftar"
                    ]
                ],
                "email" => [
                    'label' => "Email",
                    'rules' => "required|valid_email" . $emailvalid,
                    'errors' => [
                        'required' => "{field} harus di isi!",
                        'regex_match' => "{field} tidak valid!",
                        'is_unique' => "{field} sudah terdaftar"
                    ]
                ],
                "nama" => [
                    'label' => "Nama",
                    'rules' => "required|min_length[3]",
                    'errors' => [
                        'required' => "{field} harus di isi!",
                        'min_length' => "{field} minimal 3 karakter"
                    ]
                ],
                "TTGL" => [
                    'label' => "Tanggal Lahir",
                    'rules' => "required|valid_date",
                    'errors' => [
                        'required' => "{field} harus di isi!",
                        'valid_date' => "{field} tidak valid"
                    ]
                ],
                "alamat" => [
                    'label' => "Alamat",
                    'rules' => "required|min_length[4]",
                    'errors' => [
                        'required' => "{field} harus di isi!",
                        'min_length' => "{field} minimal 4 karakter"
                    ]
                ]
            ];
            if ($this->request->getFile("avatar")->isFile()) {
                $rule['avatar'] = [
                    'label' => "Foto Profil",
                    'rules' => "is_image[avatar]|max_size[avatar,800]|mime_in[avatar,image/png,image/jpeg]",
                    'errors' => [
                        'is_image' => "{field} harus gambar",
                        'max_size' => "Ukuran maksimal untuk {field} adalah 800K",
                        'mime_in' => "Format {field} tidak valid"
                    ]
                ];
            }
            $get_query = [
                'username' => $user['username'],
                'continue' => $continue
            ];
            if (!$this->validate($rule)) {
                return redirect()->to(sender($sender) . "?" . http_build_query($get_query))->withInput();
            } else {
                if ($this->request->getFile("avatar")->isFile()) {
                    $avatar = $this->request->getFile('avatar');
                    $avatar_name = $avatar->getRandomName();
                    $avatar->move('img/avatars', $avatar_name);
                    $this->userModel->changeAvatar($id, $avatar_name);
                }

                $this->userModel->update($id, [
                    'nama' => $this->request->getPost("nama"),
                    'username' => $username,
                    'email' => $email,
                    'TTGL' => $this->request->getPost("TTGL"),
                    'no_telp' => $this->request->getPost("no_telp"),
                    'alamat' => $this->request->getPost("alamat"),
                    'active' => $this->request->getPost("status")
                ]);
                session()->setFlashdata("message", "Berhasil mengubah user");
                session()->setFlashdata("type", "success");
                return redirect()->to($continue);
            }
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("User dengan id '$id' tidak ditemukan!");
        }
    }

    public function add()
    {
        $continue = $this->request->getGet("continue");
        $sender = $this->request->getGet("sender");
        $rule = [
            "username" => [
                'label' => "Username",
                'rules' => "required|regex_match[/^[a-z][\w\.]+$/i]|is_unique[users.username]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'regex_match' => "{field} tidak valid!",
                    'is_unique' => "{field} sudah terdaftar"
                ]
            ],
            "email" => [
                'label' => "Email",
                'rules' => "required|valid_email|is_unique[users.email]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'regex_match' => "{field} tidak valid!",
                    'is_unique' => "{field} sudah terdaftar"
                ]
            ],
            "nama" => [
                'label' => "Nama",
                'rules' => "required|min_length[3]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'min_length' => "{field} minimal 3 karakter"
                ]
            ],
            "TTGL" => [
                'label' => "Tanggal Lahir",
                'rules' => "required|valid_date",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'valid_date' => "{field} tidak valid"
                ]
            ],
            "alamat" => [
                'label' => "Alamat",
                'rules' => "required|min_length[4]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'min_length' => "{field} minimal 4 karakter"
                ]
            ],
            "new_password" => [
                'label' => "Password Baru",
                'rules' => "required|min_length[8]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'min_length' => "{field} minimal 8 karakter"
                ]
            ],
            "confirm_password" => [
                'label' => "Password Konfirmasi",
                'rules' => "required|matches[new_password]",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'matches' => "{field} harus sama dengan Password Baru"
                ]
            ]
        ];
        if ($this->request->getFile("avatar")->isFile()) {
            $rule['avatar'] = [
                'label' => "Foto Profil",
                'rules' => "is_image[avatar]|max_size[avatar,800]|mime_in[avatar,image/png,image/jpeg]",
                'errors' => [
                    'is_image' => "{field} harus gambar",
                    'max_size' => "Ukuran maksimal untuk {field} adalah 800K",
                    'mime_in' => "Format {field} tidak valid"
                ]
            ];
        }
        $get_query = [
            'continue' => $continue
        ];
        if (!$this->validate($rule)) {
            return redirect()->to(sender($sender) . "?" . http_build_query($get_query))->withInput();
        } else {
            $avatar_name = null;
            if ($this->request->getFile("avatar")->isFile()) {
                $avatar = $this->request->getFile('avatar');
                $avatar_name = $avatar->getRandomName();
                $avatar->move('img/avatars', $avatar_name);
            }

            $this->userModel->insert([
                'avatar' => $avatar_name,
                'nama' => $this->request->getPost("nama"),
                'username' => $this->request->getPost("username"),
                'email' => $this->request->getPost("email"),
                'password' => password_hash($this->request->getPost("new_password"), PASSWORD_BCRYPT),
                'role' => strpos($continue, 'member') ? 2 : 1,
                'TTGL' => $this->request->getPost("TTGL"),
                'no_telp' => $this->request->getPost("no_telp"),
                'alamat' => $this->request->getPost("alamat"),
                'active' => $this->request->getPost("status")
            ]);
            session()->setFlashdata("message", "Berhasil menambahkan user");
            session()->setFlashdata("type", "success");
            return redirect()->to($continue);
        }
    }

    public function delete()
    {
        $continue = $this->request->getGet("continue");
        $username = $this->request->getGet("username");
        $this->userModel->hapus($username);
        session()->setFlashdata("message", "Berhasil menghapus user");
        session()->setFlashdata("type", "success");
        return redirect()->to($continue);
    }

    public function kelolaPustakawan()
    {
        $cari = $this->request->getGet('s');
        $pustakawan = [];
        if ($cari) {
            $pustakawan = $this->userModel->where("role", 1)->like('nama', $cari)->paginate(10, 'pustakawan');
        } else {
            $pustakawan = $this->userModel->where("role", 1)->paginate(10, 'pustakawan');
        }
        $data = [
            "user" => $this->userModel->find(session()->get('user_id')),
            "pustakawan" => $pustakawan,
            "title" => "Kelola Pustakawan",
            "pager" => $this->userModel->pager
        ];
        return view('admin/kelola_pustakawan', $data);
    }

    public function kelolaBuku()
    {
        $cari = $this->request->getGet('s');
        $buku = [];
        if ($cari) {
            $buku = $this->bukuModel->like('judul', $cari)->paginate(5, 'buku');
        } else {
            $buku = $this->bukuModel->paginate(5, 'buku');
        }
        $data = [
            "user" => $this->userModel->find(session()->get('user_id')),
            "buku" => $buku,
            "title" => "Kelola Buku",
            "pager" => $this->bukuModel->pager
        ];
        return view('admin/kelola_buku', $data);
    }

    public function buku_add()
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Tambah Buku",
            'user' => $user,
            "validation" => \Config\Services::validation()
        ];
        return view('admin/add_buku', $data);
    }

    public function buku_add_apply()
    {
        if (!$this->validate([
            "judul" => [
                'label' => "Judul",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "penulis" => [
                'label' => "Penulis",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "tahun_terbit" => [
                'label' => "Tahun Terbit",
                'rules' => "permit_empty|numeric",
                'errors' => [
                    'numeric' => '{field} harus angka'
                ]
            ],
            "bahasa" => [
                'label' => "Bahasa",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "count" => [
                'label' => "Jumlah tersedia",
                'rules' => "required|numeric",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'numeric' => '{field} harus angka'
                ]
            ],
        ])) {
            return redirect()->to("/admin/add/buku")->withInput();
        } else {
            $sampul_name = "";
            if ($this->request->getFile("sampul")->isFile()) {
                $sampul = $this->request->getFile('sampul');
                $sampul_name = $sampul->getRandomName();
                $sampul->move('img/sampul', $sampul_name);
            }
            $new_book = $this->request->getPost();
            $new_book['img_sampul'] = $sampul_name;
            $this->bukuModel->insert($new_book);
            session()->setFlashdata("message", "Berhasil menambah buku");
            session()->setFlashdata("type", "success");
            return redirect()->to('/admin/kelola-buku');
        }
    }

    public function detail_buku($id)
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Detail Buku",
            'user' => $user,
        ];
        return view('admin/detail_buku', $data);
    }

    public function edit_buku($id)
    {
        $user = $this->userModel->find(session()->get('user_id'));
        $data = [
            'title' => "Ubah Buku",
            'user' => $user,
            'buku' => $this->bukuModel->find($id),
            "validation" => \Config\Services::validation()
        ];
        return view('admin/edit_buku', $data);
    }

    public function edit_buku_apply()
    {
        $id = $this->request->getPost('id');
        if (!$id) {
            session()->setFlashdata("message", "Gagal edit buku");
            session()->setFlashdata("type", "danger");
            return redirect()->to("/admin/kelola-buku");
        }
        if (!$this->validate([
            "judul" => [
                'label' => "Judul",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "penulis" => [
                'label' => "Penulis",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "tahun_terbit" => [
                'label' => "Tahun Terbit",
                'rules' => "permit_empty|numeric",
                'errors' => [
                    'numeric' => '{field} harus angka'
                ]
            ],
            "bahasa" => [
                'label' => "Bahasa",
                'rules' => "required",
                'errors' => [
                    'required' => "{field} harus di isi!"
                ]
            ],
            "count" => [
                'label' => "Jumlah tersedia",
                'rules' => "required|numeric",
                'errors' => [
                    'required' => "{field} harus di isi!",
                    'numeric' => '{field} harus angka'
                ]
            ],
        ])) {
            return redirect()->to("/admin/edit/buku/$id")->withInput();
        } else {
            if ($this->request->getFile("sampul")->isFile()) {
                $sampul = $this->request->getFile('sampul');
                $sampul_name = $sampul->getRandomName();
                $sampul->move('img/sampul', $sampul_name);
                $this->bukuModel->updateSampul($id, $sampul_name);
            }
            $edit_book = $this->request->getPost();
            $this->bukuModel->update($id, $edit_book);
            session()->setFlashdata("message", "Berhasil mengedit buku");
            session()->setFlashdata("type", "success");
            return redirect()->to('/admin/kelola-buku');
        }
    }

    public function hapus_buku($id)
    {
        $this->bukuModel->remove_book($id);
        session()->setFlashdata("message", "Berhasil menghapus buku");
        session()->setFlashdata("type", "success");
        return redirect()->to('/admin/kelola-buku');
    }

    public function changeMembership($username)
    {
        $user_select = $this->userModel->where('username', $username)->first();
        $membership = $this->userModel->getMembershipFromUserId($user_select['id']);
        $data = [
            'title' => "Ubah Membership",
            'user' => $this->userModel->find(session()->get('user_id')),
            'user_select' => $user_select,
            'membership' => $membership,
            'loan' => $membership ? $this->pinjamModel->getLoan($membership['id']) : []
        ];
        return view('admin/change_membership', $data);
    }

    public function changeMembership_apply()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user_id = $this->request->getPost('id');
        $jenis = $this->request->getPost('jenis_member');
        if ($user_id) {
            $id_membership = $this->membershipModel->insert([
                'user_id' => $user_id,
                'jenis' => $jenis,
                'status' => 1,
                'date_start' => date('Y-m-d H:i:s'),
                'remaining_loan' => membershipUsageLimit($jenis)
            ], true);
            $this->userModel->update($user_id, [
                'id_membership' => $id_membership
            ]);
        }
        return redirect()->to('/admin/kelola-member');
    }
}
