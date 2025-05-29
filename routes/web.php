<?php

use App\Http\Controllers\UnidadController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AcuerdoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    //UNIDAD
    Route::get('/dashboard', [UnidadController::class, 'index'])->name('dashboard');
    Route::get('/unidad/{unidad}/alumnos', [UnidadController::class, 'mostrarAlumnos'])->name('unidades_alumnos');
    Route::get('/unidades/create', [UnidadController::class, 'create'])->name('unidades_create');
    Route::post('/unidades', [UnidadController::class, 'store'])->name('unidades_store');
    Route::get('/unidades/{unidad}/edit', [UnidadController::class, 'edit'])->name('unidades_edit');
    Route::put('/unidades/{unidad}', [UnidadController::class, 'update'])->name('unidades_update');
    Route::delete('/unidades/{unidad}', [UnidadController::class, 'destroy'])->name('unidades_destroy');

    //PERFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/{user}', [ProfileController::class, 'updatePhoto'])->name('profile.photo');
    Route::delete('/profile/{user}', [ProfileController::class, 'deletePhoto'])->name('profile.photo-delete');

    //ALUMNOS
    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('/unidad/{unidad}/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos_create');
    Route::post('/unidad/{unidad}/alumnos', [AlumnoController::class, 'store'])->name('alumnos_store');
    Route::get('/alumnos/edit/{historicoEmpresaUnidad}', [AlumnoController::class, 'edit'])->name('alumnos_edit');
    Route::put('/alumnos/{historicoEmpresaUnidad}', [AlumnoController::class, 'update'])->name('alumnos_update');
    Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos_destroy');

    //PROFESORES
    Route::get('/profesores', [ProfesorController::class, 'index'])->name('profesores.index');
    Route::get('profesores/create', [ProfesorController::class, 'create'])->name('profesores_create');
    Route::post('profesores', [ProfesorController::class, 'store'])->name('profesores_store');
    Route::get('profesores/{id}/edit', [ProfesorController::class, 'edit'])->name('profesores_edit');
    Route::put('profesores/{id}', [ProfesorController::class, 'update'])->name('profesores_update');
    Route::delete('profesores/{id}', [ProfesorController::class, 'destroy'])->name('profesores_destroy');

    //EMPRESAS
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index');
    Route::get('empresas/create', [EmpresaController::class, 'create'])->name('empresas_create');
    Route::post('empresas', [EmpresaController::class, 'store'])->name('empresas_store');
    Route::get('empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas_edit');
    Route::put('empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas_update');
    Route::delete('empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas_destroy');

    /*ACUERDOS
    Route::get('/acuerdos/crear/{alumno}/{unidad}', [AcuerdoController::class, 'create'])
        ->name('acuerdos_create');
    Route::post('/acuerdos', [AcuerdoController::class, 'store'])
        ->name('acuerdos_store');
    Route::put('/acuerdos/{acuerdo}', [AcuerdoController::class, 'update'])->name('acuerdos_update');*/

    //ACUERDOS
    Route::get('/acuerdos/crear/{historicoId}', [AcuerdoController::class, 'create'])->name('acuerdo_form');
    Route::post('/acuerdos/guardar', [AcuerdoController::class, 'store'])->name('acuerdo_store');
    Route::get('/acuerdos/editar/{acuerdo}', [AcuerdoController::class, 'edit'])->name('acuerdo_edit');
    Route::put('/acuerdos/actualizar/{acuerdo}', [AcuerdoController::class, 'update'])->name('acuerdo_update');
});

require __DIR__ . '/auth.php';
