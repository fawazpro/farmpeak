<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdPackage extends Migration
{
    public function up()
    {
        $fields = [
            'packages' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false
            ],
        ];
        $this->forge->modifyColumn('users', $fields);
    }

    public function down()
    {
    }
}
