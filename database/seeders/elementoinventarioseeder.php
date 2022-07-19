<?php

namespace Database\Seeders;

use App\Models\Elementoinventario;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class elementoinventarioseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $elementoinv =  [
            [ 'elemento' => 1,
            'placainterna' => 10000,
            'placaexterna' => 10001,
            'serial' => 999999999999,
            'preciounitario' => 161218,
            'preciototal' => 161218,
            'contrato' => 1,
            'estado' => 1,
            'cantidad' => 1,
            'cantidadtotal' => 1,
            'asignado' => "",
            'consumible' => "",
            'baja' => "",],


            [  'elemento' => 1,
            'placainterna' => 10002,
            'placaexterna' => 10003,
            'serial' => 999999999990,
              'preciounitario' => 161218,
            'preciototal' => 161218,
            'contrato' => 1,
            'estado' => 1,
            'cantidad' => 1,
            'cantidadtotal' => 1,
            'asignado' => "si",
            'consumible' => "",
            'baja' => "",],

            ['elemento' => 3,
            'placainterna' => 10004,
            'placaexterna' => 10005,
            'serial' => 999999999965,
            'preciounitario' => 161218,
            'preciototal' => 161218,
            'contrato' => 2,
            'estado' => 1,
            'cantidad' => 50,
            'cantidadtotal' => 50,
            'asignado' => "",
            'consumible' => "si",
            'baja' => "",],

            [  'elemento' => 2,
            'placainterna' => 10006,
            'placaexterna' => 10007,
            'serial' => 999999999905,
            'preciounitario' => 161218,
            'preciototal' => 161218,
            'contrato' => 2,
            'estado' => 1,
            'cantidad' => 1,
            'cantidadtotal' => 1,
            'asignado' => "",
            'consumible' => "",
            'baja' => "",],

        ];
        DB::table('elementoinventarios')->insert($elementoinv);






    }
}
