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

    public $selectedGrupo, $selectedSubgrupo = null, $selectedElemento = null, $selectedElementoinv = null,$selectedresponsable = null;
    public $Subgrupos=null , $Elementos = null, $eleinv = null;

    public function render()
    {

        $respondependencias = DB::table('responsablespordependencias')
        ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
        ->select('responsablespordependencias.*', 'responsables.nombre','dependencias.nombredependencia')
        ->get();

        $responsablespordependencias = responsablespordependencia::all();
        $movimientos = Movimiento::all();
        $users = User::all();
        $responsables = Responsable::all();


        $this->Subgrupos = Subgrupoelemento::where('codigogrupo', $this->selectedGrupo)->get();

        $this->Elementos = Elemento::where('codigosubgrupo', $this->selectedSubgrupo)->get();

        $this->eleinv = Elementoinventario::find($this->selectedElementoinv);

        $elemetarios = DB::table('elementoinventarios')
        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->join('contratos', 'contratos.id', '=', 'elementoinventarios.contrato')
        ->join('estados', 'estados.id', '=', 'elementoinventarios.estado')
        ->join('responsables', 'responsables.id', '=', 'elementoinventarios.responsable')
        ->join('subgrupoelementos', 'subgrupoelementos.id', '=', 'elementos.codigosubgrupo')
        ->where('consumible', '=', false)
        ->where('elementoinventarios.elemento','LIKE','%'.$this->selectedElemento.'%')
        ->select('elementoinventarios.*', 'elementos.nombreelemento','elementos.descripcion as des', 'estados.nombreestado', 'contratos.numero', 'contratos.objetocontractual','responsables.nombre')
        ->where('elementoinventarios.responsable','LIKE','%'.$this->selectedresponsable.'%')
        ->get();


        $estados = Estado::all();

        return view('livewire.movi', compact('elemetarios','estados','respondependencias','responsablespordependencias','movimientos','users','responsables'),[
    'grupos' => Grupoelemento::all()
        ])
        ->extends('layouts.app')
        ->section('content');
    }










}
