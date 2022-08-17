<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\responsablespordependencia;

class responsablespordependenciasseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                $responsable =  [
                    [ 'responsable' => 1,
                    'dependencia' => 1,
                    'jefe' => 0,
                    'activo' => 1,],

                    [  'responsable' => 2,
                    'dependencia' => 1,
                    'jefe' => 0,
                    'activo' => 0,],

                    [ 'responsable' => 3,
                    'dependencia' => 1,
                    'jefe' => 0,
                    'activo' => 1,],


                ];
                DB::table('responsablespordependencias')->insert($responsable);





    }
}
