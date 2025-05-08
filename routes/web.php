<?php

use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\BDController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   return view('welcome');
});

Route::get('/nivel-educativo', [HistoriaController::class, 'nivel_selector'])->name('historia.nivel-educativo');
// Formulario Preescolar
Route::get('/preescolar/seccion1', [HistoriaController::class, 'showPreescolarSeccion1'])->name('preescolar.seccion1');
Route::get('/historia_desarrollo/seccion2', [HistoriaController::class, 'showSeccion2'])->name('historia.seccion2');
Route::get('/historia_desarrollo/seccion3', [HistoriaController::class, 'showSeccion3'])->name('historia.seccion3');
Route::get('/historia_desarrollo/seccion4', [HistoriaController::class, 'showSeccion4'])->name('historia.seccion4');
Route::get('/historia_desarrollo/seccion5', [HistoriaController::class, 'showSeccion5'])->name('historia.seccion5');
Route::get('/historia_desarrollo/seccion6', [HistoriaController::class, 'showSeccion6'])->name('historia.seccion6');
Route::get('/historia_desarrollo/seccion7', [HistoriaController::class, 'showSeccion7'])->name('historia.seccion7');
Route::get('/historia_desarrollo/seccion8', [HistoriaController::class, 'showSeccion8'])->name('historia.seccion8');
Route::get('/historia_desarrollo/seccion9', [HistoriaController::class, 'showSeccion9'])->name('historia.seccion9');
Route::get('/historia_desarrollo/seccion10', [HistoriaController::class, 'showSeccion10'])->name('historia.seccion10');
Route::get('/historia_desarrollo/seccion11', [HistoriaController::class, 'showSeccion11'])->name('historia.seccion11');
Route::get('/historia_desarrollo/seccion12', [HistoriaController::class, 'showSeccion12'])->name('historia.seccion12');
Route::get('/historia_desarrollo/seccion13', [HistoriaController::class, 'showSeccion13'])->name('historia.seccion13');
// Route::get('/preescolar/seccion14', [HistoriaController::class, 'showPreescolarSeccion14'])->name('preescolar.seccion14');//no entiendo porque se necesita este

// ... continúa según tus secciones
Route::post('/preescolar/seccion1', [BDController::class, 'guardarSeccion1'])->name('seccion1.guardar');
Route::post('/preescolar/seccion2', [BDController::class, 'guardarSeccion2'])->name('seccion2.guardar');
Route::post('/preescolar/seccion3', [BDController::class, 'guardarSeccion3'])->name('seccion3.guardar');
Route::post('/preescolar/seccion4', [BDController::class, 'guardarSeccion4'])->name('seccion4.guardar');
Route::post('/preescolar/seccion5', [BDController::class, 'guardarSeccion5'])->name('seccion5.guardar');
Route::post('/preescolar/seccion6', [BDController::class, 'guardarSeccion6'])->name('seccion6.guardar');
Route::post('/preescolar/seccion7', [BDController::class, 'guardarSeccion7'])->name('seccion7.guardar');
Route::post('/preescolar/seccion8', [BDController::class, 'guardarSeccion8'])->name('seccion8.guardar');
Route::post('/preescolar/seccion9', [BDController::class, 'guardarSeccion9'])->name('seccion9.guardar');
Route::post('/preescolar/seccion10', [BDController::class, 'guardarSeccion10'])->name('seccion10.guardar');
Route::post('/preescolar/seccion11', [BDController::class, 'guardarSeccion11'])->name('seccion11.guardar');
Route::post('/preescolar/seccion12', [BDController::class, 'guardarSeccion12'])->name('seccion12.guardar');
Route::post('/preescolar/seccion13', [BDController::class, 'guardarSeccion13'])->name('seccion13.guardar');


Route::post('/nivel-educativo', [BDController::class, 'buscar'])->name('historia.nivel-educativo.buscar');

// Formulario Primaria/Secundari1
Route::get('/primaria_secundaria/seccion1', [HistoriaController::class, 'showPrimariaSecundariaSeccion1'])->name('primaria_secundaria.seccion1');
