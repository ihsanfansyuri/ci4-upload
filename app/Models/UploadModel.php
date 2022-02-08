<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model
{
    // ...
    protected $table      = 'files';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_file'];


    public function getFile()
    {
        $builder = $this->db->table('files')
            ->get()->getResultArray();

        return $builder;
    }

    public function tambah($data)
    {
        $builder = $this->db->table('files');

        return $builder->insert($data);
    }
}
