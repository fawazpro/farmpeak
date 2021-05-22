<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsersToDB extends Migration
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
            'fname'       => [
                    'type'           => 'TINYTEXT',
                    'null'     => false,
            ],
            'lname'       => [
                    'type'           => 'TINYTEXT',
                    'null'     => false,
            ],
            'email'       => [
                    'type'           => 'LONGTEXT',
                    'null'     => false,
            ],
            'phone' => [
                    'type'           => 'VARCHAR',
                    'constraint'     => 15,
            ],
            'password' => [
                    'type'           => 'TEXT',
                    'null'     => false,
            ],
            'packages' => [
                    'type'           => 'TEXT',
                    'null'     => false,
            ],
            'bank' => [
                    'type'           => 'TEXT',
                    'null'     => false,
            ],
            'acc_name' => [
                    'type'           => 'TEXT',
                    'null'     => false,
            ],
            'acc_no' => [
                    'type'           => 'TEXT',
                    'null'     => false,
            ],
            'clearance' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
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
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}