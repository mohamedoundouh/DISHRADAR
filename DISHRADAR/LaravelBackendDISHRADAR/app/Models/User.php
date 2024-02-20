<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'dni';

    protected $fillable = [
        'dni', 'nick', 'nombre', 'apellidos', 'email', 'password', 'fecha_nacimiento', 'rol',
    ];

    protected $hidden = [
         'remember_token',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        // Escuchar el evento creating
        static::creating(function ($user) {
            // Cifrar la contraseña antes de crear el usuario
            $user->password = Hash::make($user->password);
        });
    }
}
