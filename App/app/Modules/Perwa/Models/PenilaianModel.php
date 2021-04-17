<?php

namespace App\Modules\Perwa\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table      = 'penilaian';
    protected $primaryKey = 'idPenilaian';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['idPengajuan', 'kemampuanAkademik', 'kemampuanLisan', 'kemampuanTertulis', 'motivasi', 'kestabilan', 'kreativitas', 'kemampuanBerkelompok', 'kemampuanTeknis'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
