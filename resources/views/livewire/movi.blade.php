<div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reasignar Elemento de inventario</h3>
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
                                    @if ($error ="The supera field is required.")
                                    <span class="badge badge-danger"> La cantidad solisitada supera el tope del inventario</span>
                                    @else
                                    <span class="badge badge-danger">{{ $error }}</span>
                                    @endif
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('movimientoinvs.store') }}" method="POST">
                                @csrf
                                <div class="row">


                                    <div class="col-sm-3 ">
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
                                        <div class="col-sm-3 ">
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
                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="contenido">Elementos</label>
                                                    <select wire:model="selectedElemento" class="form-control">
                                                        <option value="0"> Seleccione.</option>
                                                        @foreach ($Elementos as $Elemento)
                                                            <option value="{{ $Elemento->id }}">
                                                                {{ $Elemento->nombreelemento }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        @endif
                                    @endif

                                    @if ($selectedElemento)

                                    <div class="col-sm-3 ">
                                        <div class="form-group">
                                            <label for="contenido">Empleado</label>
                                            <select wire:model="selectedresponsable" class="form-control">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($respondependencias as $respondependencia)
                                                    <option value="{{ $respondependencia->id }}">
                                                        {{ $respondependencia->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="contenido">Elemento</label>
                                                <select wire:model="selectedElementoinv" class="form-control"
                                                    name="elemento" id="elemento">
                                                    <option value=""> Seleccione.</option>
                                                    @foreach ($elemetarios as $elemetario)
                                                        <option value="{{ $elemetario->id }}">
                                                            Nombre: {{ $elemetario->nombreelemento }}//
                                                            Responsable: {{ $elemetario->nombre }}//
                                                            Placa interna{{ $elemetario->placainterna }}//
                                                            Placa externa{{ $elemetario->placaexterna }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif



                                    @if ($eleinv)


                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Cantidad</label>
                                                    <input class="form-control" readonly='readonly' name="cantidad" id="estado" value={{ $eleinv->cantidad }}>

                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <label for="contenido">Reasignar a:</label>
                                                    <select class="form-control" name="responsable" id="responsable">
                                                        <option value=""> Seleccione.</option>
                                                        @foreach ($respondependencias as $respondependencia)
                                                        @if ($selectedresponsable == $respondependencia->id || $respondependencia->id == $elemetario->responsable )

                                                        @else
                                                        <option value="{{ $respondependencia->id }}">
                                                            {{ $respondependencia->nombre }}
                                                        </option>
                                                        @endif

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Estado del elemento</label>
                                                    <select class="form-control" name="estado" id="estado">
                                                        <option value="">Seleccione.
                                                        </option>
                                                        @foreach ( $estados as $estado )
                                                        <option value={{$estado->id}} > {{$estado->nombreestado}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-9 ">
                                                <div class="form-group">
                                                    <label for="titulo">Observaciones</label>
                                                    <textarea class="form-control" name="observaciones" id="observaciones"> {{$eleinv->observaciones}}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Movimiento</label>
                                                    <select class="form-control" name="tipomovimiento" id="tipomovimiento">
                                                        <option value="">Seleccione.
                                                        </option>

                                                        <option value=4 >Traspaso
                                                        </option>
                                                        <option value=5 > Salida
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>


                                    @endif


                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <input name="usuario" hidden id="usuario"
                                                value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">

                                        </div>
                                    </div>

                                    <input name="actualiza" hidden id="actualiza"
                                        value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">




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
