<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Tipoproveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Proveedores = DB::table('proveedors')
        ->join('tipoproveedors', 'tipoproveedors.id', '=', 'proveedors.tipo')
        ->select('proveedors.*', 'tipoproveedors.nombre' )
        ->paginate(5);

      //  dd($Proveedores->all());
        return view('proveedores.index', compact('Proveedores'));


         }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // se usa la funcion crearproveedorlivewire
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
            'identificacion' =>'required',
            'numero' =>'required',
            'tipo' =>'required',
            'nombreproveedor' =>'required',
            'direccion' =>'required',
            'correo' =>'required|email',
            'telefono' =>'required',
            ]);

        //    dd($request->all());
            Proveedor::create($request->all());

    return redirect()->route('proveedores.index');
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
$proveedor = Proveedor::find($id);


$tipoproveedor = Tipoproveedor::find($proveedor->tipo);


        return view('proveedores.editar', compact('proveedor','tipoproveedor'));
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

        request()->validate([
           // 'codigoproveedor' => 'required|unique:proveedors',
           'nombreproveedor' =>'required',
           'direccion' =>'required',
           'correo' =>'required|email',
           'telefono' =>'required',
            ]);
           // dd($request->all());

           $proveedor = Proveedor::find($id);
    $proveedor->update($request->all());
    return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('proveedors')->where('id', $id)->delete();

        return redirect()->route('proveedores.index');
    }
}
