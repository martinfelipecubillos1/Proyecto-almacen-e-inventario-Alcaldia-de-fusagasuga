@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Grupos de Elementos</h3>
        </div>
        <div class="col-md-2 col-xl-3">
            @can('crear-Usuario')
                <a class="btn btn-success" href="{{ route('grupos.create') }}">Crear un nuevo Grupo de Elementos</a>
            @endcan
        </div>
        <br>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">




                                @foreach ($Grupos as $grupo)
                                    <div class="col-md-2 col-xl-3">
                                        <div class="card order-card" style="background:#{{ $grupo->color }}">
                                            <div class="card-block">

                                                <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('ver-Usuario')
                                                        <h4 class="text-right"> <a class="btn-light btn-lg "
                                                                style="background-color:#{{ $grupo->color }}"
                                                                href="{{ route('subgrupos.show', $grupo->id) }}">
                                                                Mostrar Grupo de: {{ $grupo->nombregrupo }}</a>
                                                        @endcan
                                                    </h4>
                                                    <br>
                                                    <h5>
                                                        @can('editar-Usuario')
                                                            <a class="text-white text-left btn btn-sm "
                                                                style="background-color:#40CFFF"
                                                                href="{{ route('grupos.edit', $grupo->id) }}">
                                                                Crear Subgrupo para {{ $grupo->nombregrupo }}</a>
                                                        @endcan
                                                        @can('borrar-rol')
                                                            <button type="submit" class="btn text-white"
                                                                style="background-color:#c5005c">Eliminar Grupo:
                                                               </button>
                                                        @endcan
                                                    </h5>



                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
