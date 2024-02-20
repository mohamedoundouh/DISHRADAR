<?php

namespace App\Http\Controllers\log;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAuth extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'nick' => 'required|string|max:20',
            'password' => 'required|string',
        ]);

        $credenciales = $request->only('nick', 'password');

        $user = User::where('nick', $credenciales['nick'])->first();
        //dd()
        if ($user && Hash::check($credenciales['password'], $user->password)) {
            // Las credenciales son válidas
            Auth::login($user);
            return redirect()->route('verHome')->with('LogSuccess', 'Logeado correctamente');
        }
        return redirect()->back()->with('LogError', 'Credenciales no válidas. Por favor, inténtalo de nuevo.');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    }
