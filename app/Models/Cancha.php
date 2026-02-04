<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancha extends Model
{
    protected $table = 'canchas';
    /** @use HasFactory<\Database\Factories\CanchaFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'precio',
    ];

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
