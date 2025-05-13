<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;


class EstudianteController extends Controller
{
    public function index(Request $request)
{
    $prescolarCount = Estudiante::where('grado_escolar', 'LIKE', '%bambolino%')
        ->orWhere('grado_escolar', 'LIKE', '%kinder%')
        ->count();

    $primariaCount = Estudiante::where('grado_escolar', 'LIKE', '%primaria%')->count();
    $secundariaCount = Estudiante::where('grado_escolar', 'LIKE', '%secundaria%')->count();

    // Iniciamos la consulta
    $query = Estudiante::with('historiaDesarrollo');

    // Si hay un término de búsqueda, filtramos
    if ($request->filled('buscar')) {
        $buscar = strtolower($request->buscar);
        $query->whereRaw('LOWER(nombre_completo) LIKE ?', ["%{$buscar}%"])
            ->orWhereRaw('LOWER(grado_escolar) LIKE ?', ["%{$buscar}%"]);
    }

    // Realizamos la paginación
    $estudiantes = $query->paginate(10)->withQueryString();

    // Para cada estudiante, verificamos si el historial de desarrollo está completo
    foreach ($estudiantes as $estudiante) {
        $historia = $estudiante->historiaDesarrollo;

        if (!$historia) {
            $estudiante->historia_completa = 'Incompleto';
            continue;
        }

        $completo = collect($historia->getAttributes())
            ->except(['id', 'estudiante_id', 'created_at', 'updated_at'])
            ->every(fn($valor) => !is_null($valor) && $valor !== '');

        $estudiante->historia_completa = $completo ? 'Completo' : 'Incompleto';
    }
    
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
        return $pdf->stream("alumno_{$estudiante->nombre_completo}.pdf");
    }
}
