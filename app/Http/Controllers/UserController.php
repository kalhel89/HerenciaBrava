<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /** Mostrar formulario de creación (solo admin) */
    public function create()
    {
        abort_if(auth()->user()->rol !== 'admin', 403);
        return view('usuarios.create');
    }

    /** Guardar nuevo usuario (solo admin) */
    public function store(Request $request)
    {
        abort_if(auth()->user()->rol !== 'admin', 403);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'rol'      => 'required|in:admin,usuario',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('ok', 'Usuario creado correctamente');
    }
}
