<?php
namespace App\Models;

use CodeIgniter\Model;

class SkosModel extends Model
{
    protected $table = 'skos';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama_1',
        'nama_2',
        'surat_penjelas',
        'nomor_surat',
        'pj_id'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
