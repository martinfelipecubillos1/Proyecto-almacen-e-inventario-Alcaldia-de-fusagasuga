@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Elemento</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif

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

                            <form action="{{ route('elementos.store') }}" method="POST">
                                @csrf

                                <select hidden  name="codigosubgrupo" id="codigosubgrupo">
                                    @foreach ($Subgrupos as $Subgrupo)
                                    @if ($Subgrupo->id == $id)
                                    <option   value="{{ $Subgrupo->id}}">


                                    </option>  @endif
                                        @endforeach
/<select>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Nombre</label>
                                            <input type="text" name="nombreelemento" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">marca</label>
                                                <input type="text" name="marca" id="marca" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Descripcion</label>
                                            <br>
                                            <textarea type="text" rows="10" cols="127" name="descripcion" >

                                            </textarea>
                                        </div>
                                    </div>

                        <br>
                        <button type="submit" class="btn btn-primary" onclick="return confirm('¿Está seguro que desea Guardar este Elemento?')">Guardar</button>

                </form>
            </div>
        </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
@endsection
