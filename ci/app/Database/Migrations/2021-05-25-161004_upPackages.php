<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpPackages extends Migration
{
    public function up()
    {
        $fields = [
                    
                    'status' => ['type' => 'int', 'constraint' => '11', 'null' => false,]
    ];
    $this->forge->addColumn('packages', $fields);
    }

    public function down()
    {
        
    }
}