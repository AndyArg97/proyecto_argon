<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteCursoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/QuintoGrado', [EstudianteCursoController::class, 'quinto']);
Route::get('/Colegio', [EstudianteCursoController::class, 'colegio']);
Route::get('/top5', [EstudianteCursoController::class, 'top5Estudiantes']);
Route::post('/guardarEstudiante', [EstudianteCursoController::class, 'guardarEstudiante']);
Route::get('/ordenarEstudiantes', [EstudianteCursoController::class, 'ordenarEstudiantes']);
