@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading"> Transpasos del inventario </h3>
    </div>



<div class="section-body">
    <div class="row">
        <div class="col-lg-12">

            <div class="from-row">
                <div class="col-lg-4">
                    <form action="{{ route('movimientoinvs.create') }}" method="get">
                        <input type="text" class="form-control" name="texto" value="{{ $texto }}"><br>
                </div>
                <div class="col-auto">
                    <input type="submit" class="btn btn-primary" value="Buscar">
                    </form>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">

                    <table class="table table-sm  ">
                        <thead style="background-color:#6777ef">
                            <th style="color:#fff;">Codigo</th>
                            <th style="color:#fff;">Responsable anterior</th>
                            <th style="color:#fff;">Movimiento relacionado</th>
                            <th style="color:#fff;">Responsable nuevo</th>
                            <th style="color:#fff;">Fecha del movimiento</th>
                            <th style="color:#fff;">Actualiza</th>
                        </thead>
                        <tbody>
                            @foreach ($transpasos as $transpaso)
                                <tr>
                                    <td>{{ $transpaso->id }}</td>
                                    <td>{{ $transpaso->antiguores }}</td>
                                    <td>{{ $transpaso->movimientorelacionado }}</td>
                                    <td> {{ $transpaso->nuevores }}</td>
                                    <td> {{ $transpaso->actualiza }}</td>
                                    <td>{{ $transpaso->created_at }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Ubicamos la paginacion a la derecha -->
                    <div class="pagination justify-content-end">
                        {!! $transpasos->links() !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</section>
@endsection
