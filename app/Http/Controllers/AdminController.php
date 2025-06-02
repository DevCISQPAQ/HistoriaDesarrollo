<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        // if (!Auth::check() || !Auth::user()->is_admin) {
        //     abort(403, 'Acceso no autorizado');
        // }
        try {

            //throw new \PDOException('Simulando desconexión de base de datos');

            if (!Auth::check()) {
                abort(403, 'Acceso no autorizado');
            }

            $terminadosData = $this->contarFormulariosTerminados();
            $nivelesData = $this->contarFormulariosPorNivel();
            $conteosPorGrado = $this->obtenerConteosPorGrado();
            $registrosPorMes = $this->obtenerRegistrosPorMes();

            $etiquetasPorGrado = collect(array_keys($conteosPorGrado))
                ->map(fn($key) => ucwords(str_replace('_', ' ', $key)))
                ->toArray();


            $data = array_merge(
                $terminadosData,
                $nivelesData,
                [
                    'conteosPorGrado' => $conteosPorGrado,
                    'etiquetasPorGrado' => $etiquetasPorGrado,
                    'graficaLabels' => $registrosPorMes['labels'],
                    'graficaData' => $registrosPorMes['data'],
                ]
            );

            // // Combinar todos los datos para enviar a la vista4
            // $data = array_merge($terminadosData, $nivelesData, $conteosPorGrado, $etiquetasPorGrado);

            return view('admin.dashboard', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar la página de Dashboard ' . $e->getMessage());
        }
    }

    public function listarUsuarios()
    {
        try {

            $usuarios = User::all();
            return view('admin.usuarios.index', compact('usuarios'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al cargar la página de Usuarios ' . $e->getMessage());
        }
    }

    public function crearUsuario()
    {
        return view('admin.usuarios.crear');
    }

    public function guardarUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users', function ($attribute, $value, $fail) {
                $domain = substr(strrchr($value, "@"), 1);  // Obtener el dominio del correo
                if (!checkdnsrr($domain, 'MX')) {  // Verificar registros MX para el dominio
                    $fail('El dominio del correo electrónico no es válido.');
                }
            }],

            'password' => 'required|min:6',
            'is_admin' => 'required|boolean',
            'yes_notifications' => 'nullable|boolean', // 👉 validación del nuevo campo
        ]);

        try {

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => $request->is_admin,
                'yes_notifications' => $request->yes_notifications ?? false, // 👉 guardar campo
            ]);

            return redirect()->route('admin.usuarios')->with('success', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al guardar usuario ' . $e->getMessage());
        }
    }

    public function editarUsuario($id)
    {
        try {

            $usuario = User::findOrFail($id);
            return view('admin.usuarios.editar', compact('usuario'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al editar usuario ' . $e->getMessage());
        }
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'is_admin' => 'required|boolean',
            'yes_notifications' => 'nullable|boolean', // 👉 validación
        ]);

        try {

            $usuario = User::findOrFail($id);

            $usuario->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'yes_notifications' => $request->yes_notifications ?? false, // 👉 actualización
            ]);

            return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al actualizar usuario ' . $e->getMessage());
        }
    }

    public function eliminarUsuario($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();

            return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar usuario ' . $e->getMessage());
        }
    }
    //////


    private function contarFormulariosTerminados()
    {
        $anioActual = date('Y');

        $terminados = HistoriaDesarrollo::whereNotNull('seccion2_id')
            ->whereNotNull('seccion3_id')
            ->whereNotNull('seccion4_id')
            ->whereNotNull('seccion5_id')
            ->whereNotNull('seccion6_id')
            ->whereNotNull('seccion7_id')
            ->whereNotNull('seccion8_id')
            ->whereNotNull('seccion9_id')
            ->whereNotNull('seccion10_id')
            ->whereNotNull('seccion11_id')
            ->whereNotNull('seccion12_id')
            ->whereNotNull('acepto_terminos')
            ->whereYear('created_at', $anioActual)
            ->count();

        $no_terminados = HistoriaDesarrollo::where(function ($query) {
            $query->whereNull('seccion2_id')
                ->orWhereNull('seccion3_id')
                ->orWhereNull('seccion4_id')
                ->orWhereNull('seccion5_id')
                ->orWhereNull('seccion6_id')
                ->orWhereNull('seccion7_id')
                ->orWhereNull('seccion8_id')
                ->orWhereNull('seccion9_id')
                ->orWhereNull('seccion10_id')
                ->orWhereNull('seccion11_id')
                ->orWhereNull('seccion12_id')
                ->orWhereNull('acepto_terminos');
        })
            ->whereYear('created_at', $anioActual)
            ->count();

        $totales_formularios = HistoriaDesarrollo::whereYear('created_at', $anioActual)->count();

        return compact('terminados', 'no_terminados', 'totales_formularios');
    }

    private function contarFormulariosPorNivel()
    {
        $anioActual = date('Y');

        return [
            'prescolarCount' => Estudiante::where(function ($query) {
                $query->where('grado_escolar', 'LIKE', '%bambolino%')
                    ->orWhere('grado_escolar', 'LIKE', '%kinder%');
            })
                ->whereYear('created_at', $anioActual)
                ->count(),

            'primariaCount' => Estudiante::where('grado_escolar', 'LIKE', '%primaria%')
                ->whereYear('created_at', $anioActual)
                ->count(),

            'secundariaCount' => Estudiante::where('grado_escolar', 'LIKE', '%secundaria%')
                ->whereYear('created_at', $anioActual)
                ->count(),
        ];
    }

    private function obtenerConteosPorGrado()
    {

        $anioActual = date('Y');

        $grados = [
            // Preescolar
            'Bambolino 2',
            'Bambolino 3',
            'Kinder 1',
            'Kinder 2',
            'Kinder 3',

            // Primaria
            'Primero de Primaria',
            'Segundo de Primaria',
            'Tercero de Primaria',
            'Cuarto de Primaria',
            'Quinto de Primaria',
            'Sexto de Primaria',

            // Secundaria
            'Primero de Secundaria',
            'Segundo de Secundaria',
            'Tercero de Secundaria',
        ];

        $conteos = [];

        foreach ($grados as $grado) {
            $conteos[Str::slug($grado, '_')] = Estudiante::where('grado_escolar', 'LIKE', "%{$grado}%")
                ->whereYear('created_at', $anioActual)
                ->count();
        }

        return $conteos;
    }

    private function obtenerRegistrosPorMes()
    {
        $anioActual = date('Y');
        $anioAnterior = $anioActual - 1;

        $fechaInicio = "$anioActual-01-01 00:00:00";
        $fechaFin = "$anioActual-12-31 23:59:59";

        // $fechaInicio = "$anioAnterior-08-01";       // 1 agosto año anterior
        // $fechaFin = "$anioActual-08-31 23:59:59";  // 31 agosto año actual, hasta el final del día

        $resultados = Estudiante::selectRaw("DATE_FORMAT(created_at, '%M %Y') as mes, COUNT(*) as total")
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->groupBy('mes')
            ->orderByRaw("MIN(created_at)")
            ->get();

        return [
            'labels' => $resultados->pluck('mes')->toArray(),
            'data' => $resultados->pluck('total')->toArray(),
        ];
    }
}
