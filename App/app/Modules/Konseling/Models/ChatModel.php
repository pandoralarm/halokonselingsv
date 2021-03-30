<?php namespace App\Modules\Konseling\Models;

use CodeIgniter\Model;
class ChatModel extends Model
{
    protected $table      = 'chats';
    protected $primaryKey = 'ThreadID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['ThreadKey', 'MahasiswaNIM', 'KonselorNIP', 'ThreadStatus', 'Started_at', 'Closed_at'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
