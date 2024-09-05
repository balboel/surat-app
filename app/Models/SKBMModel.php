<?php
namespace App\Models;

use CodeIgniter\Model;

class SkbmModel extends Model
{
    protected $table = 'skbm';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama',
        'tempat_tanggal_lahir',
        'nik',
        'status_perkawinan',
        'alamat',
        'nomor_surat',
        'keperluan',
        'pj_id'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
