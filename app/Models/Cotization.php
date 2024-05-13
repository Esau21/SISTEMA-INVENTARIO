<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotization extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombrepro',
        'image',
        'fechacotizacion',
        'observaciones',
        'price',
        'manoobra',
        'total_manoobra',
        'iva',
        'total',
        'clienteId',
        'usuarioId'
    ];
}
