@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edita Contrato</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
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

                            {!! Form::model($contrato, ['method' => 'PATCH', 'route' => ['contratos.update', $contrato->id]]) !!}
                            @csrf


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Numero de Contrato</label>
                                    <select class="form-control" name="numero" id="numero">
                                        <option value="{{ $contrato->numero }}"> {{ $contrato->numero }}</option>
                                    </select>

                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Objeto Contractual</label>
                                    <select class="form-control" name="objetocontractual" id="objetocontractual">
                                        <option value="{{ $contrato->numero }}"> {{ $contrato->objetocontractual }}
                                        </option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Costo</label>
                                    <input type="text" name="costo" class="form-control"
                                        value="{{ $contrato->costo }}">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Forma de pago</label>
                                    <br>
                                    <textarea type="text" rows="3" cols="55" name="formadepago">{{ $contrato->formadepago }}
                                            </textarea>
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Lugar de entrega</label>
                                    <br>
                                    <textarea type="text" rows="3" cols="55" name="lugarentrega"> {{ $contrato->lugarentrega }}
                                            </textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Plazo para la entrega</label>
                                    <br>
                                    <textarea type="text" rows="3" cols="55" name="plazoentrega"> {{ $contrato->plazoentrega }}
                                            </textarea>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-floating">
                                    <label for="contenido">Otras condiciones</label>
                                    <br>
                                    <textarea type="text" rows="3" cols="55" name="otrascondiciones">{{ $contrato->otrascondiciones }}
                                            </textarea>
                                </div>
                            </div>

                            <a class="btn btn-success" href="/Archivos/{{ $contrato->pdf }}" target="blank_">Ver documento
                                actual</a>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input class="form-check-input" type="checkbox" value="si" id="finalizado"
                                        name="finalizado">
                                    <label class="form-check-label" for="">
                                        Finalizado?
                                    </label>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>




                    <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
