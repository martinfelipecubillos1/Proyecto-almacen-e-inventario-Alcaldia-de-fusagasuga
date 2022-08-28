<li class="side-menus  nav-link-lg {{ Request::is('*') ? 'active' : '' }}">


    <a class="nav-link" href="/home">
        <img src="{{ asset('img/INVENTARIOSICONS/Dashboard-02.png') }}" alt="" width="25">
        <span>Modulos del sistema</span>
    </a>

    @can('ver-rol')

    <a class="nav-link" href="/usuarios">
        <img src="{{ asset('img/INVENTARIOSICONS/usuarios.png') }}" alt="" width="25">
        <span>Usuarios </span>
    </a>

    <a class="nav-link" href="/roles">
        <img src="{{ asset('img/INVENTARIOSICONS/roles.png') }}" alt="" width="25">
        <span>Roles </span>
    </a>


        <hr width="100%" noshade="noshade">

        <a class="nav-link" href="/companias">
            <img src="{{ asset('img/INVENTARIOSICONS/compañias.png') }}" alt="" width="25">
            <span>Compañias </span>
        </a>

        <a class="nav-link" href="/dependencias">
            <img src="{{ asset('img/INVENTARIOSICONS/dependencias-07.png') }}" alt="" width="25">
            <span>Dependencias </span>
        </a>

        <a class="nav-link" href="/responsables">
            <img src="{{ asset('img/INVENTARIOSICONS/responsables-06.png') }}" alt="" width="25">
            <span>Responsables </span>
        </a>

        <a class="nav-link" href="/responsablespordependencias">
            <img src="{{ asset('img/INVENTARIOSICONS/resdependencia-08.png') }}" alt="" width="25">
            <span>Responsables por dependencias </span>
        </a>

        <hr width="100%" noshade="noshade">

        <a class="nav-link" href="/proveedores">
            <img src="{{ asset('img/INVENTARIOSICONS/proveedores-09.png') }}" alt="" width="25">
            <span>Proveedores</span>
        </a>

        <a class="nav-link" href="/contratos">
            <img src="{{ asset('img/INVENTARIOSICONS/contratos-10.png') }}" alt="" width="25">
            <span>Contratos</span>
        </a>

        <hr width="100%" noshade="noshade">

        <a class="nav-link" href="/grupos">
            <img src="{{ asset('img/INVENTARIOSICONS/grupos-de-elementos-11.png') }}" alt="" width="25">
            <span>Grupos de Elementos</span>
        </a>

    @endcan
    @can('editar-Usuario')

    <a class="nav-link" href="/elementosinv">
        <img src="{{ asset('img/INVENTARIOSICONS/elementos-de-inventarios-12.png') }}" alt="" width="25">
        <span>Elementos del inventario</span>
    </a>

        <hr width="100%" noshade="noshade">

        <a class="nav-link" href="/movimientoinvs">
            <img src="{{ asset('img/INVENTARIOSICONS/movimientoinventaro-13.png') }}" alt="" width="25">
            <span>Movimientos del inventario</span>
        </a>

    @endcan



</li>
