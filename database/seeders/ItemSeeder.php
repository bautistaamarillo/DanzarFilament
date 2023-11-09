<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            'name'=> 'arabe',
            'amount'=> 2000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'clásico',
            'amount'=> 3000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'brasilero',
            'amount'=> 2500,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'contemporaneo',
            'amount'=> 3000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'hip-hop',
            'amount'=> 2500,
            'category_id'=> 2,
        ]);
    }
}
