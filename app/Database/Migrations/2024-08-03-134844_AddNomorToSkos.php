<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNomorToSkos extends Migration
{
    public function up()
    {
        $this->forge->addColumn('skos', [
            'nomor_surat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'after' => 'pj_id',
                'null' => true
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
