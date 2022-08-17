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
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Electronicos',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Papeleria',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Banda',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Construcción',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Varios',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Emergencias',
                'color' => 'FF5370',
            ],

            [
                'nombregrupo' => 'Construcción',
                'color' => 'FF5370',
            ],

        ];
        DB::table('grupoelementos')->insert($grupo);
    }
}
