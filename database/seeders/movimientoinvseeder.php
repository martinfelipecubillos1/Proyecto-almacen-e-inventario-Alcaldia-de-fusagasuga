<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movimientoinv;
class movimientoinvseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Movimientoinv::create([
                'responsable' => 1,
                'elemento' => 2,
                'tipomovimiento' => 1,
                'usuario' => 1,
                'actualiza' => 1,
                'cantidad' => 1,
                'responsableanterior' => 2,
                'preciounitario' => 123,
                'preciototal' => 123,
            ]);
    }
}
