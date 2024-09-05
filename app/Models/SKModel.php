<?php
namespace App\Models;

use CodeIgniter\Model;

class SkModel extends Model
{
    protected $table = 'sk';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama',
        'nik',
        'tempat_tanggal_lahir',
        'kewarnegaraan_agama',
        'pekerjaan',
        'alamat',
        'hari_tanggal_kehilangan',
        'barang_yang_hilang',
        'nomor_surat',
        'pj_id'
    ];

    protected $useTimestamps = false;
}
