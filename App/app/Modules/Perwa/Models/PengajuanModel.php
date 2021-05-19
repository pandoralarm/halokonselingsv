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

    protected $allowedFields = ['nama', 'nim', 'prodi', 'semester', 'ip1', 'ip2', 'ip3', 'ip4', 'ip5', 'ip6', 'ipk', 'namaBeasiswa', 'deadline', 'cv', 'rekomendasi', 'tanggalPengajuan', 'status','dosenPJ', 'nip', 'catatan', 'butuhFile'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
