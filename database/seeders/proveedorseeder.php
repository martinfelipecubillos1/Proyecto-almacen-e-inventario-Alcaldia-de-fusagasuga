<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class proveedorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $proveedor =  [
            [
                'identificacion' => 'CC',
                'numero' => '1002685456',
                'tipo' => '1',
                'nombreproveedor' => 'pepito perez',
                'direccion' => 'pepiteria cra3 - 16b ',
                'correo' => 'pepitoperez@gmail.com',
                'telefono' => '3125315886'
            ],

            [
                'identificacion' => 'Nit',
                'numero' => '10026887821',
                'tipo' => '2',
                'nombreproveedor' => 'Asus company',
                'direccion' => '1 de mayo cra 18 - 57b ',
                'correo' => 'Asuscompany@gmail.com',
                'telefono' => '5489351548'
            ],

            [
                'identificacion' => 'NIT',
                'numero' => '104886680',
                'tipo' => '3',
                'nombreproveedor' => 'Constructoras sas',
                'direccion' => 'Cra 21 #  34a -26',
                'correo' => 'Constructoras@gmail.com',
                'telefono' => '876541587'
            ],
        ];
        DB::table('proveedors')->insert($proveedor);
    }
}
