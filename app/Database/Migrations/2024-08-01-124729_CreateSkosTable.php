<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSkosTable extends Migration
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
            'nama_1' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nama_2' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'surat_penjelas' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'pj_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
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
        $this->forge->addKey('id', true);
        $this->forge->createTable('skos');
    }

    public function down()
    {
        //
    }
}
