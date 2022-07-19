@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Contactos de la Union Libre </h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-unidad')
                                <a class="btn btn-warning" href="{{ route('contactosproveedor.edit', $id) }}">Nuevo contacto</a>
                            @endcan

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Codigo</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Numero</th>
                                    <th style="color:#fff;">Direcion</th>
                                    <th style="color:#fff;">Correo</th>
                                    <th style="color:#fff;">Telefono</th>
                                    <th style="color:#fff;">acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($contactos as $contacto)
                                        <tr>
                                            <td>{{ $contacto->id }}</td>
                                            <td>{{ $contacto->nombreempresa }}</td>
                                            <td>{{ $contacto->numero }}</td>
                                            <td>{{ $contacto->direccion }}</td>
                                            <td>{{ $contacto->correo }}</td>
                                            <td>{{ $contacto->telefono }}</td>
                                            <td>

                                                <form action="{{ route('contactosproveedor.destroy', $contacto->id) }}"
                                                    method="POST">
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
