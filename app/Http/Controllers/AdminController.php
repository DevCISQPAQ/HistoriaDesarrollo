<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Estudiante;
use App\Models\HistoriaDesarrollo;

class AdminController extends Controller
{
    public function dashboard()
    {
        // if (!Auth::check() || !Auth::user()->is_admin) {
        //     abort(403, 'Acceso no autorizado');
        // }

        if (!Auth::check()) {
            abort(403, 'Acceso no autorizado');
        }


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
        })->count();

        $totales_formularios = HistoriaDesarrollo::count();



        $usuarios = Estudiante::count();
        $activosHoy = Estudiante::whereDate('updated_at', now()->toDateString())->count();
        $pendientes = 8; // Aquí podrías usar algún modelo real

        return view('admin.dashboard', compact('terminados', 'no_terminados', 'totales_formularios'));
    }


    public function listarUsuarios()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function crearUsuario()
    {
        return view('admin.usuarios.crear');
    }

    public function guardarUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.usuarios')->with('success', 'Usuario creado correctamente.');
    }

    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        return view('admin.usuarios.editar', compact('usuario'));
    }

    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'is_admin' => 'required|boolean',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.usuarios')->with('success', 'Usuario actualizado.');
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios')->with('success', 'Usuario eliminado.');
    }
    //////
}
