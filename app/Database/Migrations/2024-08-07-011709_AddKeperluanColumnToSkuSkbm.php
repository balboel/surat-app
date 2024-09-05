<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddKeperluanColumnToSkuSkbm extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sku', [
            'keperluan' => [
                'type' => 'TEXT',
                'after' => 'nomor_surat', // adjust this based on the actual column you want to place this after
                'null' => false,
            ],
        ]);

        // Add pj_id to skbm table
        $this->forge->addColumn('skbm', [
            'keperluan' => [
                'type' => 'TEXT',
                'after' => 'nomor_surat', // adjust this based on the actual column you want to place this after
                'null' => false,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
