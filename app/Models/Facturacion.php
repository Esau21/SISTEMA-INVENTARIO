<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'monto',
        'saldo',
        'estado',
        'tipo_documento',
        'id_producto',
        'id_cliente',
        'iva',
        'fecha_emision',
        'fecha_vencimiento',
        'notas',
        'descuento',
        'subtotal',
        'total_pagado',
    ];
}
