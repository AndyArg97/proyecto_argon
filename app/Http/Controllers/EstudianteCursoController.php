<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Models\EstudianteCurso;

class EstudianteCursoController extends Controller
{
    public function quinto()
    {
        $curso = Curso::find(5);

        if (!$curso) {
            return response()->json(['message' => 'Curso no existe'], 404);
        }

        $estudiantes = $curso->estudiantes;
        return response()->json(['estudiantes' => $estudiantes]);
    }

    public function colegio(Request $request)

    {
        $estudiantes = Estudiante::with('cursos')->get();
        return response()->json(['estudiantes' => $estudiantes]);
    }

    public function top5Estudiantes()
    {
        $curso = Curso::find(6);
        if (!$curso) 
        {
            return response()->json(['message' => 'Curso no existe'], 404);
        }
        $estudiantes = $curso->estudiantes->take(5);
        // return response()->json(['estudiantes' => $estudiantes]);
        return view('pages.dashboard',['estudiantes' => $estudiantes]);
    }

    public function guardarEstudiante(Request $request)
    {
        $ci = $this->generateCI();
        $estudianteNuevo = new Estudiante();
        $estudianteNuevo->nombre = $request->input('nombre');
        $estudianteNuevo->CI = $ci;
        $estudianteNuevo->save();

        $estudiante = Estudiante::findOrFail($estudianteNuevo->id);
        $curso = Curso::findOrFail($request->input('curso_id'));

        if ($curso->estudiantes->contains($estudiante)) {
            return response()->json(['message' => 'El estudiante ya está asignado a este curso.'], 400);
        }

        $curso->estudiantes()->attach($estudiante); 
        
        //return Response()->json(['message' => 'Estudiante insertado exitosamente', 'data' => $estudiante], 201);
        return redirect()->route('home');

    }
    private function generateCI()
    {
        // Generate a random CI (Cédula de Identidad) number
        return mt_rand(1000000, 9999999);
    }

    public function ordenarEstudiantes() {
        $estudianteOrden = Estudiante::orderBy('CI','desc')
        ->get();
        // return Response()->json(['estudiantes' => $estudianteOrden]);
        return view('pages.dashboard',['estudiantes' => $estudianteOrden]);
        
    }

    public function consultas() {
        $curso = Curso::find(6);
        if (!$curso) 
        {
            return response()->json(['message' => 'Curso no existe'], 404);
        }
    
        $top5Estudiantes = $curso->estudiantes->take(5);
        $estudianteOrden = Estudiante::orderBy('CI','desc')
        ->get();
        $cursos = Curso::all();
        // return Response()->json(['estudiantes' => $estudianteOrden]);
        return view('pages.dashboard', [
            'curso' => $curso,
            'top5Estudiantes' => $top5Estudiantes,
            'estudianteOrden' => $estudianteOrden,
            'cursos' => $cursos,
        ]);
    }
}
