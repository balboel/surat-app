<?php
namespace App\Models;

use CodeIgniter\Model;

class SktmModel extends Model
{
    protected $table = 'sktm';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama',
        'nik',
        'jenis_kelamin',
        'tempat_tanggal_lahir',
        'kewarnegaraan_agama',
        'pekerjaan',
        'alamat',
        'keperluan',
        'nomor_surat',
        'pj_id'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
