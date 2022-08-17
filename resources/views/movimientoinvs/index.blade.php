@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Movimientos del inventario </h3>
        </div>

        <div class="from-row">
            <div class="col-ms-4">
                @can('crear-rol')
                    <a class="btn btn-warning" href="/movi">Nuevo Movimiento</a>
                @endcan

            </div>
        </div>
        <br>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                    <div class="from-row">
                        <div class="col-lg-4">
                            <form action="{{ route('movimientoinvs.index') }}" method="get">
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
                                    <th style="color:#fff;">Responsable</th>
                                    <th style="color:#fff;">elemento</th>
                                    <th style="color:#fff;">placas inter/exter</th>
                                    <th style="color:#fff;">serial/referencia</th>
                                    <th style="color:#fff;">tipomovimiento</th>
                                    <th style="color:#fff;">Responsable anterior</th>
                                    <th style="color:#fff;">cantidad</th>
                                    <th style="color:#fff;">Realizo el movimiento</th>
                                    <th style="color:#fff;">Fecha del movimiento</th>
                                    @can('editar-rol')
                                        <th style="color:#fff;">acciones</th>
                                    @endcan
                                </thead>
                                <tbody>
                                    @foreach ($Movimientoinvs as $Movimientoinv)
                                        <tr>
                                            <td>{{ $Movimientoinv->id }}</td>
                                            <td>{{ $Movimientoinv->nnr }} -- {{ $Movimientoinv->nnd }}</td>
                                            <td>{{ $Movimientoinv->nombreelemento }}</td>
                                            <td> {{ $Movimientoinv->placainterna }} / {{ $Movimientoinv->placaexterna }}</td>
                                            <td> {{ $Movimientoinv->serial }}</td>
                                            <td>{{ $Movimientoinv->nombremovimiento }}</td>
                                            <td>{{ $Movimientoinv->anr }} -- {{ $Movimientoinv->and }}</td>
                                            <td>{{ $Movimientoinv->cantidad }}</td>
                                            <td>{{ $Movimientoinv->nombreCrea }}</td>
                                            <td>{{ $Movimientoinv->created_at }}</td>
                                            <td>
                                                <form action="{{ route('movimientoinvs.destroy', $Movimientoinv->id) }}"
                                                    method="POST">



                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-rol')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan


                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $Movimientoinvs->links() !!}

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
