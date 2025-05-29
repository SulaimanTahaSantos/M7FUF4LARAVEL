<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LenguajesDeProgramacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'creador',
        'fecha_lanzamiento',
        'tipo',
    ];
}
