<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Investment extends Migration
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
            'user_id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'packages_id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
            ],
            'tranx_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'payment_status' => [
                    'type'           => 'TEXT',
                    'null' => false,
            ],
            'unit_bought' => [
                    'type'           => 'INT',
                    'constraint' => 11,
            ],
            'date' => [
                    'type'           => 'datetime',
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
        // $this->forge->addUniqueKey(['user_id', '']);
        // $this->forge->addUniqueKey(['tranx_id', '']);
        // $this->forge->addUniqueKey(['packages_id', '']);
        // $this->forge->addUniqueKey(['payment_status', '']);

        // $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        // $this->forge->addForeignKey('tranx_id','tranx','id','CASCADE','CASCADE');
        // $this->forge->addForeignKey('packages_id','packages','id','CASCADE','CASCADE');
        // $this->forge->addForeignKey('payment_status','tranx','status','CASCADE','CASCADE');
        $this->forge->createTable('investments');
    }

    public function down()
    {
        $this->forge->dropTable('investments');
    }
}