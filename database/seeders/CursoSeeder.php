<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($j=1; $j < 9 ; $j++) { 
            $grado = $j . '°';
            DB::table('cursos')->insert([
                'descripcion' => $grado . ' curso',
                'grado' => $grado,
            ]);
        } 
    }
}
