<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titan extends Model
{
    use HasFactory;

    protected $table = 'titanes';

    protected $fillable = [
        'nombre',
        'descripcion',
        'portador',
        'altura',
        'habilidades',
        'tipo',
        'imagen_url'
    ];

    protected $casts = [
        'altura' => 'decimal:2'
    ];
}
