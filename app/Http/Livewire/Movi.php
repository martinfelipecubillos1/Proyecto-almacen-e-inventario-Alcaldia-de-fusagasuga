<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Elemento;
use App\Models\Elementoinventario;
use App\Models\Estado;
use App\Models\Grupoelemento;
use App\Models\Movimiento;
use App\Models\Movimientoinv;
use App\Models\Proveedor;
use App\Models\Responsable;
use App\Models\responsablespordependencia;
use App\Models\Subgrupoelemento;
use App\Models\User;
use Illuminate\Http\Request;

USE Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
class Movi extends Component
{

    public $selectedGrupo, $selectedSubgrupo = null, $selectedElemento = null, $selectedElementoinv = null;
    public $Subgrupos=null , $Elementos = null, $eleinv = null;

    public function render()
    {

        $respondependencias = DB::table('responsablespordependencias')
        ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        ->where('activo', '=', 'si')
        ->select('responsablespordependencias.*', 'responsables.nombre')
        ->get();

        $elemetarios = DB::table('elementoinventarios')
        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->where('asignado', '=', '')
        ->where('elemento','LIKE','%'.$this->selectedElemento.'%')
        ->select('elementoinventarios.*', 'elementos.nombreelemento','elementos.descripcion as des')
        ->get();


        $responsablespordependencias = responsablespordependencia::all();
        $movimientos = Movimiento::all();
        $users = User::all();
        $responsables = Responsable::all();


        $this->Subgrupos = Subgrupoelemento::where('codigogrupo', $this->selectedGrupo)->get();

        $this->Elementos = Elemento::where('codigosubgrupo', $this->selectedSubgrupo)->get();

        $this->eleinv = Elementoinventario::find($this->selectedElementoinv);

        return view('livewire.movi', compact('elemetarios','respondependencias','responsablespordependencias','movimientos','users','responsables'),[
    'grupos' => Grupoelemento::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }










}
