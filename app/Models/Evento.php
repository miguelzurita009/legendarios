<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'eventos'; // nombre de la tabla en plural

    protected $fillable = [
        'fecha',
        'capacidad',
        'estado',
    ];

    // Mutator opcional para forzar que el estado se guarde siempre en minúsculas
    protected function estado(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value),
        );
    }
}
