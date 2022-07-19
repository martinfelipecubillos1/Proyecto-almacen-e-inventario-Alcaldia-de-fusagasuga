<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{

    use HasFactory;
    protected $fillable = [
        'id',
        'numero',
        'objetocontractual',
        'proveedor',
        'dependencia',
        'costo',
        'tipodecontrato',
        'tipodinacion',
        'formadepago',
        'lugarentrega',
        'plazoentrega',
        'otrascondiciones',
        'pdf',
        'finalizado',
        'created_at',
    ];
}
