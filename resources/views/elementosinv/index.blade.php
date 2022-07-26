@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Elementos del inventario Por contrato </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">

                    <form action="{{ route('elementosinv.index') }}" method="get">

                        <div class="from-row">
                            <div class="col-ms-4">
                                <input type="text" class="form-control" name="texto" value="{{ $texto }}">
                            </div>
                            <div class="col-auto">
                                <input type="submit" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @can('crear-Usuario')
                                <a class="form-control btn btn-success" href="crearelementoinv">Nuevo</a>
                            @endcan

                            <table class="table table-sm  ">
                                <thead style="background-color:#6777ef">

                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Placa interna</th>
                                    <th style="color:#fff;">Placa externa</th>
                                    <th style="color:#fff;">Serial</th>
                                    <th style="color:#fff;">Contrato reacionado</th>
                                    <th style="color:#fff;">Objeto Contractual</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Cantidad actual</th>
                                    <th style="color:#fff;">Cantidad total</th>
                                    <th style="color:#fff;">Precio unitario</th>
                                    <th style="color:#fff;">Precio Total</th>
                                    <th style="color:#fff;">Fecha Creacion</th>
                                    <th style="color:#fff;">Codigo QR</th>
                                    @can('editar-Usuario')
                                        <th style="color:#fff;">acciones</th>
                                    @endcan
                                </thead>
                                <tbody>
                                    @foreach ($elementoinventarios as $elementoinventario)
                                        <tr>
                                            <td style="display: none;">{{ $elementoinventario->id }}</td>
                                            <td>{{ $elementoinventario->nombreelemento }}</td>
                                            <td>{{ $elementoinventario->placainterna }}</td>
                                            <td>{{ $elementoinventario->placaexterna }}</td>
                                            <td>{{ $elementoinventario->serial }}</td>
                                            <td>{{ $elementoinventario->numero }}</td>
                                            <td>{{ $elementoinventario->objetocontractual }}</td>
                                            <td>{{ $elementoinventario->nombreestado }}</td>
                                            <td>{{ $elementoinventario->cantidad }}</td>
                                            <td>{{ $elementoinventario->cantidadtotal }}</td>
                                            <td>{{ $elementoinventario->preciounitario }}</td>
                                            <td>{{ $elementoinventario->preciototal }}</td>
                                            <td>{{ $elementoinventario->created_at }}</td>

                                            <td>

                                                {{$miQr = QrCode::
                                                size(100) //defino el tamaño
                                                ->backgroundColor(250, 240, 215) //defino el fondo
                                                ->color(0, 0, 0)
                                                ->margin(1) //defino el margen
                                                ->generate($elementoinventario->id)}}



                                            </td>


                                            <td>
                                                <form id="eliminar" class="eliminar"
                                                    action="{{ route('elementosinv.destroy', $elementoinventario->id) }}"
                                                    method="POST">



                                                    @if ($elementoinventario->consumible == 'si')
                                                        @can('editar-Usuario')
                                                            <a class="btn btn-info"
                                                                href="{{ route('elementosinv.edit', $elementoinventario->id) }}">Añadir</a>
                                                        @endcan
                                                    @endif
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-rol')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('¿Está seguro que desea eliminar este registro?')">Borrar</button>
                                                    @endcan


                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">

                            </div>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </section>
@endsection
