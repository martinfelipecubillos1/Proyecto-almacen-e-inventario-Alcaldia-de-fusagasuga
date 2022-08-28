<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class colorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dependencia =  [
            ['color'=> '686868',
            'nombrecolor' => 'gris',],

            ['color'=> 'C1135C',
            'nombrecolor' => 'fuxia',],

            ['color'=> 'EBD413',
            'nombrecolor' => 'amarillo',],

            ['color'=> '2BADC1',
            'nombrecolor' => 'cyan',],

            ['color'=> '3BA2C9',
            'nombrecolor' => 'azul',],

            ['color'=> '5BB224',
            'nombrecolor' => 'verde',],

            ['color'=> 'A2C72C',
            'nombrecolor' => 'verde claro',],

            ['color'=> 'E62D81',
            'nombrecolor' => 'rosado',],

            ['color'=> 'F19212',
            'nombrecolor' => 'naranja',],


        ];
        DB::table('colors')->insert($dependencia);//
    }
}

