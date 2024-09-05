<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PenanggungJawabSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Sunarno',
                'jabatan' => 'Kepala Desa Gemantar'
            ],
            [
                'nama' => 'Ibnu Purwanto',
                'jabatan' => 'Sekretaris Desa Gemantar'
            ]
        ];

        // Using Query Builder
        $this->db->table('penanggung_jawab')->insertBatch($data);
    }
}
