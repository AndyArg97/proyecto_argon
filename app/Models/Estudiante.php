<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estudiante extends Model
{
    use HasFactory;

    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'estudiante_cursos', 'estudiante_id', 'curso_id');
    }
}
