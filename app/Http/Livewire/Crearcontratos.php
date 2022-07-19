<?php

namespace App\Http\Livewire;

use App\Models\Contrato;
use App\Models\Dependencia;
use App\Models\Proveedor;
use App\Models\Tipocontrato;
use App\Models\Tipodonacion;
use Livewire\Component;

class Crearcontratos extends Component
{

    public $selectedOption = null, $selectedSubgrupo = null, $selectedElemento = null;
    public $Contratos=null , $Donaciones = null;

    public function render()
    {
        $provedores = Proveedor::all();
        $dependencias = Dependencia::all();

if($this->selectedOption == 0){
    $this->selectedOption = null;
    }elseif ($this->selectedOption == 1){
        $this->Contratos = Tipocontrato::all();
        $this->Donaciones = null;
    }elseif ($this->selectedOption == 2){
        $this->Donaciones = Tipodonacion::all();
        $this->Contratos = null;}

        return view('livewire.crearcontratos',compact('provedores','dependencias'))
        ->extends('layouts.app')
        ->section('content');
    }
}
