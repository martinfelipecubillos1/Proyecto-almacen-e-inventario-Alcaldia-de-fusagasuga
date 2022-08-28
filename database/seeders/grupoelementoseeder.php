<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class grupoelementoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupo =  [
            [
                'nombregrupo' => 'Muebles ',
                'color' => 'EBD413',
            ],

            [
                'nombregrupo' => 'Electronicos',
                'color' => '2BCDC1',
            ],

            [
                'nombregrupo' => 'Papeleria',
                'color' => 'A2C72C',
            ],

            [
                'nombregrupo' => 'Banda',
                'color' => 'E62D81',
            ],

            [
                'nombregrupo' => 'Construcción',
                'color' => 'F19212',
            ],

            [
                'nombregrupo' => 'Varios',
                'color' => '3BA2C9',
            ],

            [
                'nombregrupo' => 'Emergencias',
                'color' => '5BB224',
            ],

            [
                'nombregrupo' => 'Construcción',
                'color' => '686868',
            ],

        ];
        DB::table('grupoelementos')->insert($grupo);
    }
}
