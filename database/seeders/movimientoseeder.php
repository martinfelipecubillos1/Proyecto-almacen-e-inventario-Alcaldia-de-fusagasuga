<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class movimientoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movimiento =  [
            [
                'nombremovimiento' => 'asignar',
            ],

            [
                'nombremovimiento' => 'entregar',
            ],

            [
                'nombremovimiento' => 'transpaso entrega',
            ],

            [
                'nombremovimiento' => 'transpaso asignacion',
            ],

            [
                'nombremovimiento' => 'baja/salida',
            ],

        ];
        DB::table('movimientos')->insert($movimiento);
    }
}
