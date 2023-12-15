<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=> 'admin',
            'email'=> 'admin@user.com',
            'password'=> '$2y$12$wlUakybnPQkcoYuX32QtrO91pMRDcxzy.xUCliSv6oaa5RVGtMI7u', //password
        ]);
    }
}
