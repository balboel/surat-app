<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSpskckTable extends Migration
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
            'tempat_tanggal_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'status_perkawinan' => [
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
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey(
            'id',
            true
        );
        $this->forge->createTable('spskck');
    }

    public function down()
    {
        //
    }
}
