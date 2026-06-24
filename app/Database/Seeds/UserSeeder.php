<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
          $data = array(
            'name'=>'Admin',
            'email'=>'karlosystem@gmail',
            'username'=>'admin',
            'password'=>password_hash('12345678', PASSWORD_BCRYPT),
        );
        $this->db->table('users')->insert($data);
    }
}
