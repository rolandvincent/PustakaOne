<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "popular" => $this->bukuModel->findAll(4),
            "daftar_buku" => $this->bukuModel->paginate(8, "daftar"),
            "pager" => $this->bukuModel->pager
        ];
        return view('public/index', $data);
    }
    public function cari()
    {
        $search = $this->request->getGet('s') ?: "";

        $data = [
            "title" => "Hasil Cari",
            "hasil" => $this->bukuModel->like('judul', $search)->findAll()
        ];
        return view('public/search', $data);
    }
    public function detail($id)
    {
        $data = [
            "title" => "Detail Buku",
            "buku" => $this->bukuModel->find($id)
        ];
        return view('public/detail_buku', $data);
    }

    public function dashboard()
    {
        if (session()->has("user_id")) {
            switch (session()->get("user_role")) {
                case 0:
                    return redirect()->to('/admin');
                    break;
                case 1:
                    return redirect()->to('/admin');
                    break;
                case 2:
                    return redirect()->to('/member');
                    break;
            }
        } else {
            $response = service('response');

            $response->setStatusCode(Response::HTTP_FORBIDDEN);
            $response->setBody("<h1>403 Forbidden</h1><h2>You do not have permission to access this page.</h2>");
            $response->setHeader('Content-type', 'text/html');
            $response->noCache();

            // Sends the output to the browser
            // This is typically handled by the framework
            $response->send();
        }
    }
}
