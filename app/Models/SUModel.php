<?php
namespace App\Models;

use CodeIgniter\Model;

class SuModel extends Model
{
    protected $table = 'su';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'nama_yang_diundang',
        'tempat_yang_diundang',
        'nomor_surat',
        'sifat',
        'lampiran',
        'hari_tanggal',
        'waktu_dari',
        'waktu_ke',
        'tempat_undangan',
        'keperluan',
        'pj_id'
    ];

    protected $useTimestamps = false;
}
