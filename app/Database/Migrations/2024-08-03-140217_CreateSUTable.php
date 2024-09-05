<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSUTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_yang_diundang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tempat_yang_diundang' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'sifat' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'lampiran' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            "hari_tanggal" => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'waktu_dari' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'waktu_ke' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tempat_undangan' => [
                'type' => 'VARCHAR',
                "constraint" => '255'
            ],
            'keperluan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'pj_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('su');
    }

    public function down()
    {
        //
    }
}
