<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class varTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'name'       => [
                    'type'           => 'TEXT',
                    'null' => false,
            ],
            'value' => [
                    'type'           => 'TEXT',
                    'null' => false,
            ],
            'created_at' => [
                'type' => 'datetime'
            ],
            'updated_at' => [
                'type' => 'datetime'
            ],
            'deleted_at' => [
                'type' => 'datetime'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('variables');
    }

    public function down()
    {
        $this->forge->dropTable('variables');
    }
}