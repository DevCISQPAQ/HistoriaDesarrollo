<?php

use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\BDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HistoriaController::class, 'showWelcome']);

// Rutas para Historia
Route::prefix('formulario')->group(function () {
    Route::get('/nivel_educativo', [HistoriaController::class, 'nivel_selector'])->name('historia.nivel_educativo');
   
    Route::get('/seccion1', [HistoriaController::class, 'showSeccion1'])->name('historia.seccion1');
    Route::get('/seccion2', [HistoriaController::class, 'showSeccion2'])->name('historia.seccion2');
    Route::get('/seccion3', [HistoriaController::class, 'showSeccion3'])->name('historia.seccion3');
    Route::get('/seccion4', [HistoriaController::class, 'showSeccion4'])->name('historia.seccion4');
    Route::get('/seccion5', [HistoriaController::class, 'showSeccion5'])->name('historia.seccion5');
    Route::get('/seccion6', [HistoriaController::class, 'showSeccion6'])->name('historia.seccion6');
    Route::get('/seccion7', [HistoriaController::class, 'showSeccion7'])->name('historia.seccion7');
    Route::get('/seccion8', [HistoriaController::class, 'showSeccion8'])->name('historia.seccion8');
    Route::get('/seccion9', [HistoriaController::class, 'showSeccion9'])->name('historia.seccion9');
    Route::get('/seccion10', [HistoriaController::class, 'showSeccion10'])->name('historia.seccion10');
    Route::get('/seccion11', [HistoriaController::class, 'showSeccion11'])->name('historia.seccion11');
    Route::get('/seccion12', [HistoriaController::class, 'showSeccion12'])->name('historia.seccion12');
    Route::get('/seccion13', [HistoriaController::class, 'showSeccion13'])->name('historia.seccion13');
    Route::get('/seccion14', [HistoriaController::class, 'showSeccion14'])->name('historia.seccion14');

    // Ruta POST para guardar las secciones
    Route::post('/seccion1', [BDController::class, 'guardarSeccion1'])->name('seccion1.guardar');
    Route::post('/seccion2', [BDController::class, 'guardarSeccion2'])->name('seccion2.guardar');
    Route::post('/seccion3', [BDController::class, 'guardarSeccion3'])->name('seccion3.guardar');
    Route::post('/seccion4', [BDController::class, 'guardarSeccion4'])->name('seccion4.guardar');
    Route::post('/seccion5', [BDController::class, 'guardarSeccion5'])->name('seccion5.guardar');
    Route::post('/seccion6', [BDController::class, 'guardarSeccion6'])->name('seccion6.guardar');
    Route::post('/seccion7', [BDController::class, 'guardarSeccion7'])->name('seccion7.guardar');
    Route::post('/seccion8', [BDController::class, 'guardarSeccion8'])->name('seccion8.guardar');
    Route::post('/seccion9', [BDController::class, 'guardarSeccion9'])->name('seccion9.guardar');
    Route::post('/seccion10', [BDController::class, 'guardarSeccion10'])->name('seccion10.guardar');
    Route::post('/seccion11', [BDController::class, 'guardarSeccion11'])->name('seccion11.guardar');
    Route::post('/seccion12', [BDController::class, 'guardarSeccion12'])->name('seccion12.guardar');
    Route::post('/seccion13', [BDController::class, 'guardarSeccion13'])->name('seccion13.guardar');

    // Ruta POST para buscar
    Route::post('/nivel_educativo', [BDController::class, 'buscar'])->name('historia.nivel_educativo.buscar');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/usuarios', [AdminController::class, 'listarUsuarios'])->name('admin.usuarios');
    Route::get('/usuarios/crear', [AdminController::class, 'crearUsuario'])->name('admin.usuarios.crear');
    Route::post('/usuarios', [AdminController::class, 'guardarUsuario'])->name('admin.usuarios.guardar');
    Route::get('/usuarios/{id}/editar', [AdminController::class, 'editarUsuario'])->name('admin.usuarios.editar');
    Route::put('/usuarios/{id}', [AdminController::class, 'actualizarUsuario'])->name('admin.usuarios.actualizar');
    Route::delete('/usuarios/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.usuarios.eliminar');
});

Route::get('/admin/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
Route::delete('/admin/estudiantes/{id}', [EstudianteController::class, 'destroy'])->name('estudiantes.destroy');
Route::get('/admin/estudiantes/{id}/pdf', [EstudianteController::class, 'verPDF'])->name('estudiantes.pdf');
