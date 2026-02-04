<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    /** @use HasFactory<\Database\Factories\PagoFactory> */
    use HasFactory;

    protected $fillable = [
        'estado',
        'transaction_amount',
        'payment_id',
    ];

    public function cuotaSocio()
    {
        return $this->hasOne(CuotaSocio::class);
    }
}

