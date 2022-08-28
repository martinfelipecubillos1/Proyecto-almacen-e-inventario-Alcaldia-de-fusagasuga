@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">

            @foreach ($Grupos as $Grupo)
                @if ($Grupo->id == $id)
                    <h3 class="page__heading"> Subgrupos de Elementos {{ $Grupo->nombregrupo }} </h3>
        </div>
        @endif
        @endforeach

        <div class="section-body">
            <h5><a class="text-white btn"
                href="{{ route('grupos.index') }}"
                style="background-color:#6c6b6e"> Volver
                </a></h5>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                @foreach ($Subgrupos as $Subgrupo)
                                    <div class="col-md-2 col-xl-3">
                                        <div class="card order-card" style="background:#{{ $Subgrupo->color }}">
                                            <div class="card-block">

                                                <form action="{{ route('subgrupos.destroy', $Subgrupo->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    @can('ver-Usuario')


                                                    <h4 class="text-right">    <a class="text-black btn-light btn-lg"
                                                    href="{{ route('elementos.show', $Subgrupo->id) }}">Mostrar:
                                                    {{ $Subgrupo->nombresubgrupo }} </a>
                                                </h4>
                                                @endcan
                                                    <h5>
                                                        <br>
                                                        @can('crear-Usuario')
                                                        <a class="text-white text-left btn "
                                                            style="background-color:#40CFFF"
                                                            href="{{ route('subgrupos.edit', $Subgrupo->id) }}">
                                                            Crear {{ $Subgrupo->nombresubgrupo }}
                                                        @endcan
                                                        @can('crear-Usuario')
                                                        </a> <button type="submit" class="btn text-white"
                                                            style="background-color:#c5005c">Eliminar Subgrupo</button>
                                                            @endcan
                                                    </h5>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
