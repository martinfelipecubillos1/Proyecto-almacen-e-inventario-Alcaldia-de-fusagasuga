<?php

namespace App\Http\Controllers;

use App\Models\Compania;
use App\Models\Dependencia;
use App\Models\Responsable;
use App\Models\responsablespordependencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Responsablespordependencias;

class ResponsablespordependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $dependencias = Dependencia::all();
        $texto="";


        $texto=$request->get('texto');


        //consulta de llaves foraneas a la vista


        $responsablespordependencias = DB::table('responsablespordependencias')
            ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
            ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
            ->where('dependencia', 'LIKE', '%'.$texto.'%')
        ->orderBy('id','asc')
            ->select('responsablespordependencias.*', 'responsables.nombre','responsables.cargo', 'dependencias.nombredependencia')
            ->get();
        //  dd($responsablespordependencias);

        // $responsablespordependencias = responsablespordependencia::paginate(5);



        return view('responsablespordependencias.index', compact('responsablespordependencias','texto','dependencias',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $dependencias = Dependencia::all();
        $responsables = Responsable::all();
        return view('responsablespordependencias.crear', compact('dependencias', 'responsables'));
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
            'responsable' => 'required',
            'dependencia' => 'required',
        ]);
        // dd($request->all());
        $request->merge(['jefe'=>false]);
        $request->merge(['activo'=>true]);
          //  dd($request->all());

        responsablespordependencia::create($request->all());

        DB::table('responsables')->where('id',$request->responsable)->update(['activo' => true]);
        //$respon = Update responsable($request->responsable);
       // $responsable = responsable::find($request->responsable);
       // $responsable->activo => true;


        return redirect()->route('responsablespordependencias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Responsable  $responsable
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dependencias = Dependencia::all();
        $responsables = Responsable::all();

        $responsablespordependencia = responsablespordependencia::find($id);

       // dd($responsablespordependencia);
        return view('responsablespordependencias.editar', compact('responsablespordependencia', 'dependencias', 'responsables'));
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

            'responsable' => 'required',
            'dependencia' => 'required',
            //        'correo' =>'required|unique:responsables',


        ]);
        //dd($request->all());
if($request->get('jefe') == null){
$request->merge(['jefe'=>false]);
}

if($request->get('activo') == null){
    $request->merge(['activo'=>false]);
    }


        $responsable = responsablespordependencia::find($id);
        $responsable->update($request->all());
        return redirect()->route('responsablespordependencias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsablespordependencia = responsablespordependencia::find($id);
        //dd($responsablespordependencia);
        DB::table('responsables')->where('id',$responsablespordependencia->responsable)->update(['activo' => false]);
        DB::table('responsablespordependencias')->where('id', $id)->delete();

        return redirect()->route('responsablespordependencias.index');
    }
}
