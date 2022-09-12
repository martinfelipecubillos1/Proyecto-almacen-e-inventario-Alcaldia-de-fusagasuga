<?php

namespace App\Http\Livewire;

use App\Models\Contrato;
use App\Models\Elemento;
use App\Models\Elementoinventario;
use App\Models\Estado;
use App\Models\Grupoelemento;
use App\Models\Subgrupoelemento;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Crearelementoinv extends Component
{

    public $selectedGrupo, $selectedSubgrupo = null, $selectedElemento = null, $selectedconsumible = null;
    public $Subgrupos=null , $Elementos = null;

    public function render()
    {
        $estados = Estado::all();
        $contratos = Contrato::all();
        $elementoinvs = Elementoinventario::all();

        $respondependencias = DB::table('responsablespordependencias')
        ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
        ->select('responsablespordependencias.*', 'responsables.nombre','responsables.cargo', 'dependencias.nombredependencia')
        ->get();

   //     dd($placaint,$placaext);

        $this->Subgrupos = Subgrupoelemento::where('codigogrupo', $this->selectedGrupo)->get();

        $this->Elementos = Elemento::where('codigosubgrupo', $this->selectedSubgrupo)->get();


        return view('livewire.crearelementoinv', compact('contratos','estados','respondependencias'),[
            'grupos' => Grupoelemento::all()
                ])
        ->extends('layouts.app')
        ->section('content');
    }
}
