<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class contratoseederphp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $contrato =  [
                [
                'numero'=>10,
                'objetocontractual'=>"Entrada de Elementos donados",
                'proveedor' => 2,
                'dependencia' => 1,
                'tipodecontrato' =>null,
                'tipodonacion' =>1,
                'costo' => 124824,
                'formadepago' => "asdkjab skjkasaw awefdsaew",
                'lugarentrega' => "asdkjab skjkasaw awefdsaew",
                'plazoentrega' => "asdkjab skjkasaw awefdsaew",
                'otrascondiciones' => "asdkjab skjkasaw awefdsaew",
                'pdf' => "16153564b7e05c35c699dd434393a746.pdf",
                'finalizado' => 0,
                ],

                [
                    'numero' => 12567,
                    'objetocontractual'=>"Entrada de insumos",
                    'proveedor' => 2,
                    'dependencia' => 1,
                    'tipodecontrato' => 2,
                    'tipodonacion' =>null,
                    'costo' => 124824,
                    'formadepago' => "asdkjab skjkasaw awefdsaew",
                    'lugarentrega' => "asdkjab skjkasaw awefdsaew",
                    'plazoentrega' => "asdkjab skjkasaw awefdsaew",
                    'otrascondiciones' => "asdkjab skjkasaw awefdsaew",
                    'pdf' => "16153564b7e05c35c699dd434393a746.pdf",
                    'finalizado' => 0,
                ],
                [
                    'numero' => 12966,
                    'objetocontractual'=>"Entrada de insumos",
                    'proveedor' => 2,
                    'dependencia' => 1,
                    'tipodecontrato' => 2,
                    'tipodonacion' =>null,
                    'costo' => 124824,
                    'formadepago' => "asdkjab skjkasaw awefdsaew",
                    'lugarentrega' => "asdkjab skjkasaw awefdsaew",
                    'plazoentrega' => "asdkjab skjkasaw awefdsaew",
                    'otrascondiciones' => "asdkjab skjkasaw awefdsaew",
                    'pdf' => "16153564b7e05c35c699dd434393a746.pdf",
                    'finalizado' => 1,
                ],




            ];
            DB::table('contratos')->insert($contrato);



        }

    }

