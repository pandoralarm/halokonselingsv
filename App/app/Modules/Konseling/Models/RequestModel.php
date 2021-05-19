<?php namespace App\Modules\Konseling\Models;

use CodeIgniter\Model;
class RequestModel extends Model
{
    protected $table      = 'request';
    protected $primaryKey = 'RequestID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['MahasiswaNIM', 'MahasiswaPS', 'MahasiswaNama', 'RequestDetail', 'ThreadKey', 'Timestamp'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
