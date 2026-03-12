<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudiante;
use App\Models\Seccion2;
use App\Models\HistoriaDesarrollo;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        try {

            if (!Auth::check()) {
                abort(403, 'Acceso no autorizado');
            }

            $user = Auth::user();

            if (!$user->is_admin) {
                return redirect()->route('estudiantes.index');
            }

            $terminadosData = $this->contarFormulariosTerminados();
            $nivelesData = $this->contarFormulariosPorNivel();
            $conteosPorGrado = $this->obtenerConteosPorGrado();
            $registrosPorMes = $this->obtenerRegistrosPorMes();
            // $egresados = $this->obtenerEgresadosPorColegio();
            $egresadosPorColegio = $this->obtenerEgresadosPorColegioUnificado();

            $etiquetasPorGrado = collect(array_keys($conteosPorGrado))
                ->map(fn($key) => ucwords(str_replace('_', ' ', $key)))
                ->toArray();

            $periodo = $this->obtenerPeriodoEscolar();

            $data = array_merge(
                $terminadosData,
                $nivelesData,
                [
                    'conteosPorGrado' => $conteosPorGrado,
                    'etiquetasPorGrado' => $etiquetasPorGrado,
                    'graficaLabels' => $registrosPorMes['labels'],
                    'graficaData' => $registrosPorMes['data'],
                    'periodoEtiqueta' => $periodo['etiqueta'],
                    // 'egresadosLabels' => $egresados['labels'],
                    // 'egresadosData' => $egresados['data'],
                    'totalEgresados' => $egresadosPorColegio['total'],
                    'egresadosLabels' => $egresadosPorColegio['labels'],
                    'egresadosData' => $egresadosPorColegio['data'],
                ]
            );

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
            'password' => 'nullable|min:6', // 👉 ahora es opcional
            'is_admin' => 'required|boolean',
            'yes_notifications' => 'nullable|boolean', // 👉 validación
        ]);

        try {

            $usuario = User::findOrFail($id);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->is_admin,
                'yes_notifications' => $request->yes_notifications ?? false,
            ];


            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $usuario->update($data);

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

    private function contarFormulariosTerminados()
    {
        $periodo = $this->obtenerPeriodoEscolar();


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
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
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
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
            ->count();

        $totales_formularios = HistoriaDesarrollo::whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])->count();

        return compact('terminados', 'no_terminados', 'totales_formularios') + ['periodo' => $periodo['etiqueta']];
    }


    private function contarFormulariosPorNivel()
    {
        $periodo = $this->obtenerPeriodoEscolar();

        return [
            'prescolarCount' => Estudiante::where(function ($query) {
                $query->where('grado_escolar', 'LIKE', '%bambolino%')
                    ->orWhere('grado_escolar', 'LIKE', '%kinder%');
            })
                ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
                ->count(),

            'primariaCount' => Estudiante::where('grado_escolar', 'LIKE', '%primaria%')
                ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
                ->count(),

            'secundariaCount' => Estudiante::where('grado_escolar', 'LIKE', '%secundaria%')
                ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
                ->count(),

            'periodo' => $periodo['etiqueta'],
        ];
    }


    private function obtenerConteosPorGrado()
    {
        $periodo = $this->obtenerPeriodoEscolar();

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
                ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
                ->count();
        }

        return $conteos;
    }

    private function obtenerRegistrosPorMes()
    {
        $periodo = $this->obtenerPeriodoEscolar();

        $resultados = Estudiante::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as mes, COUNT(*) as total")
            ->whereBetween('created_at', [$periodo['inicio'], $periodo['fin']])
            ->groupBy('mes')
            ->orderBy('mes')
            ->pluck('total', 'mes');

        $labels = [];
        $data = [];
        $fecha = $periodo['inicio']->copy();

        while ($fecha <= $periodo['fin']) {
            $claveMes = $fecha->format('Y-m');
            $labels[] = $fecha->translatedFormat('F Y');
            $data[] = $resultados[$claveMes] ?? 0;
            $fecha->addMonth();
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'periodo' => $periodo['etiqueta'],
        ];
    }


    private function obtenerEgresadosPorColegio1()
    {
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->selectRaw('cualcolegio_padre as colegio, COUNT(*) as total')
            ->groupBy('cualcolegio_padre')
            ->pluck('total', 'colegio');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->selectRaw('cualcolegio_madre as colegio, COUNT(*) as total')
            ->groupBy('cualcolegio_madre')
            ->pluck('total', 'colegio');

        $resultado = $padres->mergeRecursive($madres)->map(function ($item) {
            return is_array($item) ? array_sum($item) : $item;
        });

        return [
            'labels' => $resultado->keys(),
            'data' => $resultado->values(),
            'total' => $resultado->sum()
        ];
    }

    private function obtenerEgresadosPorColegio2()
    {
        // 1️⃣ Traemos todos los registros de padres y madres egresados con sus colegios
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->pluck('cualcolegio_padre');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->pluck('cualcolegio_madre');

        $todos = $padres->merge($madres)->map(function ($nombre) {
            // 2️⃣ Normalizamos el texto: minúsculas, quitar palabras genéricas y tildes
            $nombre = strtolower($nombre);
            $nombre = str_replace(['instituto', 'colegio', 'escuela', 'academia'], '', $nombre);
            $nombre = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre); // quita tildes
            $nombre = preg_replace('/[^a-z0-9 ]/', '', $nombre); // quitar caracteres extra
            $nombre = trim($nombre);
            return $nombre;
        })->toArray();

        // 3️⃣ Agrupamos nombres similares usando similar_text
        $grupos = [];
        foreach ($todos as $colegio) {
            $found = false;
            foreach ($grupos as $key => $grupo) {
                similar_text($colegio, $key, $percent);
                if ($percent > 80) { // si es más del 80% similar
                    $grupos[$key][] = $colegio;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $grupos[$colegio] = [$colegio];
            }
        }

        // 4️⃣ Contamos totales por grupo
        $resultado = [];
        foreach ($grupos as $key => $valores) {
            $resultado[$key] = count($valores);
        }

        return [
            'labels' => array_map('ucwords', array_keys($resultado)),
            'data' => array_values($resultado),
            'total' => array_sum($resultado)
        ];
    }

    private function obtenerEgresadosPorColegio3()
    {
        // Traemos todos los registros de padres y madres egresados
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->pluck('cualcolegio_padre');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->pluck('cualcolegio_madre');

        $todos = $padres->merge($madres)->map(function ($nombre) {
            // Normalización básica
            $nombre = strtolower($nombre);
            $nombre = str_replace(['instituto', 'colegio', 'escuela', 'academia'], '', $nombre);
            $nombre = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre); // quita tildes
            $nombre = preg_replace('/[^a-z0-9 ]/', '', $nombre); // quitar caracteres extra
            $nombre = trim($nombre);
            return $nombre;
        })->toArray();

        // Agrupamos usando Levenshtein
        $grupos = [];
        foreach ($todos as $colegio) {
            $found = false;
            foreach ($grupos as $key => $valores) {
                $longitud = max(strlen($colegio), strlen($key));
                if (levenshtein($colegio, $key) <= max(1, $longitud * 0.2)) {
                    $grupos[$key][] = $colegio;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $grupos[$colegio] = [$colegio];
            }
        }

        // Contamos totales por grupo
        $resultado = [];
        foreach ($grupos as $key => $valores) {
            $resultado[$key] = count($valores);
        }

        return [
            'labels' => array_map('ucwords', array_keys($resultado)),
            'data' => array_values($resultado),
            'total' => array_sum($resultado)
        ];
    }

    private function obtenerEgresadosPorColegio4()
    {
        // 1️⃣ Traemos todos los colegios de padres y madres egresados
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->pluck('cualcolegio_padre');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->pluck('cualcolegio_madre');

        $todos = $padres->merge($madres)->map(function ($nombre) {
            // Normalización básica
            $nombre = trim(strtolower($nombre));
            $nombre = str_replace(['instituto', 'colegio', 'escuela', 'academia'], '', $nombre);
            $nombre = iconv('UTF-8', 'ASCII//TRANSLIT', $nombre); // quita tildes
            $nombre = preg_replace('/[^a-z0-9 ]/', '', $nombre); // quitar caracteres extra
            $nombre = trim($nombre);
            return $nombre;
        })->toArray();

        // 2️⃣ Agrupamos nombres similares usando Levenshtein
        $grupos = [];
        foreach ($todos as $colegio) {
            $found = false;

            foreach ($grupos as $key => $valores) {
                $longitud = max(strlen($colegio), strlen($key));

                if (levenshtein($colegio, $key) <= max(1, $longitud * 0.2)) {
                    $grupos[$key][] = $colegio;

                    // Elegimos la etiqueta más larga como “correcta”
                    if (strlen($colegio) > strlen($key)) {
                        $grupos[$colegio] = $grupos[$key];
                        unset($grupos[$key]);
                    }

                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $grupos[$colegio] = [$colegio];
            }
        }

        // 3️⃣ Contamos totales por grupo
        $resultado = [];
        foreach ($grupos as $key => $valores) {
            $resultado[$key] = count($valores);
        }

        // 4️⃣ Convertimos a formato amigable para Chart.js
        return [
            'labels' => array_map('ucwords', array_keys($resultado)), // nombres correctos
            'data' => array_values($resultado), // totales
            'total' => array_sum($resultado)
        ];
    }

    private function obtenerEgresadosPorColegio5()
    {
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->pluck('cualcolegio_padre');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->pluck('cualcolegio_madre');

        // Guardamos array de [original, normalizado]
        $todos = $padres->merge($madres)->map(function ($nombre) {
            $nombreOriginal = trim($nombre);
            $normalizado = strtolower($nombreOriginal);
            $normalizado = str_replace(['instituto', 'colegio', 'escuela', 'academia'], '', $normalizado);
            $normalizado = iconv('UTF-8', 'ASCII//TRANSLIT', $normalizado);
            $normalizado = preg_replace('/[^a-z0-9 ]/', '', $normalizado);
            $normalizado = trim($normalizado);
            return ['original' => $nombreOriginal, 'normalizado' => $normalizado];
        })->toArray();

        // Agrupar por similitud usando versión normalizada
        $grupos = [];
        foreach ($todos as $item) {
            $colegio = $item['normalizado'];
            $original = $item['original'];
            $found = false;

            foreach ($grupos as $key => $valores) {
                $longitud = max(strlen($colegio), strlen($key));
                if (levenshtein($colegio, $key) <= max(1, $longitud * 0.2)) {
                    $grupos[$key][] = $original; // guardamos el nombre original
                    $found = true;
                    break;
                }
            }

            if (!$found) {
                $grupos[$colegio] = [$original]; // iniciamos grupo con el original
            }
        }

        // Etiqueta final: usamos el nombre más frecuente original en cada grupo
        $resultado = [];
        foreach ($grupos as $valores) {
            $conteo = array_count_values($valores);
            $etiquetaCorrecta = array_search(max($conteo), $conteo);
            $resultado[$etiquetaCorrecta] = count($valores);
        }

        return [
            'labels' => array_keys($resultado), // nombres correctos con acentos
            'data' => array_values($resultado),
            'total' => array_sum($resultado)
        ];
    }

    private function obtenerEgresadosPorColegioUnificado()
    {
        $padres = Seccion2::where('egresadored_padre', 'si')
            ->whereNotNull('cualcolegio_padre')
            ->pluck('cualcolegio_padre');

        $madres = Seccion2::where('egresadored_madre', 'si')
            ->whereNotNull('cualcolegio_madre')
            ->pluck('cualcolegio_madre');

        $todos = $padres->merge($madres)->map(function ($nombre) {

            $original = trim($nombre);

            $texto = strtolower($original);
            $texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
            $texto = preg_replace('/[^a-z0-9 ]/', '', $texto);

            return [
                'original' => $original,
                'texto' => $texto
            ];
        });

        $grupos = [];

        foreach ($todos as $item) {

            $texto = $item['texto'];
            $original = $item['original'];

            $label = null;

            // 🔹 ANAHUAC
            if (str_contains($texto, 'anahuac')) {

                if (str_contains($texto, 'qro') || str_contains($texto, 'queretaro')) {
                    $label = 'Anáhuac Querétaro';
                } elseif (str_contains($texto, 'cdmx') || str_contains($texto, 'mx') || str_contains($texto, 'mexico')) {
                    $label = 'Anáhuac CDMX';
                } else {
                    $label = 'Anáhuac';
                }
            }

            // 🔹 CUMBRES o ALPES
            elseif (str_contains($texto, 'cumbres') || str_contains($texto, 'alpes')) {

                if (str_contains($texto, 'qro') || str_contains($texto, 'queretaro')) {
                    // 👉 ambos se unifican
                    $label = 'Cumbres / Alpes Querétaro';
                } elseif (str_contains($texto, 'cdmx') || str_contains($texto, 'mx') || str_contains($texto, 'mexico')) {

                    if (str_contains($texto, 'cumbres')) {
                        $label = 'Cumbres CDMX';
                    } else {
                        $label = 'Alpes CDMX';
                    }
                } else {

                    if (str_contains($texto, 'cumbres')) {
                        $label = 'Cumbres';
                    } else {
                        $label = 'Alpes';
                    }
                }
            }

            // 🔹 otros colegios
            else {
                $label = $original;
            }

            $grupos[$label][] = $original;
        }

        $resultado = [];

        foreach ($grupos as $label => $valores) {
            $resultado[$label] = count($valores);
        }

        return [
            'labels' => array_keys($resultado),
            'data' => array_values($resultado),
            'total' => array_sum($resultado)
        ];
    }
}
