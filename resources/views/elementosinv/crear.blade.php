@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Añadir Elemento al inventario</h3>
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

                    <form action="{{ route('elementosinv.store') }}" method="POST">
                        @csrf
                        <div class="row">


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">elementos</label>
                                    <select class="form-control" name="elemento" id="elemento">
                                        <option value=""> Seleccione.</option>
                                        @foreach ($elementos as $elemento)
                                            <option value="{{$elemento->id}}">{{$elemento->nombreelemento}}, {{$elemento->descripcion}}</option>
                                            @endforeach
                                    </select>

                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Contratos y Donaciones</label>
                                    <select class="form-control" name="contrato" id="contrato">
                                        <option value=""> Contratos</option>
                                        @foreach ($contratos as $contrato)
                                        @if ($contrato->finalizado ==true)
                                            @else
                                        <option value="{{$contrato->id}}">{{$contrato->id}} </option>
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
                                   <label for="titulo">Cantidad</label>
                                   <input type="text" name="cantidad" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Precio Unitario</label>
                                    <input  class="form-control" type="text" name="preciounitario">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Placa interna</label>
                                    <input  class="form-control" type="text" name="placainterna">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Placa externa</label>
                                    <input  class="form-control" type="text" name="placainterna">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Placainterna</label>
                                    <input  class="form-control" type="text" name="placaexterna">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="contenido">Serial o Referencia</label>
                                    <input  class="form-control" type="text" name="serial">
                                </div>
                            </div>


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
@endsection
