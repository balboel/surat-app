<?php
namespace App\Models;

use CodeIgniter\Model;

class SpskckModel extends Model
{
    protected $table = 'spskck';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama',
        'nik',
        'tempat_tanggal_lahir',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'nomor_surat',
        'pj_id',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
