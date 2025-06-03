<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


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

    private function obtenerPeriodoEscolar()
    {
        $hoy = Carbon::now();
        $anioInicio = $hoy->month >= 9 ? $hoy->year : $hoy->year - 1;

        return [
            'inicio' => Carbon::create($anioInicio, 10, 1)->startOfMonth(),
            'fin' => Carbon::create($anioInicio + 1, 9, 30)->endOfMonth(),
            // 'etiqueta' => 'Septiembre ' . $anioInicio . ' - Septiembre ' . ($anioInicio + 1),
            'etiqueta' => $anioInicio . '-' . ($anioInicio + 1),
        ];
    }

    private function obtenerConteosPorNivel()
    {
        $periodo = $this->obtenerPeriodoEscolar();

        $prescolarCount = Estudiante::where(function ($query) {
            $query->where('grado_escolar', 'LIKE', '%bambolino%')
                ->orWhere('grado_escolar', 'LIKE', '%kinder%');
        })
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
            ->count();

        $primariaCount = Estudiante::where('grado_escolar', 'LIKE', '%primaria%')
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
            ->count();

        $secundariaCount = Estudiante::where('grado_escolar', 'LIKE', '%secundaria%')
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
            ->count();

        $totales_estudiantes = Estudiante::whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])->count();

        return compact('prescolarCount', 'primariaCount', 'secundariaCount', 'totales_estudiantes');
    }

    private function obtenerEstudiantesConHistoria(Request $request)
    {
        $query = Estudiante::with('historiaDesarrollo');

        $periodo = $this->obtenerPeriodoEscolar();

        if ($request->filled('buscar')) {
            $buscar = strtolower($request->buscar);

            // Cuando hay búsqueda, quitamos el filtro por periodo para buscar en toda la tabla
            $query->whereRaw('LOWER(nombre_completo) LIKE ?', ["%{$buscar}%"])
                ->orWhereRaw('LOWER(grado_escolar) LIKE ?', ["%{$buscar}%"]);
        } else {
            // Solo si NO hay búsqueda, filtramos por periodo
            $query->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']]);
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
