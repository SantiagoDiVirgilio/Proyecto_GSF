<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $table = 'socios';
    /** @use HasFactory<\Database\Factories\SocioFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cuotas()
    {
        return $this->hasMany(CuotaSocio::class);
    }
}
