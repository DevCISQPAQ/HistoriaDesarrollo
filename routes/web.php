<?php

use App\Http\Controllers\HistoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/nivel-educativo', [HistoriaController::class, 'index'])->name('historia.nivel-educativo');
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
   Route::post('/preescolar/seccion1', [HistoriaController::class, 'guardarSeccion1'])->name('preescolar.seccion1.guardar');
   Route::post('/preescolar/seccion2', [HistoriaController::class, 'guardarSeccion2'])->name('preescolar.seccion2.guardar');

   // Formulario Primaria/Secundaria
Route::get('/primaria-secundaria', [HistoriaController::class, 'showPrimariaSecundaria'])->name('historia.primaria-secundaria');
