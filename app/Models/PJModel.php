<?php
namespace App\Models;

use CodeIgniter\Model;

class PjModel extends Model
{
    protected $table = 'penanggung_jawab';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama', 'jabatan'];

    protected $useTimestamps = false;
}
