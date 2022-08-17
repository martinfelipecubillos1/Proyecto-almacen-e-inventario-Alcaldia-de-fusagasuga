<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Elementoinventario;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class QrController extends Controller
{

    public function getElementoAsignado(Request $request){

        // $movimientoinv = DB::table('movimientoinvs')
        // ->where('movimientoinvs.elemento','=',$request->id)
        // ->where('movimientoinvs.tipomovimiento','=',1)
        // ->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'movimientoinvs.responsable')
        // ->join('responsables', 'responsables.id', '=', 'responsablespordependencias.responsable')
        // ->join('dependencias', 'dependencias.id', '=', 'responsablespordependencias.dependencia')
        // ->join('elementoinventarios', 'elementoinventarios.id', '=', 'movimientoinvs.elemento')
        // ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        // ->join('movimientos', 'movimientos.id', '=', 'movimientoinvs.tipomovimiento')
        // ->join('users as a', 'a.id', '=', 'movimientoinvs.usuario')
        // ->join('users as b', 'b.id', '=', 'movimientoinvs.actualiza')
        // ->select('movimientoinvs.*', 'a.name as nombreCrea', 'b.name as nombreActualiza', 'responsables.nombre', 'dependencias.nombredependencia', 'elementos.nombreelemento', 'movimientos.nombremovimiento', 'elementoinventarios.placainterna', 'elementoinventarios.placaexterna', 'elementoinventarios.serial')
        // ->first();

        $elementoinventarios = DB::table('elementoinventarios')
        ->where('elementoinventarios.id','=',$request->id)



        ->join('responsablespordependencias', 'responsablespordependencias.id', '=', 'elementoinventarios.responsable')
        ->join('responsables as res', 'res.id', '=', 'responsablespordependencias.responsable')
        ->join('dependencias as dep', 'dep.id', '=', 'responsablespordependencias.dependencia')

        ->join('elementos', 'elementos.id', '=', 'elementoinventarios.elemento')
        ->join('contratos', 'contratos.id', '=', 'elementoinventarios.contrato')
        ->join('estados', 'estados.id', '=', 'elementoinventarios.estado')
        ->join('subgrupoelementos', 'subgrupoelementos.id', '=', 'elementos.codigosubgrupo')
        ->select('elementoinventarios.*', 'elementos.nombreelemento', 'estados.nombreestado', 'contratos.numero', 'contratos.objetocontractual','res.nombre','dep.nombredependencia','elementos.descripcion')
        ->first();



        //$data = "El Qr escaneado pertenece a un elemento: $movimientoinv->nombreelemento, identificado con las placas: $elementoinventario->placainterna, $elementoinventario->placaexterna, y se encuentra asignado a: $movimientoinv->nombre";
        //dd($elementoinventario,$movimientoinv);


            return response()->json(
                [

                    'elemento' => $elementoinventarios->nombreelemento,
                    'placa_interna' => $elementoinventarios->nombredependencia,
                    'placa_externa' => $elementoinventarios->descripcion,
                    'asignado' => true,
                    'nombre' => "a $elementoinventarios->nombre",
                ]
                ,200,[]
            );
        // } else{
        //     $elementoinventario = DB::table('elementoinventarios as a')
        //                                 ->join('elementos as b', 'a.elemento', '=', 'b.id')
        //                                 ->where('a.id', '=', $request->id)
        //                                 ->select('b.nombreelemento', 'a.placainterna', 'a.placaexterna')
        //                                 ->first();
        //     return response()->json(
        //         [
        //             'elemento' => $elementoinventario->nombreelemento,
        //             'placa_interna' => $elementoinventario->placainterna,
        //             'placa_externa' => $elementoinventario->placaexterna,
        //             'asignado' => "a Almacen",
        //         ]
        //         ,200,[]
        //     );
        // }
        //validar id de elemento (que exista en DB)

        /**
         * hacer consultas de informacion que necesito con ese id
         *
         * retornar campos encontrados en formato JSON
         */


        }

}
