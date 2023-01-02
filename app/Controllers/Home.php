<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Response;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Beranda",
            "menu_select" => 1
        ];
        return view('public/index', $data);
    }
    public function cari()
    {
        $data = [
            "title" => "Hasil Cari",
            "menu_select" => 1
        ];
        return view('public/search', $data);
    }
    public function detail()
    {
        $data = [
            "title" => "Detail Buku",
            "menu_select" => 1
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
