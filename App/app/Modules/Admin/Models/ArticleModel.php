<?php namespace App\Modules\Admin\Models;

use CodeIgniter\Model;
class ArticleModel extends Model
{
    protected $table      = 'articles';
    protected $primaryKey = 'ArticleID';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['Title', 'Header', 'Content', 'KonselorNIP'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
