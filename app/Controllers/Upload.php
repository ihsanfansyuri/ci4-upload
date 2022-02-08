<?php

namespace App\Controllers;

use App\Models\UploadModel;

class Upload extends BaseController
{
    public function index()
    {
        $model = new UploadModel();

        $data = [
            'title' => 'Upload File',
            'files' => $model->getFile()
        ];

        return view('upload/files_view', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Upload File',
            'validation' => \Config\Services::validation()
        ];

        return view('upload/new_upload', $data);
    }

    public function simpan()
    {
        $model = new UploadModel();

        if (!$this->validate([
            'file' => [
                'rules' => 'uploaded[file]|ext_in[file,pdf,docx]|max_size[file,5120]',
                'errors' => [
                    'uploaded' => 'File wajib diisi',
                    'ext_in' => 'File harus berekstensi word atau pdf',
                    'max_size' => 'Ukuran file terlalu besar, maksimal 5MB'
                ]
            ]
        ])) {
            session()->setFlashdata('msg', 'Data gagal disimpan');
            return redirect()->to('upload/tambah')->withInput();
        }

        $files = $this->request->getFile('file');

        $namaFile = $files->getRandomName();
        $path = FCPATH . 'files';
        $files->move($path, $namaFile);

        $data = [
            'nama_file' => $namaFile
        ];

        $model->tambah($data);
        session()->setFlashdata('pesan', 'Data Berhasil Disimpan');

        return redirect()->to('/upload');
    }
}
