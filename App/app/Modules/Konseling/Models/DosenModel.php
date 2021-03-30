<?php namespace App\Modules\Konseling\Models;

use CodeIgniter\Model;
class DosenModel extends Model
{
    protected $table      = 'dosen';
    protected $primaryKey = 'NIP';

    protected $useAutoIncrement = false;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
