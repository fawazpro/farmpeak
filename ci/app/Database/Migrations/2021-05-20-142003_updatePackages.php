<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePackages extends Migration
{
    public function up()
    {
        $fields = [
                    
                    'ROI' => ['type' => 'int', 'constraint' => '11', 'null' => false,]
    ];
    $this->forge->addColumn('packages', $fields);
    }

    public function down()
    {
        
    }
}