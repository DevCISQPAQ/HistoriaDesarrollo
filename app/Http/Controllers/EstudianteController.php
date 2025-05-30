<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;


class EstudianteController extends Controller
{
    public function index(Request $request)
    {
        try {

            //throw new \PDOException('Simulando desconexión de base de datos');

            $conteos = $this->obtenerConteosPorNivel();
            $estudiantes = $this->obtenerEstudiantesConHistoria($request);

            return view('admin.estudiantes.index', array_merge($conteos, compact('estudiantes')));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar la página de estudiantes: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {

            $deleted = Estudiante::destroy($id);

            if (!$deleted) {
                return redirect()->back()->with('error', 'No se pudo eliminar el estudiante. El registro no existe.');
            }

            return redirect()->back()->with('success', 'Estudiante eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar al estudiante: ' . $e->getMessage());
        }
    }

    public function verPDF($id)
    {

        try {
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
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al ver el PDF del estudiante: ' . $e->getMessage());
        }
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
