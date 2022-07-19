@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Realizar traslado de elemento Empleados</h3>
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

                            {!! Form::model($movimientoinv, ['method' => 'PATCH', 'route' => ['movimientoinvs.update', $movimientoinv->id]]) !!}


                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Responsable Actual</label>
                                    <select class="form-control">
                                        <option value="{{ $movimientoinv->responsable }}">
                                            {{ $movimientoinv->nombre }}/{{ $movimientoinv->nombredependencia }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Movimiento</label>
                                    <select class="form-control" name="movimiento" id="movimiento">
                                        <option value="">Seleccione.
                                        </option>

                                        <option value=1 >Traslado
                                        </option>
                                        <option value=2 > Salida
                                        </option>
                                    </select>
                                </div>
                            </div>





                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Nuevo Responsable</label>
                                    <select class="form-control" name="responsablenuevo" id="responsablenuevo">
                                        <option value=""> Seleccione.</option>
                                        @foreach ($respondependencias as $respondependencia)
                                        @if($respondependencia->id == $movimientoinv->responsable )
                                        @else
                                        <option value="{{ $respondependencia->id }}">
                                            {{ $respondependencia->nombre }} / {{ $respondependencia->nombredependencia }}
                                        </option>
                                        @endif

                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Elemento Asignado</label>
                                    <select class="form-control" >
                                        <option value="{{ $movimientoinv->elemento }}">
                                            {{ $movimientoinv->nombreelemento }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Responsable Actual</label>
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

                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Precio unitario</label>
                                    <select class="form-control" >
                                        <option value="{{ $movimientoinv->preciounitario }}">
                                            {{ $movimientoinv->preciounitario }}
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-3 ">
                                <div class="form-group">
                                    <label for="titulo">Placas y referencia</label>
                                    <select class="form-control" >
                                        <option value=>
                                            {{ $movimientoinv->placainterna }}/{{ $movimientoinv->placaexterna }} - {{ $movimientoinv->serial }}
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Realiza el movimiento</label>
                                        <option value= {{ $movimientoinv->usuario}}>

                                            @foreach ($users as $user)
                                            @if ($movimientoinv->usuario == $user->id)
                                                {{ $user->name }}
                                            @endif
                                        @endforeach
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Realizar</button>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
