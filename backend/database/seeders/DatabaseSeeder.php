<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('usuarios')->insert([
            [
                "id"=>4,
                'nombre'=>'Nombre 1'
            ],
            [
                "id"=>5,
                'nombre'=>'Nombre 2'
            ],
            [
                "id"=>6,
                'nombre'=>'Nombre 3'
            ],
            [
                "id"=>7,
                'nombre'=>'Nombre 4'
            ]
        ]);
    }
}
