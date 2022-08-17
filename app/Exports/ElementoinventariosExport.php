<?php

namespace App\Exports;

use App\Models\Elementoinventario;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ElementoinventariosExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $elementoinventarios = DB::table('elementoinventarios')
        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->join('contratos', 'contratos.id', '=', 'elementoinventarios.contrato')
        ->join('estados', 'estados.id', '=', 'elementoinventarios.estado')
        ->join('responsables', 'responsables.id', '=', 'elementoinventarios.responsable')
        ->join('subgrupoelementos', 'subgrupoelementos.id', '=', 'elementos.codigosubgrupo')
        ->select('elementoinventarios.*', 'elementos.nombreelemento', 'estados.nombreestado', 'contratos.numero', 'contratos.objetocontractual','responsables.nombre')
        ->orderBy('id', 'asc')
        ->get();

       $ele = Elementoinventario::all();

        return view('elementosinv.export',['elementoinventarios' => DB::table('elementoinventarios')
        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->join('contratos', 'contratos.id', '=', 'elementoinventarios.contrato')
        ->join('estados', 'estados.id', '=', 'elementoinventarios.estado')
        ->join('responsables', 'responsables.id', '=', 'elementoinventarios.responsable')
        ->join('subgrupoelementos', 'subgrupoelementos.id', '=', 'elementos.codigosubgrupo')
        ->select('elementoinventarios.*', 'elementos.nombreelemento', 'estados.nombreestado', 'contratos.numero', 'contratos.objetocontractual','responsables.nombre')
        ->orderBy('id', 'asc')
        ->get()
        ]) ;

}
}
