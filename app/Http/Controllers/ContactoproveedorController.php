<?php

namespace App\Http\Controllers;

use App\Models\Contactoproveedor;
use App\Models\Proveedor;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
class ContactoproveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $id;

    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactoproveedor  $contactoproveedor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactos = DB::table('contactoproveedors')
        ->join('proveedors', 'proveedors.id', '=', 'contactoproveedors.proveedor')
        ->where('proveedor', 'LIKE', '%'.$id.'%')
        ->orderBy('id','asc')
        ->select('contactoproveedors.*', 'proveedors.nombreproveedor')
        ->get();

    return view('contactosproveedor.index', compact('contactos','id'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contactoproveedor  $contactoproveedor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     //   dd($id);
$proveedor = Proveedor::find($id);

        return view ('contactosproveedor.crear',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactoproveedor  $contactoproveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'nombreempresa' =>'required',
            'numero' =>'required',
            'direccion' =>'required',
            'correo' =>'required|email',
            'telefono'=>'required',
            ]);

            $request->merge(['proveedor' => $id]);

         //   dd($request->all());

            Contactoproveedor::create($request->all());

            return redirect()->route('contactosproveedor.show', $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactoproveedor  $contactoproveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contactoproveedors')->where('id', $id)->delete();

        return back()->withInput();
    }
}
