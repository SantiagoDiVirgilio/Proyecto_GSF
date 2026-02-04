<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cancha;

class CanchaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cancha::create([
            'nombre' => 'Cancha 1',
            'descripcion' => 'Cancha de fútbol',
            'precio' => 100,
            'estado' => true,
        ]);
    }
}
