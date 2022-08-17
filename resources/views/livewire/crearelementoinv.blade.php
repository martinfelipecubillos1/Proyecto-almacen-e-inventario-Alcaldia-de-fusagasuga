<div>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Elemento a inventario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        @if ($error == 'The repeticion field is required.')
                                            <span class="badge badge-danger">Una de las placas esta repitiendo el numero
                                                de otra placa ya asignada en la base de datos</span>
                                        @elseif ($error=='The repeticiondelementoconsumible field is required.')
                                        <span class="badge badge-danger">El elemento que desea crear como consumible ya tiene un registro de consumo con dicho contrato en la base de datos</span>
                                        @else
                                            <span class="badge badge-danger">{{ $error }}</span>
                                        @endif
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('elementosinv.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-sm-4 ">
                                        <div class="form-group">
                                            <label for="contenido">Grupo de elementos</label>
                                            <select wire:model="selectedGrupo" class="form-control">
                                                <option value="0"> Seleccione.</option>
                                                @foreach ($grupos as $grupo)
                                                    <option value="{{ $grupo->id }}">{{ $grupo->nombregrupo }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    @if (count($Subgrupos) != 0)
                                        <div class="col-sm-4 ">
                                            <div class="form-group">
                                                <label for="contenido">Subgrupo de elementos</label>
                                                <select wire:model="selectedSubgrupo" class="form-control">
                                                    <option value="0"> Seleccione.</option>
                                                    @foreach ($Subgrupos as $Subgrupo)
                                                        <option value="{{ $Subgrupo->id }}">
                                                            {{ $Subgrupo->nombresubgrupo }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        @if (count($Elementos) != 0)
                                            <div class="col-sm-4 ">
                                                <div class="form-group">
                                                    <label for="contenido">Elementos</label>
                                                    <select class="form-control" name="elemento" id="elemento">
                                                        <option value="0"> Seleccione.</option>
                                                        @foreach ($Elementos as $Elemento)
                                                            <option value="{{ $Elemento->id }}">
                                                                {{ $Elemento->nombreelemento }},
                                                                {{ $Elemento->descripcion }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        @endif
                                    @endif


                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <input wire:model="selectedconsumible" class="form-check-input" type="checkbox" value=true
                                                name="consumible"> ¿Es consumile?
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Contratos y Donaciones</label>
                                            <select class="form-control" name="contrato" id="contrato">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($contratos as $contrato)
                                                    @if ($contrato->finalizado == true)
                                                    @else
                                                        <option value="{{ $contrato->id }}">
                                                            {{ $contrato->numero }},
                                                            {{ $contrato->objetocontractual }} </option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Estado</label>
                                            <select class="form-control" name="estado" id="estado">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($estados as $estado)
                                                    <option value="{{ $estado->id }}">{{ $estado->nombreestado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Observaciones</label>
                                            <input class="form-control" type="text" name="observaciones">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Empleado</label>
                                            <select class="form-control" name="responsable" id="responsable">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($respondependencias as $respondependencia)
                                                @if ($respondependencia->activo == true)
                                                <option value="{{ $respondependencia->id }}">
                                                    {{ $respondependencia->nombre }}- {{$respondependencia->nombredependencia}}
                                                                                                        </option>
                                                @endif

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="titulo">Cantidad</label>
                                            <input type="text" name="cantidad" class="form-control" value=1>
                                        </div>
                                    </div>



                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Precio Unitario</label>
                                            <input class="form-control" type="text" name="preciounitario">
                                        </div>
                                    </div>

                                    @if ($selectedconsumible == null)
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Placa interna</label>
                                            <input class="form-control" type="text" name="placainterna"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Placa externa</label>
                                            <input class="form-control" type="text" name="placaexterna">

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Serial o Referencia</label>
                                            <input class="form-control" type="text" name="serial">
                                        </div>
                                    </div>

                                    @endif

                                    <br>
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
