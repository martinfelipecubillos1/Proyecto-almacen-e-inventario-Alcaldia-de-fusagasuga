<div>
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Contrato</h3>
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
                                        <span class="badge badge-danger">
                                            @if($error == "The numero has already been taken.")
                                             El numero de contrato ingresado, ya cuenta con un registro en el año vigente
                                        @else{{ $error }}
                                        @endif
                                        </span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('contratos.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Numero de Contrato</label>
                                        <input type="text" name="numero" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Objeto Contractual</label>
                                        <input type="text" name="objetocontractual" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <a class="nav-link inline" style="float: right"
                                            href="/crearproveedores"> <i
                                                class="fas fa-plus-circle"></i><span>Añadir</span>
                                        </a>
                                        <label for="contenido">Proveedores</label>
                                        <select class="form-control" name="proveedor" id="proveedor">
                                            <option value=""> Seleccione.</option>
                                            @foreach ($provedores as $provedore)
                                                <option value="{{ $provedore->id }}">
                                                    {{ $provedore->nombreproveedor }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="contenido">Dependencias</label>
                                        <select class="form-control" name="dependencia" id="dependencia">
                                            <option value=""> Seleccione.</option>
                                            @foreach ($dependencias as $dependencia)
                                                <option value="{{ $dependencia->id }}">
                                                    {{ $dependencia->nombredependencia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 ">
                                    <div class="form-group">
                                        <label for="contenido">Tipo de Documento</label>
                                        <select wire:model="selectedOption" class="form-control">
                                            <option value="0"> Seleccione.</option>
                                            <option value="1">Contrato</option>
                                            <option value="2">Donacion</option>
                                        </select>
                                    </div>
                                </div>
                                @if ($selectedOption != null)
                                    @if ($Contratos != null)
                                        <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="contenido">Tipo de Contrato</label>
                                                <select class="form-control" name="tipodecontrato" id="tipodecontrato">
                                                    <option value=""> Seleccione.</option>
                                                    @foreach ($Contratos as $Contrato)
                                                        <option value="{{ $Contrato->id }}">
                                                            {{ $Contrato->tipodecontrato }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($Donaciones != null)
                                    <div class="col-sm-12 ">
                                            <div class="form-group">
                                                <label for="contenido">Tipo de Contrato</label>
                                                <select class="form-control" name="tipodedonacion" id="tipodedonacion">
                                                    <option value=""> Seleccione.</option>
                                                    @foreach ($Donaciones as $Donacion)
                                                        <option value="{{ $Donacion->id }}">
                                                            {{ $Donacion->tipodedonacion }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endif
                                @endif









                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Costo</label>
                                        <input type="text" name="costo" class="form-control">
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Forma de pago</label>
                                        <br>
                                        <textarea type="text" rows="3" cols="55" name="formadepago">
                                            </textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Lugar de entrega</label>
                                        <br>
                                        <textarea type="text" rows="3" cols="55" name="lugarentrega">
                                            </textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Plazo para la entrega</label>
                                        <br>
                                        <textarea type="text" rows="3" cols="55" name="plazoentrega">
                                            </textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Otras condiciones</label>
                                        <br>
                                        <textarea type="text" rows="3" cols="55" name="otrascondiciones">
                                            </textarea>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-floating">
                                        <label for="contenido">Adjunar pdf</label>
                                        <input type="file" name="pdf" class="form-control">

                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>


                    </form>

                    </div>

                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>
