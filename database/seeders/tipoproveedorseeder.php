<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class tipoproveedorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoproveedor =  [
            [
                'nombre' => "Persona natural",
            ],
            [
                'nombre' => "Persona juridica",
            ],
            [
                'nombre' => "Union temporal",
            ],

        ];
        DB::table('tipoproveedors')->insert($tipoproveedor);
    }
    }

