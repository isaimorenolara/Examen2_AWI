<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //
    protected $fillable = [
        'titulo',
        'autor',
        'cantidad_disponible',
        'bibliotecario_id',
    ];
}
