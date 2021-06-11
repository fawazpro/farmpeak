<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tranx extends Migration
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
            'reference'       => [
                    'type'           => 'TEXT',
                    'null' => false,
            ],
            'user_id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'email' => [
                    'type'           => 'TEXT',
                    'null' => false,
            ],
            'status' => [
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
        $this->forge->createTable('tranx');
    }

    public function down()
    {
        $this->forge->dropTable('tranx');
    }
}