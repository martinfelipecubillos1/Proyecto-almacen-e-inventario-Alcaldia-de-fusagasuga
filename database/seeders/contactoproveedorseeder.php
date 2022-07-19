<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class contactoproveedorseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $contactoproveedor =  [
            [
                'proveedor' => '3',
                'nombreempresa' => 'ladrillera',
                'numero' => '12578454',
                'direccion' => 'cra30 - 11b ',
                'correo' => 'ladrillera@gmail.com',
                'telefono' => '3145875886'
            ],

            [
                'proveedor' => '3',
                'nombreempresa' => 'cementera',
                'numero' => '789876576',
                'direccion' => 'cra56 - 11c ',
                'correo' => 'cementera@gmail.com',
                'telefono' => '3005555886'
            ],

            [
                'proveedor' => '3',
                'nombreempresa' => 'arenera',
                'numero' => '786548712',
                'direccion' => 'cra78 - 11a ',
                'correo' => 'arenera@gmail.com',
                'telefono' => '300001006'
            ],
        ];
        DB::table('contactoproveedors')->insert($contactoproveedor);
    }
}
