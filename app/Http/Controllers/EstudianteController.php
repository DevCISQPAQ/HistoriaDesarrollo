<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;


class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        $conteos = $this->obtenerConteosPorNivel();
        $estudiantes = $this->obtenerEstudiantesConHistoria($request);

        return view('admin.estudiantes.index', array_merge($conteos, compact('estudiantes')));
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


    private function obtenerConteosPorNivel()
    {
        $prescolarCount = Estudiante::where('grado_escolar', 'LIKE', '%bambolino%')
            ->orWhere('grado_escolar', 'LIKE', '%kinder%')
            ->count();

        $primariaCount = Estudiante::where('grado_escolar', 'LIKE', '%primaria%')->count();

        $secundariaCount = Estudiante::where('grado_escolar', 'LIKE', '%secundaria%')->count();

        return compact('prescolarCount', 'primariaCount', 'secundariaCount');
    }

    private function obtenerEstudiantesConHistoria(Request $request)
    {
        $query = Estudiante::with('historiaDesarrollo');

        if ($request->filled('buscar')) {
            $buscar = strtolower($request->buscar);
            $query->whereRaw('LOWER(nombre_completo) LIKE ?', ["%{$buscar}%"])
                ->orWhereRaw('LOWER(grado_escolar) LIKE ?', ["%{$buscar}%"]);
        }

        $estudiantes = $query->paginate(10)->withQueryString();

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

        return $estudiantes;
    }
}
