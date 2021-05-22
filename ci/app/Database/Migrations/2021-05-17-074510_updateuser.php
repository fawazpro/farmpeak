<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateUser extends Migration
{
    public function up()
    {
        $fields = [
            'token' => ['type' => 'text', 'null' => false],
            'balance' => ['type' => 'int', 'null' => false],
    ];
    $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        
    }
}