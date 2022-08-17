<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subgrupoelementoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subgrupo =  [
            [
                'nombresubgrupo' => 'mesas',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'sillas',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'organizadores',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'archivadores',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'camarotes',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'repisas',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'armarios',
                'codigogrupo' => '1',
                'color' => 'FF5370',
            ],

            [
                'nombresubgrupo' => 'computadores',
                'codigogrupo' => '2',
                'color' => 'FF5370',
            ],
            [
                'nombresubgrupo' => 'televisores',
                'codigogrupo' => '2',
                'color' => 'FF5370',
            ],
            [
                'nombresubgrupo' => 'cables',
                'codigogrupo' => '2',
                'color' => 'FF5370',
            ],
            [
                'nombresubgrupo' => 'tablets',
                'codigogrupo' => '2',
                'color' => 'FF5370',
            ],
            [
                'nombresubgrupo' => 'ventiladores',
                'codigogrupo' => '2',
                'color' => 'FF5370',
            ],
        ];
        DB::table('subgrupoelementos')->insert($subgrupo);
    }
}
