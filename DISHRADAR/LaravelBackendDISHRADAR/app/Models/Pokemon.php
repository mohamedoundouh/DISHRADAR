<?php

// En tu archivo app/Models/Pokemon.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'pokemon';

    // Atributos que se pueden asignar masivamente (por ejemplo, al crear registros)
    protected $fillable = ['nombre', 'tipo', 'nivel', 'descripcion', 'stock', 'precio'];

    // Atributos que no se deben mostrar en las respuestas JSON
    protected $hidden = ['created_at', 'updated_at'];


}
