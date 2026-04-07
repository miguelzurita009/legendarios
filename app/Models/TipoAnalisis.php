<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class TipoAnalisis extends Model
{
    use HasFactory;

    protected $table = 'tipo_analisis';

    protected $fillable = [
        'nombre',
    ];

    protected function nombre(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => strtoupper($value),
        );
    }
}
