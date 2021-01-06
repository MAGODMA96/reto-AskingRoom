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
            'name' => 'NAME USER',
            'email' => 'todo@love.com',
            // 'email_verified_at' => 'true',
            'password' => bcrypt('@2jIt%z3C8PNW%!lG5&')

        ]);
    }
}
