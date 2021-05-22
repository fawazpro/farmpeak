<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SchemaScratch extends Migration
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
            'unit_stock' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'unit_price' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'duration' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'description' => [
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
        $this->forge->createTable('packages');
    }

    public function down()
    {
        $this->forge->dropTable('packages');
    }
}