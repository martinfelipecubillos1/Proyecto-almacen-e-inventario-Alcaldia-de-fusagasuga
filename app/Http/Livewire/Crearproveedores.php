<?php

namespace App\Http\Livewire;

use App\Models\Tipoproveedor;
use Livewire\Component;

class Crearproveedores extends Component
{
    public function render()
    {

$tipoproveedores = Tipoproveedor::all();

        return view('livewire.crearproveedores', compact('tipoproveedores',))
        ->extends('layouts.app')
        ->section('content');
    }
}
