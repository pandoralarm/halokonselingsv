<?php namespace App\Modules\Konseling\Models;

use CodeIgniter\Model;
class MessagesModel extends Model
{
    protected $table      = 'messages';
    protected $primaryKey = 'MessageID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['SenderID', 'MessageType', 'Message', 'ThreadKey', 'Timestamp'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
