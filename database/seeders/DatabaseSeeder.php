<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Deporte;
use App\Models\Inscripcion;
use App\Models\Cancha;
use App\Models\Reserva;
use Illuminate\Database\Seeder;

use Database\Seeders\UserSeeder;
use Database\Seeders\DeporteSeeder;
use Database\Seeders\InscripcionesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {    
        UserSeeder::run();
        
        $users = User::factory(50)->create();
        $deportes = Deporte::factory(5)->create(); 
        $canchas = Cancha::factory(8)->create();

        Inscripcion::factory(70)->recycle($users)->recycle($deportes)->create(); 
        Reserva::factory(100)->recycle($users)->recycle($canchas)->create();
    }
}
