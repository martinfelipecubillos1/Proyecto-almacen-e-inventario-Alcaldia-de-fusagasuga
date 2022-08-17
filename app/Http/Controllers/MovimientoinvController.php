<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Elementoinventario;
use App\Models\Estado;
use App\Models\Movimiento;
use App\Models\Movimientoinv;
use App\Models\Proveedor;
use App\Models\Responsable;
use App\Models\responsablespordependencia;
use App\Models\Salida;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class MovimientoinvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $texto = trim($request->get('texto'));
        //consulta de llaves foraneas a la vista
        $Movimientoinvs = DB::table('movimientoinvs')

            ->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'movimientoinvs.responsable')
            ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
            ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')



            ->join('responsablespordependencias as an', 'an.id', '=', 'movimientoinvs.responsableanterior')
            ->join('responsablespordependencias as nu', 'nu.id', '=', 'movimientoinvs.responsable')
            ->join('responsables as rnu', 'rnu.id', '=', 'nu.responsable')
            ->join('responsables as ran', 'ran.id', '=', 'an.responsable')
            ->join('dependencias as dnu', 'dnu.id', '=', 'nu.dependencia')
            ->join('dependencias as dan', 'dan.id', '=', 'an.dependencia')


            ->join('elementoinventarios', 'elementoinventarios.id', '=', 'movimientoinvs.elemento')
            ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
            ->join('movimientos', 'movimientos.id', '=', 'movimientoinvs.tipomovimiento')
            ->join('users as a', 'a.id', '=', 'movimientoinvs.usuario')
            ->join('users as b', 'b.id', '=', 'movimientoinvs.actualiza')
            ->select('movimientoinvs.*', 'a.name as nombreCrea', 'b.name as nombreActualiza', 'ran.nombre as anr', 'dan.nombredependencia as and','rnu.nombre as nnr', 'dnu.nombredependencia as nnd', 'elementos.nombreelemento', 'movimientos.nombremovimiento', 'elementoinventarios.placainterna', 'elementoinventarios.placaexterna', 'elementoinventarios.serial')
            ->where('movimientos.nombremovimiento', 'LIKE', '%' . $texto . '%')
            ->orwhere('elementoinventarios.placainterna', '=', $texto)
            ->orwhere('elementoinventarios.placaexterna', '=', $texto)
            ->orwhere('elementoinventarios.serial', '=', $texto)
            ->orwhere('responsables.nombre', '=', $texto)
            ->orderby('id','desc')
            ->paginate(20);



        //dd($Movimientoinvs->all());

        // $responsablespordependencias = responsablespordependencia::paginate(5);

        return view('movimientoinvs.index', compact('Movimientoinvs','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
 //livewire.movi Remplaza el crear
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //dd($request->all());

        request()->validate([
            'responsable' => 'required|exists:responsables,id',
            'elemento' => 'required',
            'cantidad' => 'required',
            'usuario' => 'required',
            'estado' => 'required',
            'observaciones' => 'required',
        ]);
       // dd($request->cantidad, $request->cantidadmaxima);

            // dd($elementoinv->consumible);
           $elementoinv = Elementoinventario::find($request->elemento);


//dd($elementoinv->preciounitario);
           Movimientoinv::create([
            'responsable' => $request->input('responsable'),
            'elemento' => $request->input('elemento'),
            'tipomovimiento' => $request->input('tipomovimiento'),
            'usuario' => Auth::user()->id,
            'actualiza' => Auth::user()->id,

            'cantidad' => $request->input('cantidad'),
            'preciounitario' => $elementoinv->preciounitario,
            'preciototal' => $elementoinv->preciounitario * $request->input('cantidad'),
        ]);

if($request->tipomovimiento == 4){
        DB::table('elementoinventarios')
        ->where('id',$request->elemento)
        ->update(['responsable' => $request->responsable,'estado'=>$request->estado,'observaciones'=>$request->observaciones ]);
}else{
    DB::table('elementoinventarios')
    ->where('id',$request->elemento)
    ->update(['responsable' => $request->responsable,'estado'=>$request->estado,'observaciones'=>$request->observaciones, 'baja'=>true ]);
}


    return redirect()->route('movimientoinvs.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show()
    {





    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respondependencias = DB::table('responsablespordependencias')
        ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
        ->where('responsablespordependencias.activo', '=', 'true')
        ->select('responsablespordependencias.*', 'responsables.nombre','dependencias.nombredependencia')
        ->get();


        $estados = Estado::all();
        $movimientos = Movimiento::all();
        $users = User::all();
        $responsables = Responsable::all();




       // $movimientoinv = Movimientoinv::find($id);


    $movimientoinv = DB::table('movimientoinvs')
     ->where('movimientoinvs.id','=',$id)
     ->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'movimientoinvs.responsable')
     ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
     ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
     ->join('elementoinventarios', 'elementoinventarios.id', '=', 'movimientoinvs.elemento')
     ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
     ->join('movimientos', 'movimientos.id', '=', 'movimientoinvs.tipomovimiento')
     ->join('users as a', 'a.id', '=', 'movimientoinvs.usuario')
     ->join('users as b', 'b.id', '=', 'movimientoinvs.actualiza')
     ->select('movimientoinvs.*', 'a.name as nombreCrea', 'b.name as nombreActualiza', 'responsables.nombre', 'dependencias.nombredependencia', 'elementos.nombreelemento', 'movimientos.nombremovimiento', 'elementoinventarios.placainterna', 'elementoinventarios.placaexterna', 'elementoinventarios.serial')
     ->first();


//dd($Movimientoinvs, $movimientoinv);

        return view('movimientoinvs.editar', compact('movimientoinv', 'respondependencias', 'movimientos', 'users', 'responsables','estados'));
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
            'responsablenuevo' => 'required',
            'movimiento' => 'required',
            'estado' => 'required',
        ]);

//dd($request->all());
if($request->movimiento == 1){

$movimientoinv = DB::table('movimientoinvs')
->where('movimientoinvs.id','=',$id)
->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'movimientoinvs.responsable')
->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
->join('elementoinventarios', 'elementoinventarios.id', '=', 'movimientoinvs.elemento')
->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
->join('movimientos', 'movimientos.id', '=', 'movimientoinvs.tipomovimiento')
->join('users as a', 'a.id', '=', 'movimientoinvs.usuario')
->join('users as b', 'b.id', '=', 'movimientoinvs.actualiza')
->select('movimientoinvs.*', 'a.name as nombreCrea', 'b.name as nombreActualiza', 'responsables.nombre', 'elementos.nombreelemento', 'movimientos.nombremovimiento', 'elementoinventarios.placainterna', 'elementoinventarios.placaexterna', 'elementoinventarios.serial')
->first();



        Movimientoinv::create([
            'responsable' => $request->input('responsablenuevo'),
            'elemento' =>$movimientoinv->elemento,
            'tipomovimiento' => 4,
            'usuario' => Auth::user()->id,
            'actualiza' => Auth::user()->id,
            'cantidad' => $movimientoinv->cantidad,
            'preciounitario' => $movimientoinv->preciounitario,
            'preciototal' => $movimientoinv->preciototal,
        ]);


$moviactualiza = Movimientoinv::find($id);
        $moviactualiza->tipomovimiento = 3;
        $moviactualiza->actualiza = Auth::user()->id;
        $moviactualiza->save();

    }elseif($request->movimiento == 2){

        $movimientoinv = DB::table('movimientoinvs')
        ->where('movimientoinvs.id','=',$id)
        ->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'movimientoinvs.responsable')
        ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        ->join('elementoinventarios', 'elementoinventarios.id', '=', 'movimientoinvs.elemento')
        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->join('movimientos', 'movimientos.id', '=', 'movimientoinvs.tipomovimiento')
        ->join('users as a', 'a.id', '=', 'movimientoinvs.usuario')
        ->join('users as b', 'b.id', '=', 'movimientoinvs.actualiza')
        ->select('movimientoinvs.*', 'a.name as nombreCrea', 'b.name as nombreActualiza', 'responsables.nombre', 'elementos.nombreelemento', 'movimientos.nombremovimiento', 'elementoinventarios.placainterna', 'elementoinventarios.placaexterna', 'elementoinventarios.serial')
        ->first();

        //dd($movimientoinv->elemento,$request->estado);




        $elementoactualiza = Elementoinventario::find($movimientoinv->elemento);
        $elementoactualiza->estado = $request->estado;
        //$elementoactualiza->asignado = "";
        $elementoactualiza->baja = 1;
        $elementoactualiza->save();

        Movimientoinv::create([
            'responsable' => $request->input('responsablenuevo'),
            'elemento' =>$movimientoinv->elemento,
            'tipomovimiento' => 5,
            'usuario' => Auth::user()->id,
            'actualiza' => Auth::user()->id,
            'cantidad' => $movimientoinv->cantidad,
            'preciounitario' => $movimientoinv->preciounitario,
            'preciototal' => $movimientoinv->preciototal,
        ]);

        $moviactualiza = Movimientoinv::find($id);
        $moviactualiza->tipomovimiento = 3;
        $moviactualiza->actualiza = Auth::user()->id;
        $moviactualiza->save();

    }
        //dd($request->all());
     //   $responsable = Movimientoinv::find($id);
      //  $responsable->update($request->all());
        return redirect()->route('movimientoinvs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('movimientoinvs')->where('id', $id)->delete();

        return redirect()->route('movimientoinvs.index');
    }
}
