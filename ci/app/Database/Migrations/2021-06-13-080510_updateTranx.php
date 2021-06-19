<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTranx extends Migration
{
    public function up()
    {
        $fields = [
            'amount' => ['type' => 'int', 'constraint' => 11, 'null' => false],
    ];
    $this->forge->addColumn('tranx', $fields);
    }

    public function down()
    {
        
    }
}