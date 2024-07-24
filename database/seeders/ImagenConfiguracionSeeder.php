<?php

namespace Database\Seeders;

use App\Models\ImagenConfiguracion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenConfiguracionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImagenConfiguracion::create([
            'pantalla' => 'LOGIN',
            'nombre' => 'BG_AUTH',
            'path' => '/auth/bg-auth.jpg',
        ]);
    }
}
