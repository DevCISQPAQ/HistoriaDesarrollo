<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;


class EstudianteController extends Controller
{
    public function index()
    {

        $prescolarCount = Estudiante::where('grado_escolar', 'LIKE', '%bambolino%')
            ->orWhere('grado_escolar', 'LIKE', '%kinder%')
            ->count();

        $primariaCount = Estudiante::where('grado_escolar', 'LIKE', '%primero de primaria%')
            ->orWhere('grado_escolar', 'LIKE', '%segundo de primaria%')
            ->orWhere('grado_escolar', 'LIKE', '%tercero de primaria%')
            ->orWhere('grado_escolar', 'LIKE', '%cuarto de primaria%')
            ->orWhere('grado_escolar', 'LIKE', '%quinto de primaria%')
            ->orWhere('grado_escolar', 'LIKE', '%sexto de primaria%')
            ->count();

        $secundariaCount = Estudiante::where('grado_escolar', 'LIKE', '%primero de secundaria%')
            ->orWhere('grado_escolar', 'LIKE', '%segundo de secundaria%')
            ->orWhere('grado_escolar', 'LIKE', '%tercero de secundaria%')
            ->count();


        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes', 'prescolarCount', 'primariaCount', 'secundariaCount'));
    }


    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect()->back()->with('success', 'Estudiante eliminado correctamente.');
    }

    public function verPDF($id)
    {
        $estudiante = Estudiante::with([
            'seccion2',
            'hermano',
            'seccion3',
            'seccion4',
            'seccion5',
            'seccion6',
            'seccion7',
            'seccion8',
            'seccion9',
            'seccion10',
            'seccion11',
            'seccion12'
        ])->findOrFail($id);


        // $estudiante = Estudiante::findOrFail($id);
        $pdf = Pdf::loadView('admin.estudiantes.pdf', compact('estudiante'));
        return $pdf->stream("alumno_{$estudiante->id}.pdf");
    }
}
