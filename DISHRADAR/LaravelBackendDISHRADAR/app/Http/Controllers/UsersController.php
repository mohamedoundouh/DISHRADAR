<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('Users.users')->with('users', $users);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


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

        return redirect()->route('verUsers')->with('successStore','User creado correctamente');
    }


    public function destroy(Request $request)

    {
      
        $idSolicitado = $request->input('dniSolicitado');

        try {
            $user = User::findOrFail($idSolicitado);

            $user->delete();

            return redirect()->route('verUsers')->with('successDestroy', 'User eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('verUsers')->with('errorDestroy', 'Error al intentar eliminar el Pokémon');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('Users.usersEdit')->with('user', $user);
    }

    public function update(Request $request)

        {
            //dd($request);
            $id = $request->input('dni');
            $user = User::findOrFail($id);
            //dd($user);
            $request->validate([
                'dni' => 'required|string|max:9',
                'email' => 'required|email',
                'nombre' => 'required|string|max:20',
                'nick' => 'required|string|max:20',
                'password' => 'required|string',
                'apellidos' => 'required|string|max:30',
                'rol' => 'required|in:admin,user',

            ]);
            if (Hash::needsRehash($request->input('password'))) {
                // Hashea la contraseña
                $hashedPassword = Hash::make($request->input('password'));
                // Ahora $hashedPassword contiene la contraseña hasheada y se puede almacenar en la base de datos
            } else {
                // La contraseña ya está hasheada según la configuración actual, no es necesario hacer nada
                $hashedPassword = $request->input('password');
            }
            $user->update([
                'dni' => $request->input('dni'),
                'email' => $request->input('email'),
                'nombre' => $request->input('nombre'),
                'nick' => $request->input('nick'),
                'password' => $hashedPassword, // Utiliza la contraseña hasheada
                'apellidos' => $request->input('apellidos'),
                'rol' => $request->input('rol'),
            ]);
            //dd($user);
            return redirect()->route('verUsers')->with('successUpdate', 'User actualizado correctamente');
        }}
