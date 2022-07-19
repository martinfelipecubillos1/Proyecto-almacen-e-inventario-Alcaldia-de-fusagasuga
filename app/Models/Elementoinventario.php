<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementoinventario extends Model
{
    use HasFactory;

    protected $fillable = ['id',
    'elemento',
    'placainterna','placaexterna','serial','preciounitario','cantidad','cantidadtotal','preciototal','contrato','asignado','consumible','estado','baja'];

}

