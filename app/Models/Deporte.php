<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deporte extends Model
{
    protected $table = 'deportes';
    /** @use HasFactory<\Database\Factories\DeporteFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'descripcion',
        'cupos',
        'inscriptos',
    ];
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}
