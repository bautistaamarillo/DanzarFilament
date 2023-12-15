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
            'price'=> 2000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'clásico',
            'price'=> 3000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'brasilero',
            'price'=> 2500,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'contemporaneo',
            'price'=> 3000,
            'category_id'=> 2,
        ]);
        DB::table('items')->insert([
            'name'=> 'hip-hop',
            'price'=> 2500,
            'category_id'=> 2,
        ]);

// INSCRIPCIONES 

        DB::table('items')->insert([
            'name'=> 'Inscripción arabe',
            'price'=> 10000,
            'category_id'=> 1,
        ]);
        DB::table('items')->insert([
            'name'=> 'Inscripción clásico',
            'price'=> 5000,
            'category_id'=> 1,
        ]);
        DB::table('items')->insert([
            'name'=> 'Inscripción brasilero',
            'price'=> 7500,
            'category_id'=> 1,
        ]);
        DB::table('items')->insert([
            'name'=> 'Inscripción contemporaneo',
            'price'=> 12000,
            'category_id'=> 1,
        ]);
        DB::table('items')->insert([
            'name'=> 'Inscripción hip-hop',
            'price'=> 4000,
            'category_id'=> 1,
        ]);
        DB::table('items')->insert([
            'name'=> 'Viaje a Neuquen 2024',
            'price'=> 18000,
            'category_id'=> 3,
        ]);
        DB::table('items')->insert([
            'name'=> 'Inscripcion para (Bailemos) Neuquen 2024',
            'price'=> 4700,
            'category_id'=> 3,
        ]);







    }
}
