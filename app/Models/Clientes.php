<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'direccion', 'nit', 'nrc', 'giro', 'telefono'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

}
