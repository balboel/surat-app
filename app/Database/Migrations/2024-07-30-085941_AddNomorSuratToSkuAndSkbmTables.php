<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNomorSuratToSkuAndSkbmTables extends Migration
{
    public function up()
    {
        // Add nomor_surat to sku table
        $this->forge->addColumn('sku', [
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'lama_usaha', // adjust this based on the actual column you want to place this after
                'null' => true
            ],
        ]);

        // Add nomor_surat to skbm table
        $this->forge->addColumn('skbm', [
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'alamat', // adjust this based on the actual column you want to place this after
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        // Drop nomor_surat from sku table
        $this->forge->dropColumn('sku', 'nomor_surat');

        // Drop nomor_surat from skbm table
        $this->forge->dropColumn('skbm', 'nomor_surat');
    }
}
