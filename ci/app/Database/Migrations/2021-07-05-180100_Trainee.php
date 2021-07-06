<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Trainee extends Migration
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
                'type'           => 'TEXT',
                'null' => false,
            ],
            'lname'       => [
                'type'           => 'TEXT',
                'null' => false,
            ],
            'email'       => [
                'type'           => 'TEXT',
                'null' => false,
            ],
            'phone'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'null' => false,
            ],
            'gender'       => [
                'type'           => 'TEXT',
                'null' => false,
            ],
            'course'       => [
                'type'           => 'TEXT',
                'null' => false,
            ],
            'dob' => [
                'type' => 'date'
            ],
            'address'       => [
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
        $this->forge->createTable('trainee');
    }

    public function down()
    {
        $this->forge->dropTable('trainee');
    }
}
