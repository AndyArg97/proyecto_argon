<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Luisa', 'Carlos', 'Laura', 'Diego', 'Sofía', 'Andrés'];
        
        foreach ($nombres as $nombre) {
            $ci = $this->generateCI();
            
            DB::table('estudiantes')->insert([
                'nombre' => $nombre,
                'CI' => $ci,
            ]);
        }
    }

    private function generateCI()
    {
        // Generate a random CI (Cédula de Identidad) number
        return mt_rand(1000000, 9999999);
    }
}
