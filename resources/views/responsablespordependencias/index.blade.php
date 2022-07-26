@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading"> Empleados </h3>
        </div>
        <div class="section-body">
            <div class="row">


                <div class="col-lg-12">

                    <form action="{{ route('responsablespordependencias.index') }}" method="get">

                        <select class="form" name="texto" id="texto" onchange="this.form.submit()">
                            @if ($texto == '')
                                <option value="">Selecciona la dependencia a buscar
                                @else
                                    @foreach ($dependencias as $dependencia)
                                        @if ($texto == $dependencia->id)
                                <option value="">{{ $dependencia->nombredependencia }}
                                        @endif
                                    @endforeach
                            @endif

                            @foreach ($dependencias as $dependencia)
                                @if ($texto == $dependencia->id)
                                <option value="">Selecciona la dependencia a buscar
                                @else
                                    <option value="{{ $dependencia->id }}">{{ $dependencia->nombredependencia }}
                                    </option>
                                @endif
                            @endforeach

                        </select>


                    </form>
                </div>


                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @can('crear-Usuario')
                                <a class="btn btn-warning" href="{{ route('responsablespordependencias.create') }}">Nuevo</a>
                            @endcan

                            <h3>Activos</h3>

                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">

                                    <th style="color:#fff;">nombre</th>
                                    <th style="color:#fff;">cargo</th>
                                    <th style="color:#fff;">dependencia</th>
                                    <th style="color:#fff;">jefe</th>
                                    @can('editar-Usuario')
                                        <th style="color:#fff;">acciones</th>
                                    @endcan
                                </thead>
                                <tbody>
                                    @if(count($responsablespordependencias) <=0)
                                    <tr>

                                        <td> No hay registros entonctrados</td>


                                    </tr>
@else

                                    @foreach ($responsablespordependencias as $responsablespordependencia)
                                    @if ($responsablespordependencia->activo == "si")
                                        <tr>
                                            <td style="display: none;">{{ $responsablespordependencia->id }}</td>
                                            <td>{{ $responsablespordependencia->nombre }}</td>
                                            <td>{{ $responsablespordependencia->cargo }}</td>
                                            <td>{{ $responsablespordependencia->nombredependencia }}</td>
                                            <td>
                                                @if ($responsablespordependencia->jefe == '')
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="" checked disabled=false;>
                                                        <label class="form-check-label" for="">

                                                        </label>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('responsablespordependencias.destroy', $responsablespordependencia->id) }}"
                                                    method="POST">
                                                    @can('editar-Usuario')
                                                        <a class="btn btn-info"
                                                            href="{{ route('responsablespordependencias.edit', $responsablespordependencia->id) }}">Editar</a>
                                                    @endcan
                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-rol')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                @endif
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">

                            </div>
                        </div>
                    </div>

                    @if ($texto == '')
                    @else
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">




                                <h3>Inactivos</h3>

                                <table class="table table-striped mt-2">
                                    <thead style="background-color:#6777ef">

                                        <th style="color:#fff;">nombre</th>
                                        <th style="color:#fff;">cargo</th>
                                        <th style="color:#fff;">dependencia</th>
                                        <th style="color:#fff;">jefe</th>
                                        @can('editar-rol')
                                            <th style="color:#fff;">acciones</th>
                                        @endcan
                                    </thead>
                                    <tbody>
                                        @foreach ($responsablespordependencias as $responsablespordependencia)

                                        @if ($responsablespordependencia->activo == "")
                                            <tr>
                                                <td style="display: none;">{{ $responsablespordependencia->id }}</td>
                                                <td>{{ $responsablespordependencia->nombre }}</td>
                                                <td>{{ $responsablespordependencia->cargo }}</td>
                                                <td>{{ $responsablespordependencia->nombredependencia }}</td>
                                                <td>
                                                    @if ($responsablespordependencia->jefe == '')
                                                    @else
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="" checked disabled=false;>
                                                            <label class="form-check-label" for="">

                                                            </label>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('responsablespordependencias.destroy', $responsablespordependencia->id) }}"
                                                        method="POST">
                                                        @can('editar-dependencia')
                                                            <a class="btn btn-info"
                                                                href="{{ route('responsablespordependencias.edit', $responsablespordependencia->id) }}">Editar</a>
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('borrar-dependencia')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        @endcan
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Ubicamos la paginacion a la derecha -->

                            </div>
                        </div>
                    </div>
                        @endif







                </div>
            </div>
        </div>
    </section>
@endsection
