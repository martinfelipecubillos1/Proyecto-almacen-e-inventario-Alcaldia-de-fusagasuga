<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Dependencia;
use App\Models\Proveedor;
use App\Models\Tipocontrato;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Contras = DB::table('contratos')
            ->join('proveedors', 'proveedors.id', '=', 'contratos.proveedor')
            ->join('dependencias', 'dependencias.id', '=', 'contratos.dependencia')
            ->join('tipocontratos', 'tipocontratos.id', '=', 'contratos.tipodecontrato')
            ->orderBy('finalizado', 'asc')
            ->select('contratos.*', 'proveedors.nombreproveedor', 'dependencias.nombredependencia', 'tipocontratos.tipodecontrato')
            ->paginate(5);


        $Contras2 = DB::table('contratos')
            ->join('proveedors', 'proveedors.id', '=', 'contratos.proveedor')
            ->join('dependencias', 'dependencias.id', '=', 'contratos.dependencia')
            ->join('tipodonacions', 'tipodonacions.id', '=', 'contratos.tipodonacion')
            ->orderBy('finalizado', 'asc')
            ->select('contratos.*', 'proveedors.nombreproveedor', 'dependencias.nombredependencia', 'tipodonacions.tipodedonacion')
            ->paginate(5);



        return view('contratos.index', compact('Contras', 'Contras2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provedores = Proveedor::all();
        $dependencias = Dependencia::all();
        $tiposdecontratos = Tipocontrato::all();

        return view('contratos.crear', compact('provedores', 'dependencias', 'tiposdecontratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $date =Carbon::now();
       // dd($year->get('year'));
       $isPresent = false;

        foreach (Contrato::where('numero', $request->get('numero'))->get() as $contrato) {
            $createdAt = Carbon::parse($contrato->created_at);
            if($date->year == $createdAt->year)
                $isPresent = true;
        }

      //  dd($isPresent);
        if($isPresent){
            request()->validate([
                'numero' => 'required|unique:contratos',
            ]);

        } else{
        // dd($request->numero);
        // dd($request->all());
            request()->validate([
                'numero' => 'required',
                'objetocontractual' => 'required',
                'proveedor' => 'required',
                'dependencia' => 'required',
                'costo' => 'required',
                'formadepago' => 'required',
                'lugarentrega' => 'required',
                'plazoentrega' => 'required',
                'otrascondiciones' => 'required',
                'pdf' => 'required',
            ]);
            //dd($request->all());
            try {
                DB::beginTransaction();

                $cont = new Contrato();
                $cont->numero = $request->get('numero');
                $cont->objetocontractual = $request->get('objetocontractual');
                $cont->proveedor = $request->get('proveedor');
                $cont->dependencia = $request->get('dependencia');
                if ($request->get('tipodecontrato') == "") {
                    $request->merge(['tipodecontrato' => null]);
                    $cont->tipodecontrato = $request->get('tipodecontrato');
                } else {
                    $cont->tipodecontrato = $request->get('tipodecontrato');
                }

                if ($request->get('tipodedonacion') == "") {
                    $request->merge(['tipodedonacion' => null]);
                    $cont->tipodonacion = $request->get('tipodedonacion');
                } else {
                    $cont->tipodonacion = $request->get('tipodedonacion');
                }

                $cont->costo = $request->get('costo');
                $cont->formadepago = $request->get('formadepago');
                $cont->lugarentrega = $request->get('lugarentrega');
                $cont->plazoentrega = $request->get('plazoentrega');
                $cont->otrascondiciones = $request->get('otrascondiciones');

                if ($request->hasFile('pdf')) {
                    $archivo = $request->file('pdf');
                    $archivo->move(public_path() . '/Archivos/', $archivo->getClientOriginalName());
                    $cont->pdf = $archivo->getClientOriginalName();
                }

                if ($request->get('finalizado') == null) {
                    $request->merge(['finalizado' => ""]);
                    $cont->finalizado = $request->get('finalizado');
                }

                $cont->save();

                DB::commit();
            } catch (Exception $e) {
                report($e);
                DB::rollback();
            }
            //
        //  dd($cont);

            return redirect()->route('contratos.index');
        }



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contrato = Contrato::find($id);

        return view('contratos.editar', compact('contrato'));
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


        //   dd($request->all());
        $responsable = Contrato::find($id);





        if ($request->get('finalizado') == null) {
            $request->merge(['finalizado' => ""]);
        }




        $responsable->update($request->all());

        return redirect()->route('contratos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contratos')->where('id', $id)->delete();
        return redirect()->route('contratos.index');
    }
}
