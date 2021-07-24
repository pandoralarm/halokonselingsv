<?php namespace App\Modules\Account\Models;

use CodeIgniter\Model;
class EmailsModel extends Model
{
    protected $table      = 'emails';
    protected $primaryKey = 'username';

    protected $useAutoIncrement = false;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'accountid', 'email', 'notify'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}

