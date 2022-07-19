<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class tipodonacionseederphp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipodona =  [
            [
                'tipodedonacion' => "ENTRADA ELEMENTOS DE CONSUMO POR DONACION",
            ],
            [
                'tipodedonacion' => "ENTRADA DE ELEMENTOS POR DONACION",
            ],

        ];
        DB::table('tipodonacions')->insert($tipodona);
    }
}
