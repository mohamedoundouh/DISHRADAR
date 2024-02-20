<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Tipos disponibles para los pokemons
        $tipos = ['eléctrico', 'bicho', 'fuego', 'agua', 'planta', 'roca', 'hielo', 'veneno', 'volador'];

        // Generar 15 pokemons
        for ($i = 1; $i <= 15; $i++) {
            DB::table('pokemon')->insert([
                'nombre' => 'Pokemon' . $i,
                'tipo' => $tipos[rand(0, 8)],
                'nivel' => rand(1, 100),
                'descripcion' => 'Descripción del Pokemon' . $i,
                'stock' => rand(0, 50),
                'precio' => rand(10, 100) / 10.0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }
}
}
