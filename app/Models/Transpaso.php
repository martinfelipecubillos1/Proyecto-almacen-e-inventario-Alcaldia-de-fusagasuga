<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transpaso extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'movimientorelacionado',
        'responsableanterior',
        'responsablenuevo',
        'actualiza',];
}

