<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;
use App\Models\Contrato;
use App\Models\Dependencia;
use App\Models\Proveedor;
use App\Models\Tipodonacion;
use Exception;
use Illuminate\Support\Facades\DB;

class DonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tiposdedonacions = Tipodonacion::all();

        return view('donaciones.crear', compact('provedores', 'dependencias', 'tiposdedonacions'));
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
            'proveedor' => 'required',
            'dependencia' => 'required',
            'tipodedonacion' => 'required',
            'costo' => 'required',
            'descripcion' => 'required',
            'destino' => 'required',
            'pdf' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $cont = new Donacion;
            $cont->proveedor = $request->get('proveedor');
            $cont->dependencia = $request->get('dependencia');
            $cont->tipodedonacion = $request->get('tipodedonacion');
            $cont->costo = $request->get('costo');
            $cont->descripcion = $request->get('descripcion');
            $cont->destino = $request->get('destino');
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

            DB::rollback();
        }


        return redirect()->route('contratos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function show(Donacion $donacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $donacion = Donacion::find($id);

        return view('donaciones.editar', compact('donacion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $responsable = Donacion::find($id);


        if ($request->get('finalizado') == null) {
            $request->merge(['finalizado' => ""]);
            }




        $responsable->update($request->all());

        return redirect()->route('contratos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donacion  $donacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('donacions')->where('id', $id)->delete();
        return redirect()->route('contratos.index');
    }
}
