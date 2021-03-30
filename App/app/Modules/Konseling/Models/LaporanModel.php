<?php namespace App\Modules\Konseling\Models;

use CodeIgniter\Model;
class LaporanModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'LaporanID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ThreadKey', 'Masalah'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
