<?php

use App\Http\Controllers\HistoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nivel-educativo', [HistoriaController::class, 'index'])
->name('historia.nivel-educativo');
   // Formulario Preescolar
   Route::get('/preescolar/seccion1', [HistoriaController::class, 'showPreescolarSeccion1'])->name('preescolar.seccion1');
   Route::get('/preescolar/seccion2', [HistoriaController::class, 'showPreescolarSeccion2'])->name('preescolar.seccion2');
   Route::get('/preescolar/seccion3', [HistoriaController::class, 'showPreescolarSeccion3'])->name('preescolar.seccion3');
   // ... continúa según tus secciones
   Route::post('/preescolar/seccion1', [HistoriaController::class, 'guardarSeccion1'])->name('preescolar.seccion1.guardar');

   // Formulario Primaria/Secundaria
Route::get('/primaria-secundaria', [HistoriaController::class, 'showPrimariaSecundaria'])
->name('historia.primaria-secundaria');
