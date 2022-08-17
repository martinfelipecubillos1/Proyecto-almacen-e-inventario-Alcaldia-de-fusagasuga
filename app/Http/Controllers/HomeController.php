<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Compania;
use App\Models\Contrato;
use App\Models\Dependencia;
use App\Models\Elementoinventario;
use App\Models\Movimientoinv;
use App\Models\responsablespordependencia;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $cant_usuarios = User::count();
        $cant_roles = Role::count();
        $cant_comp = Compania::count();
        $cant_depe = Dependencia::count();
        $cant_elemen = Elementoinventario::count();
        $cant_contra = Contrato::count();
        $cant_res = responsablespordependencia::count();
        $cant_mov = Movimientoinv::count();

$user = Auth::user();
$rol = $user->roles->pluck('name');

//dd($rol);

        return view('home',compact('cant_usuarios','cant_roles','cant_comp','cant_depe','cant_elemen','cant_contra','cant_res','cant_mov','rol'));
    }


}
