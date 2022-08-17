@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Contratos Y Donaciones</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if(session()->has('message'))
                            @if(session()->get('message') == 0)
                            <div class="alert alert-danger">
                                Archivo no encontrado en el servidor
                            </div>
                            @else
                            <div class="alert alert-success">
                                Archivo Descargado
                            </div>
                            @endif
                        @endif


                            @can('crear-Usuario')
                                <a class="btn btn-warning" href="/crearcontratos">Nuevo Contrato o Donacion </a><br>
                            @endcan
<br>
                            <div class="row" style="overflow-x:auto">
                                <table class="table">
                                    <thead style="background-color:#6777ef">
                                        <th style="color:#fff;">id</th>
                                        <th style="color:#fff;">Numero</th>
                                        <th style="color:#fff;">Objeto Contractual</th>
                                        <th style="color:#fff;">Proveedor</th>
                                        <th style="color:#fff;">Dependencia</th>
                                        <th style="color:#fff;">Tipo de contrato</th>
                                        <th style="color:#fff;">Costo</th>
                                        <th style="color:#fff;">Forma de pago</th>
                                        <th style="color:#fff;">Lugar de entrega</th>
                                        <th style="color:#fff;">Plazo entrega</th>
                                        <th style="color:#fff;">Otras condiciones</th>
                                        <th style="color:#fff;">Finalizado</th>
                                        <th style="color:#fff;">Documento adjunto</th>
                                        <th style="color:#fff;">Acciones</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($Contras as $Contra)
                                            <tr>
                                                <td>{{ $Contra->id }}</td>

                                                <td>{{ $Contra->numero }}</td>

                                                <td>{{ $Contra->objetocontractual }}</td>
                                                <td>{{ $Contra->nombreproveedor }}</td>
                                                <td>{{ $Contra->nombredependencia }}</td>
                                                <td>{{ $Contra->tipodecontrato}} {{ $Contra->tipodedonacion}} </td>
                                                <td>{{ $Contra->costo }}</td>
                                                <td>{{ $Contra->formadepago }}</td>
                                                <td>{{ $Contra->lugarentrega }}</td>
                                                <td>{{ $Contra->plazoentrega }}</td>
                                                <td>{{ $Contra->otrascondiciones }}</td>
                                                <td>
                                                    @if ($Contra->finalizado == false)
                                                        <label class="form-check-label" for="">Activo
                                                        @else
                                                            <label class="form-check-label" for="">Finalizado
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-success"href="{{ route('contratos.show', $Contra->id) }}"
                                                        target="blank_">Descargar</a>
                                                     </td>
                                                <td>
                                                    <form action="{{ route('contratos.destroy', $Contra->id) }}"
                                                        method="POST">
                                                        @can('editar-Usuario')
                                                        <a class="btn btn-info"
                                                            href="{{ route('contratos.edit', $Contra->id) }}">Editar</a>
                                                            @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-dependencia')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination justify-content-end">
                                {!! $Contras->links() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
