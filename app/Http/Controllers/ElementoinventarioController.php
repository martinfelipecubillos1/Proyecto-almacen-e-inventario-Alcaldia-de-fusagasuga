<?php

namespace App\Http\Controllers;

use App\Exports\ElementoinventariosExport;
use App\Models\Contrato;
use App\Models\Donacion;
use App\Models\Elemento;
use App\Models\Elementoinventario;
use App\Models\Estado;
use App\Models\Marca;
use App\Models\Responsable;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ElementoinventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $texto = trim($request->get('texto'));

        $contratos = Contrato::all();




        //dd($texto2->all());

        $elementoinventarios = DB::table('elementoinventarios')
            ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
            ->join('contratos', 'contratos.id', '=', 'elementoinventarios.contrato')
            ->join('estados', 'estados.id', '=', 'elementoinventarios.estado')
            ->join('responsables', 'responsables.id', '=', 'elementoinventarios.responsable')
            ->join('subgrupoelementos', 'subgrupoelementos.id', '=', 'elementos.codigosubgrupo')
            ->select('elementoinventarios.*', 'elementos.nombreelemento', 'estados.nombreestado', 'contratos.numero', 'contratos.objetocontractual','responsables.nombre')
            ->where('contratos.numero', 'LIKE', '%' . $texto . '%')
            ->orwhere('placainterna', '=', $texto)
            ->orwhere('placaexterna', '=', $texto)
            ->orwhere('serial', '=', $texto)
            ->orwhere('elementos.nombreelemento', '=', $texto)
            ->orwhere('responsables.nombre', '=', $texto)
            ->orderBy('id', 'asc')
            ->get();
        //->tosql();

        //  dd($elementoinventarios);

        //  dd($elementoinventarios->all());
        return view('elementosinv.index', compact('elementoinventarios', 'texto', 'contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //se remplaza por el comoponente crearelementoinv de livewire
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



       request()->validate([
        'elemento' => 'required',
        'contrato' => 'required',
        'preciounitario' => 'required|numeric',
        'estado' => 'required',
        'responsable' => 'required',
        'cantidad' => 'required|numeric',
]);

 // dd($request->all());

$consu=false;
        if ($request->consumible == true) {

            $Prueba = DB::table('elementoinventarios')
                ->select('elementoinventarios.*')
                ->where('elemento', '=', $request->get('elemento'))
                ->where('consumible', '=', $request->consumible)
                ->where('contrato', '=', $request->contrato)
                ->get();

            $cant = $Prueba->count();

            if ($cant > 0) {
                $consu = true;
            }
        }else{
            request()->validate([
                'placainterna' => 'required|unique:elementoinventarios|numeric',
                'placaexterna' => 'required|unique:elementoinventarios|numeric',
                'serial' => 'required|numeric',
            ]);
        }

     // dd($consu,$cant);
if($consu){
    request()->validate([
        'repeticiondelementoconsumible' => 'required',
    ]);
}else{

        $isPresent = false;
        $elementoinvs = Elementoinventario::all();
        foreach ($elementoinvs as $elementoinv) {

           /*  if ($request->placainterna == $elementoinv->placaexterna)
                $isPresent = true;

            if ($request->placaexterna == $elementoinv->placainterna)
                $isPresent = true; */
        }


        //dd($isPresent);

        if ($isPresent) {
            request()->validate([
                'repeticion' => 'required',
            ]);
        } else {

            if ($request->get('asignado') == null) {
                $request->merge(['asignado' => true]);
            }

            if ($request->get('baja') == null) {
                $request->merge(['baja' => 0]);
            }

            if ($request->get('consumible') == null) {
                $request->merge(['consumible' => 0]);
            }


            $request->merge(['cantidadtotal' => $request->get('cantidad') ]);
            $request->merge(['preciototal' => $request->get('preciounitario') * $request->get('cantidadtotal')]);
            //dd($request->all());


            Elementoinventario::create($request->all());

            return redirect()->route('elementosinv.index');
        }
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
return Excel::download(new ElementoinventariosExport, 'Elementos.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estados = Estado::all();
        $elementos = Elemento::all();
        $contratos = Contrato::all();
        $elementoinventario = Elementoinventario::find($id);

        return view('elementosinv.editar', compact('elementoinventario', 'elementos', 'contratos', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        request()->validate([
            'contrato' => 'required',

        ]);
        //dd($request->all());
        $elementoinventario = Elementoinventario::find($id);

        $request->merge(['cantidadtotal' => $request->get('cantidad') + $elementoinventario->cantidadtotal ]);
        $request->merge(['cantidad' => $request->get('cantidad') + $elementoinventario->cantidad ]);
        $request->merge(['preciototal' => $request->get('preciounitario') * $request->get('cantidadtotal')]);

      //  dd($request->get('cantidad') ,$request->cantidadtotal, $elementoinventario->cantidadtotal, $request->preciototal);




        $responsable = Elementoinventario::find($id);
        $responsable->update($request->all());
        return redirect()->route('elementosinv.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('elementoinventarios')->where('id', $id)->delete();

        return redirect()->route('elementosinv.index');
    }


    public function exportarElementos()
    {
        return Excel::download(new ElementoinventariosExport, 'Elementos.xlsx');
    }

}
