<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelApp;

class App extends BaseController
{

    public function __construct()
    {
        $this->ModelApp = new ModelApp;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'App',
                'subjudul'    => 'App',
                'menu' => 'app',
                'submenu' => '',
                'page' => 'admin/v_app',
                'app' => $this->ModelApp->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }


    public function getinsertData()
    {

        $data = [
            'nama_app' => $this->request->getPost('nama_app'),
            'url_app' => $this->request->getPost('url_app'),
        ];

        $this->ModelApp->InsertData($data);
        session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
        return redirect()->to('Admin/App');
        //jika valid

    }

    public function updateData($id_app)
    {

        $data = [
            'id_app' => $id_app,
            'nama_app' => $this->request->getPost('nama_app'),
            'url_app' => $this->request->getPost('url_app'),
        ];

        $this->ModelApp->updateData($data);
        session()->setFlashdata('update', 'Data Berhasil Diupdate !');
        return redirect()->to('Admin/App');
        //jika valid

    }

    public function  deleteData($id_app)
    {
        $data = [
            'id_app' => $id_app,
        ];

        $this->ModelApp->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/App');
    }
}
