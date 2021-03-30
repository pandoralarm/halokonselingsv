<?php

namespace App\Modules\Perwa\Models;

use CodeIgniter\Model;

class BeasiswaModel extends Model
{
    protected $table      = 'beasiswa';
    protected $primaryKey = 'idBeasiswa';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['namaBeasiswa', 'donatur', 'nominal', 'syaratSemester', 'syaratIPK', 'tglDibuka', 'tglDitutup', 'status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
