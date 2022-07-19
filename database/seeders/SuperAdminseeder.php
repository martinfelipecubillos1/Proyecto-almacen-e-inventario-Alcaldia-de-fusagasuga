<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class SuperAdminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $usuario = User::create([
          'name'=> 'Martin Cubillos',
           'email'=> 'm@gmail.com',
           'password' => bcrypt('12345678')
       ]);

       $rol = Role::create(['name'=>'Administrador']);
       $permisos = Permission::pluck('id', 'id')->all();
       $rol->syncPermissions($permisos);

       $usuario ->assignRole($rol->id);



       $usuario2 = User::create([
       'name'=> 'Carreño',
       'email'=> 'Carreno@gmail.com',
       'password' => bcrypt('12345678')
       ]);

       $rol = Role::create(['name'=>'Usuario']);




       $usuario3 =  [
        ['permission_id' => '5',
        'role_id' => '2',],
        ['permission_id' => '6',
        'role_id' => '2',],
        ['permission_id' => '7',
        'role_id' => '2',],
        ['permission_id' => '8',
        'role_id' => '2',],

    ];
    DB::table('role_has_permissions')->insert($usuario3);




    }
}
