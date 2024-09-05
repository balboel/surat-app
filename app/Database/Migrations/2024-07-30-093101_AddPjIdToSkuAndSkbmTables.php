<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPjIdToSkuAndSkbmTables extends Migration
{
    public function up()
    {
        // Add pj_id to sku table
        $this->forge->addColumn('sku', [
            'pj_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'after' => 'nomor_surat', // adjust this based on the actual column you want to place this after
                'null' => true,
            ],
        ]);

        // Add pj_id to skbm table
        $this->forge->addColumn('skbm', [
            'pj_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'after' => 'nomor_surat', // adjust this based on the actual column you want to place this after
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        // Drop pj_id from sku table
        $this->forge->dropColumn('sku', 'pj_id');

        // Drop pj_id from skbm table
        $this->forge->dropColumn('skbm', 'pj_id');
    }
}
