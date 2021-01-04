<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Desarrollador',
            'email' => 'todo@love.com',
            // 'email_verified_at' => 'true',
            'password' => bcrypt('12345678')

        ]);
    }
}
