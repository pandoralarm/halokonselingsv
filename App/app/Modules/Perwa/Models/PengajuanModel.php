<?php

namespace App\Modules\Perwa\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    protected $table      = 'pengajuan';
    protected $primaryKey = 'idPengajuan';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'nim', 'prodi', 'namaBeasiswa', 'deadline', 'cv', 'tanggalPengajuan', 'status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
