<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('admins')->insert([
            'name' => 'Mr.Admin',
            'email' => 'admin@gmail.com',
            'password' => MD5('258147'),
        ]);
    }
}
