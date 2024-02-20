<?php

namespace App\Http\Controllers\log;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegAuth extends Controller
{
    public function register(Request $request)
    {

        //dd($request);
        // Validar los datos del formulario
        $request->validate([
            'dni' => 'required|string|max:9|unique:users',
            'email' => 'required|email|unique:users',
            'nombre' => 'required|string|max:20|unique:users',
            'nick' => 'required|string|max:20|unique:users',
            'password' => 'required|string',
            'apellidos' => 'required|string|max:30',
            'fecha_nacimiento' => 'required|date',
            'rol' => 'required|in:admin,user',
        ]);

        // Crear el usuario
        User::create($request->all());

        // Redirigir al usuario después de registrarse
        return redirect()->route('verReg')->with('RegSuccess', 'Registrado exitosamente. Por favor, inicia sesión.');
    }

}
