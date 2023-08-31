<?php

namespace App\Models;

use App\Models\Estudiante;
use App\Models\EstudianteCurso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Curso extends Model
{
    use HasFactory;

    public function estudiantes() 
    {
        return $this->belongsToMany(Estudiante::class, 'estudiante_cursos', 'curso_id', 'estudiante_id');
    }
}
