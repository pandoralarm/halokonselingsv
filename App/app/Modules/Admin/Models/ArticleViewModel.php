<?php namespace App\Modules\Admin\Models;

use CodeIgniter\Model;
class ArticleViewModel extends Model
{
    protected $table      = 'articleviews';
    protected $primaryKey = 'ArticleID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Title', 'Header', 'Content', 'KonselorNIP', 'Timestamp'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
