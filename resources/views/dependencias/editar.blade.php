@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar dependencia</h3>
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

                            {!! Form::model($dependencia, ['method' => 'PATCH', 'route' => ['dependencias.update', $dependencia->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">codigo:</label>
                                        <option value="{{ $dependencia->id }}">{{ $dependencia->id }}
                                        </option>
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">nombre:</label>
                                        <br />
                                        {!! Form::text('nombredependencia', null, ['class' => 'form-control']) !!}

                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="contenido">Compañia</label>
                                        <select class="form-control" name="compania" id="compania">
                                            @foreach ($companias as $compania)
                                                @if ($compania->id == $dependencia->compania)
                                                    <option value="{{ $compania->id }}"> {{ $compania->nombrecompania }}
                                                @endif
                                            @endforeach

                                            @foreach ($companias as $compania)
                                                @if ($compania->id == $dependencia->Compania)
                                                @else
                                                    <option value="{{ $compania->id }}">
                                                        {{ $compania->nombrecompania }}</option>
                                                    </option>
                                                @endif>
                                            @endforeach
                                        </select>
                                    </div>
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
