<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contactoproveedor extends Model
{
    use HasFactory;
    protected $fillable = ['id','proveedor', 'nombreempresa', 'numero','direccion','correo','telefono'];
}
