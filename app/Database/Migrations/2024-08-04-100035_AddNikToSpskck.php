<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNikToSpskck extends Migration
{
    public function up()
    {
        $this->forge->addColumn('spskck', [
            'nik' => [
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
