<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateInvestment extends Migration
{
    public function up()
    {
        $fields = [
            'payout' => ['type' => 'int', 'constraint' => 11, 'null' => false],
    ];
    $this->forge->addColumn('investments', $fields);
    }

    public function down()
    {
        
    }
}