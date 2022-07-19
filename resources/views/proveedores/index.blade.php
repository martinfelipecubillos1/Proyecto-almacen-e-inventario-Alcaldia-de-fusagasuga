@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Proveedores </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-Usuario')
                        <a class="btn btn-warning" href="/crearproveedores"> Nuevo proveedor </a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Codigo</th>
                                    <th style="color:#fff;">Identificacion</th>
                                    <th style="color:#fff;">Numero</th>
                                    <th style="color:#fff;">Tipo</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Direcion</th>
                                    <th style="color:#fff;">Correo</th>
                                    <th style="color:#fff;">Telefono</th>
                                    <th style="color:#fff;">Contactos Union</th>
                                    <th style="color:#fff;">acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($Proveedores as $Proveedor)
                            <tr>
                                <td style="display: none;">{{ $Proveedor->id }}</td>
                                <td>{{ $Proveedor->id }}</td>
                                <td>{{ $Proveedor->identificacion }}</td>
                                <td>{{ $Proveedor->numero }}</td>
                                <td>{{ $Proveedor->nombre}}</td>
                                <td>{{ $Proveedor->nombreproveedor }}</td>
                                <td>{{ $Proveedor->direccion }}</td>
                                <td>{{ $Proveedor->correo }}</td>
                                <td>{{ $Proveedor->telefono }}</td>
                                <td>
                                    @if ($Proveedor->tipo == 3)
                                    <a class="btn btn-info" href="{{ route('contactosproveedor.show', $Proveedor->id) }}" >Contactos</a>
                                    @else
                                    no aplica
                                    @endif


                                </td>
                                <td>

                                    <form action="{{ route('proveedores.destroy',$Proveedor->id,) }}" method="POST">
                                        @can('editar-Usuario')
                                        <a class="btn btn-info" href="{{ route('proveedores.edit', $Proveedor->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-Compania')
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
                            {!! $Proveedores->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
