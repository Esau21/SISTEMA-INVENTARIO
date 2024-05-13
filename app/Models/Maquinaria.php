<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquinaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'fecha_salida',
        'fecha_entrega',
        'hora_salida',
        'hora_entrega',
        'price', 
        'iva',
        'total',
        'year',
        'model',
        'image',
        'clienteId'
    ];
}
