<div>

    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Asignar Elemento de inventario</h3>
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





                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Empleado</label>
                                            <select class="form-control" name="responsable" id="responsable">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($respondependencias as $respondependencia)
                                                    <option value="{{ $respondependencia->id }}">
                                                        {{ $respondependencia->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


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
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <label for="contenido">Elemento</label>
                                                <select wire:model="selectedElementoinv" class="form-control"
                                                    name="elemento" id="elemento">
                                                    <option value=""> Seleccione.</option>
                                                    @foreach ($elemetarios as $elemetario)
                                                        <option value="{{ $elemetario->id }}">
                                                            {{ $elemetario->nombreelemento }}, Placa interna
                                                            {{ $elemetario->placainterna }} Placa externa
                                                            {{ $elemetario->placaexterna }} {{ $elemetario->des }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif



                                    @if ($eleinv)

                                        @if ($eleinv->consumible == 'si')
                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Cantidad</label>
                                                    <input type="text" name="cantidad" class="form-control"
                                                        value={{ $eleinv->cantidad }}>
                                                </div>
                                            </div>

                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Cantidad Maxima disponible:</label>
                                                    <label> {{ $eleinv->cantidad }} </label>
                                                    <input name="cantidadmaxima"  id="cantidadmaxima"
                                                        value={{ $eleinv->cantidad}}>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-sm-3 ">
                                                <div class="form-group">
                                                    <label for="titulo">Cantidad</label>
                                                    <select class="form-control" name="cantidad" id="estado">
                                                        <option value="{{ $eleinv->cantidad }}">
                                                            {{ $eleinv->cantidad }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

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
