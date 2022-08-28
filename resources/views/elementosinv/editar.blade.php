@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Añadir Elemento del inventarios
            </h3>
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
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($elementoinventario, ['method' => 'PATCH', 'route' => ['elementosinv.update', $elementoinventario->id]]) !!}


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">elemento</label>
                                    @foreach ($elementos as $elemento)
                                        @if ($elemento->id == $elementoinventario->elemento)
                                            <input style="visibility:hidden " readonly='readonly' type="text" name="elemento" id="elemento"
                                                value="{{ $elemento->id }}">
                                            <br>
                                            {{ $elemento->nombreelemento }} </input>
                                        @endif
                                    @endforeach
                                </div>
                            </div>


                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="contenido">Empleado Responsable Actual</label>
                                <input type='text' readonly='readonly' class="form-control" value='{{$elementoinventario->nombre}}'>
                                </div>
                            </div>


                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label  for="contenido">Empleado Responsable</label>
                                    <select class="form-control" " type="text" name="responsable" id="responsable">
                                        <option value=""> Seleccione.</option>
                                        @foreach ($respondependencias as $respondependencia)
                                        @if($respondependencia->id == $elementoinventario->responsable)
                                        @else
                                            <option value="{{ $respondependencia->id }}">
                                                {{ $respondependencia->nombre }}
                                            </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Contrato</label>
                                    <select class="form-control" name="contrato" id="contrato">
                                        @foreach ($contratos as $contrato)
                                            @if ($contrato->id == $elementoinventario->contrato)
                                                <option value="{{ $contrato->id }}"> {{ $contrato->numero }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Estado</label>
                                    <select class="form-control" name="estado" id="estado">

                                        @foreach ($estados as $estado)
                                            @if ($estado->id == $elementoinventario->estado)
                                                <option value="{{ $estado->id }}">{{ $estado->nombreestado }} </option>
                                            @endif
                                        @endforeach


                                        @foreach ($estados as $estado)
                                            @if ($estado->id == $elementoinventario->estado)
                                            @else
                                                <option value="{{ $estado->id }}">{{ $estado->nombreestado }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    @if ($elementoinventario->consumible == '')
                                        <label for="titulo">Cantidad</label>
                                        <select class="form-control" name="cantidad" id="cantidad">
                                            <option value="{{ $elementoinventario->cantidad }}">
                                                {{ $elementoinventario->cantidad }} </option>
                                        </select>
                                    @else
                                        <label for="titulo">Cantidad actual:{{ $elementoinventario->cantidad }}</label>
                                        <input type="text" name="cantidad" class="form-control">
                                    @endif
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Precio unitario</label>
                                    <select class="form-control" name="preciounitario" id="preciounitario">
                                                <option value="{{ $elementoinventario->preciounitario }}"> {{ $elementoinventario->preciounitario }}</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
