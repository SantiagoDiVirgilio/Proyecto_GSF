<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cancha_id',
        'fecha',
        'hora',
        'estado',
    ];

    protected $casts = [
        'hora' => 'datetime:H:i',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cancha()
    {
        return $this->belongsTo(Cancha::class);
    }
}
