<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ModelSlider;

class Slider extends BaseController
{

    public function __construct()
    {
        $this->ModelSlider = new ModelSlider;
    }

    public function getindex()
    {
        $data =
            [
                'judul' => 'Slider',
                'subjudul'    => '',
                'menu' => 'slider',
                'submenu' => 'slider',
                'page' => 'admin/slider/v_index',
                'slider' => $this->ModelSlider->AllData(),
            ];
        return view('pages/v_template_back', $data);
    }

    public function gettambahData()
    {
        $data =
            [
                'judul' => 'Slider',
                'subjudul'    => 'Tambah Slider',
                'menu' => 'slider',
                'submenu' => 'slider',
                'page' => 'admin/slider/v_tambah',
            ];
        return view('pages/v_template_back', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'judul_slider' => [
                'label' => 'Judul Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'url_slider' => [
                'label' => 'Url Terkait',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_slider' => [
                'label' => 'Cover Slider',
                'rules' => 'uploaded[cover_slider]|max_size[cover_slider,500]',
                'errors' => [
                    'uploaded' => '{field} Tidak Boleh Kosong',
                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {
            $cover_slider = $this->request->getFile('cover_slider');
            $nama_file = $cover_slider->getRandomName();
            $cover_slider->move('cover', $nama_file);
            $data = [
                'judul_slider' => $this->request->getPost('judul_slider'),
                'url_slider' => $this->request->getPost('url_slider'),
                'cover_slider'    => $nama_file,
            ];

            $this->ModelSlider->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Ditambahkan !');
            return redirect()->to('Admin/Slider');
            //jika valid
        } else {
            return redirect()->to('Admin/Slider/tambahData')->withInput();
        }
    }

    public function deleteData($id_slider)
    {
        $data = [
            'id_slider' => $id_slider,
        ];

        $this->ModelSlider->DeleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus !');
        return redirect()->to('Admin/Slider');
    }

    public function geteditData($id_lembaga)
    {
        $data =
            [
                'judul' => 'Slider',
                'subjudul'    => 'Edit Slider',
                'menu' => 'slider',
                'submenu' => 'slider',
                'page' => 'admin/slider/v_edit',
                'slider' => $this->ModelSlider->detailData($id_lembaga),
            ];
        return view('pages/v_template_back', $data);
    }

    public function updateData($id_slider)
    {
        if ($this->validate([
            'judul_slider' => [
                'label' => 'Judul Slider',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong !',
                ]
            ],
            'url_slider' => [
                'label' => 'Url Terkait',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong',
                ]
            ],
            'cover_slider' => [
                'label' => 'Cover Slider',
                'rules' => 'max_size[cover_slider,500]',
                'errors' => [

                    'max_size' => 'Ukuran {field} Max Boleh 500 KB !',
                ]
            ]
        ])) {

            $slider = $this->ModelSlider->DetailData($id_slider);
            $cover_slider = $this->request->getFile('cover_slider');
            if ($cover_slider->getError() == 4) {
                $nama_file = $slider['cover_slider'];
            } else {
                # jika foto diganti
                $nama_file = $cover_slider->getRandomName();
                $cover_slider->move('cover', $nama_file);
            }
            $data = [
                'id_slider' => $id_slider,
                'judul_slider' => $this->request->getPost('judul_slider'),
                'url_slider' => $this->request->getPost('url_slider'),
                'cover_slider'    => $nama_file,
            ];

            $this->ModelSlider->updateData($data);
            session()->setFlashdata('update', 'Data Berhasil Diupdate !');
            return redirect()->to('Admin/Slider');
            //jika valid
        } else {
            return redirect()->to('Admin/Slider/editData/' . $id_slider)->withInput();
        }
    }
}
