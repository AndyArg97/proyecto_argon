<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $curso = Curso::find(6);
        if (!$curso) 
        {
            return response()->json(['message' => 'Curso no existe'], 404);
        }
        $estudiantes = $curso->estudiantes->take(5);
        return view('pages.dashboard', ['estudiantes' => $estudiantes]);
    }
}
