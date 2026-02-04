<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    protected $table = 'contacto_mensajes';
    /** @use HasFactory<\Database\Factories\MensajeFactory> */
    use HasFactory;

     protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
    ];
}
