@extends('layouts.app')

@section('content')

 @can('editar-rol')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 col-xl-3">
                                    <div class="card bg-c-blue order-card">
                                        <div class="card-block">

                                            <h5>Usuarios</h5>
                                            <h2 class="text-right"><i
                                                    class="fa fa-user f-left"></i><span>{{ $cant_usuarios }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/usuarios" class="text-white">Ver más</a>
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xl-3">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block">
                                            <h5>Roles</h5>

                                            <h2 class="text-right"><i
                                                    class="fa fa-user-lock f-left"></i><span>{{ $cant_roles }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/roles" class="text-white">Ver más</a></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xl-3">
                                    <div class="card bg-c-red order-card">
                                        <div class="card-block">
                                            <h5>Compañias</h5>

                                            <h2 class="text-right"><i
                                                    class="fa fa-university f-left"></i><span>{{ $cant_comp }}</span>
                                            </h2>
                                            <p class="m-b-0 text-right"><a href="/companias" class="text-white">Ver más</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-xl-3">
                                    <div class="card bg-c-gray order-card">
                                        <div class="card-block">
                                            <h5>Dependencias</h5>

                                            <h2 class="text-right"><i
                                                    class="fa fa-users f-left"></i><span>{{ $cant_depe }}</span></h2>
                                            <p class="m-b-0 text-right"><a href="/dependencias" class="text-white">Ver
                                                    más</a></p>
                                        </div>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endcan
@endsection
