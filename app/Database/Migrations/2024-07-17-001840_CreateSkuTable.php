<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSkuTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempat_tanggal_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'kewarganegaraan_agama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nik_nkk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'nama_usaha' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'lokasi_usaha' => [
                'type' => 'TEXT',
            ],
            'lama_usaha' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('sku');
    }

    public function down()
    {
        $this->forge->dropTable('sku');
    }

}
