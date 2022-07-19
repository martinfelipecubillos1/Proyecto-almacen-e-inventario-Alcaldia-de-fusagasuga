<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'proveedor', 'dependencia', 'tipodedonacion', 'costo', 'descripcion', 'destino','pdf','finalizado'];

}
