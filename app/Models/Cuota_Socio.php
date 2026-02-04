<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota_Socio extends Model
{
    protected $table = 'cuotas_socios';
    /** @use HasFactory<\Database\Factories\CuotaSocioFactory> */
    use HasFactory;

    protected $fillable = [
        'socio_id',
        'pago_id',
        'mes',
        'anio',
        'estado',
    ];
    
    public function socio()
    {
        return $this->belongsTo(Socio::class);
    }
    public function pago()
    {
        return $this->belongsTo(Pago::class);
    }
}
