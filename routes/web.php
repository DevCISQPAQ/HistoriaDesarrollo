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
Route::get('/preescolar/seccion2', [HistoriaController::class, 'showPreescolarSeccion2'])->name('preescolar.seccion2');
Route::get('/preescolar/seccion3', [HistoriaController::class, 'showPreescolarSeccion3'])->name('preescolar.seccion3');
Route::get('/preescolar/seccion4', [HistoriaController::class, 'showPreescolarSeccion4'])->name('preescolar.seccion4');
Route::get('/preescolar/seccion5', [HistoriaController::class, 'showPreescolarSeccion5'])->name('preescolar.seccion5');
Route::get('/preescolar/seccion6', [HistoriaController::class, 'showPreescolarSeccion6'])->name('preescolar.seccion6');
Route::get('/preescolar/seccion7', [HistoriaController::class, 'showPreescolarSeccion7'])->name('preescolar.seccion7');
Route::get('/preescolar/seccion8', [HistoriaController::class, 'showPreescolarSeccion8'])->name('preescolar.seccion8');
Route::get('/preescolar/seccion9', [HistoriaController::class, 'showPreescolarSeccion9'])->name('preescolar.seccion9');
Route::get('/preescolar/seccion10', [HistoriaController::class, 'showPreescolarSeccion10'])->name('preescolar.seccion10');
Route::get('/preescolar/seccion11', [HistoriaController::class, 'showPreescolarSeccion11'])->name('preescolar.seccion11');
Route::get('/preescolar/seccion12', [HistoriaController::class, 'showPreescolarSeccion12'])->name('preescolar.seccion12');
Route::get('/preescolar/seccion13', [HistoriaController::class, 'showPreescolarSeccion13'])->name('preescolar.seccion13');
Route::get('/preescolar/seccion14', [HistoriaController::class, 'showPreescolarSeccion14'])->name('preescolar.seccion14');

// ... continúa según tus secciones
Route::post('/preescolar/seccion1', [BDController::class, 'guardarSeccion1'])->name('preescolar.seccion1.guardar');
Route::post('/preescolar/seccion2', [BDController::class, 'guardarSeccion2'])->name('preescolar.seccion2.guardar');
Route::post('/preescolar/seccion3', [BDController::class, 'guardarSeccion3'])->name('preescolar.seccion3.guardar');
Route::post('/preescolar/seccion4', [BDController::class, 'guardarSeccion4'])->name('preescolar.seccion4.guardar');
Route::post('/preescolar/seccion5', [BDController::class, 'guardarSeccion5'])->name('preescolar.seccion5.guardar');
Route::post('/preescolar/seccion6', [BDController::class, 'guardarSeccion6'])->name('preescolar.seccion6.guardar');
Route::post('/preescolar/seccion7', [BDController::class, 'guardarSeccion7'])->name('preescolar.seccion7.guardar');
Route::post('/preescolar/seccion8', [BDController::class, 'guardarSeccion8'])->name('preescolar.seccion8.guardar');
Route::post('/preescolar/seccion9', [BDController::class, 'guardarSeccion9'])->name('preescolar.seccion9.guardar');
Route::post('/preescolar/seccion10', [BDController::class, 'guardarSeccion10'])->name('preescolar.seccion10.guardar');
Route::post('/preescolar/seccion11', [BDController::class, 'guardarSeccion11'])->name('preescolar.seccion11.guardar');
Route::post('/preescolar/seccion12', [BDController::class, 'guardarSeccion12'])->name('preescolar.seccion12.guardar');


Route::post('/nivel-educativo', [BDController::class, 'buscar'])->name('historia.nivel-educativo.buscar');

// Formulario Primaria/Secundari1
Route::get('/primaria-secundaria', [HistoriaController::class, 'showPrimariaSecundaria'])->name('primaria.seccion1');
