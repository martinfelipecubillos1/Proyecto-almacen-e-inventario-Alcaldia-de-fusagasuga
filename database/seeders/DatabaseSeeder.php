<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //fase 1 base de datos
        $this->call(companiaseeder::class);
        $this->call(dependenciaseeder::class);
        $this->call(responsableseeder::class);
        $this->call(colorseeder::class);
        $this->call(tipocontratoseeder::class);
        $this->call(tipodonacionseederphp::class);
        $this->call(grupoelementoseeder::class);
        $this->call(subgrupoelementoseeder::class);
        $this->call(elementoseeder::class);
        $this->call(movimientoseeder::class);
        $this->call(estadoseeder::class);
        $this->call(tipoproveedorseeder::class);
        $this->call(proveedorseeder::class);
        $this->call(contactoproveedorseeder::class);
        $this->call(contratoseederphp::class);
        $this->call(elementoinventarioseeder::class);

        $this->call(SeederTablaPermisos::class);
        $this->call(SuperAdminseeder::class);
        $this->call(responsablespordependenciasseeder::class);
        $this->call(movimientoinvseeder::class);
    }
}
