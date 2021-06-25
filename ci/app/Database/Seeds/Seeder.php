<?php namespace App\Database\Seeds;

class Seeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $data = [
                        'name' => 'phone2',
                        'value'    => '',
                        'created_at' => date('c'),
                ];
                $data3 = [
                        'name' => 'phone1',
                        'value'    => '',
                        'created_at' => date('c'),
                ];
                $data2 = [
                        'name' => 'email1',
                        'value'    => '',
                        'created_at' => date('c'),
                ];

                // Using Query Builder
                $this->db->table('variables')->insert($data);
                $this->db->table('variables')->insert($data2);
                $this->db->table('variables')->insert($data3);
        }
}