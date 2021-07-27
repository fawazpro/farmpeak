<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIO extends Migration
{
    public function up()
    {
        $fields = [
            'io' => ['type' => 'varchar', 'constraint' => 11, 'null' => false],
    ];
    $this->forge->addColumn('packages', $fields);
    }

    public function down()
    {
        
    }
}