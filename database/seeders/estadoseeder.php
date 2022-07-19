<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class estadoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado =  [
            ['nombreestado'=> 'Bueno'],

            ['nombreestado'=> 'Dañado'],

            ['nombreestado'=> 'Funcional'],

            ['nombreestado'=> 'Obsoleto'],

            ['nombreestado'=> 'Antiguo'],

            ['nombreestado'=> 'Inservible'],

            ['nombreestado'=> 'Roto'],
        ];
        DB::table('estados')->insert($estado);

    }
}
