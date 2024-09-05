<?php
namespace App\Models;

use CodeIgniter\Model;

class SkuModel extends Model
{
    protected $table = 'sku';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama',
        'tempat_tanggal_lahir',
        'kewarganegaraan_agama',
        'pekerjaan',
        'nik_nkk',
        'alamat',
        'nama_usaha',
        'lokasi_usaha',
        'lama_usaha',
        'nomor_surat',
        'keperluan',
        'pj_id'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
