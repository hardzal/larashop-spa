<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
          'name' => 'John Andi',
          'email' => 'johnandi@gmail.com',
          'password' => bcrypt('12345678'),
          'roles' => json_encode(['CUSTOMER']),
          'status' => 'ACTIVE'
        ], [
            'name' => 'Jono Budi',
            'email' => 'jonobudi@gmail.com',
            'password' => bcrypt('12345678'),
            'roles' => json_encode(['CUSTOMER']),
            'status' => 'INACTIVE'
        ]]);
    }
}

