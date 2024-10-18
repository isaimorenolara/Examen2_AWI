<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    protected $dates = ['fecha_prestamo', 'fecha_devolucion'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
