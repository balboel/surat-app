<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSKTable extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'pj_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                ],
                'nomor_surat' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true
                ],
                'nama' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'nik' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'tempat_tanggal_lahir' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'kewarnegaraan_agama' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'pekerjaan' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'alamat' => [
                    'type' => 'TEXT',
                ],
                'hari_tanggal_kehilangan' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'barang_yang_hilang' => [
                    'type' => 'TEXT',
                ],
            ]
        );
        $this->forge->addKey(
            'id',
            true
        );
        $this->forge->createTable('sk');
    }

    public function down()
    {
        //
    }
}
