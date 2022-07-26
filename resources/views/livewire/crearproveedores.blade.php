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
                                            @if ($error == 'The numero has already been taken.')
                                                El numero de contrato ingresado, ya cuenta con un registro en el año
                                                vigente
                                                @else{{ $error }}
                                            @endif
                                        </span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('proveedores.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <div class="col-sm-12 ">
                                        <div class="form-group">
                                            <label for="contenido">Identidicacion</label>
                                            <select class="form-control" name="identificacion" id="identificacion">
                                                <option value="0"> Seleccione.</option>
                                                <option value="1">CC</option>
                                                <option value="2">NIT</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Numero</label>
                                            <input type="text" name="numero" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="contenido">Tipo de Proveedor</label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value=""> Seleccione.</option>
                                                @foreach ($tipoproveedores as $tipoproveedor)
                                                    <option value="{{ $tipoproveedor->id }}">
                                                        {{ $tipoproveedor->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Nombre del Proveedor</label>
                                            <input type="text" name="nombreproveedor" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Direccion</label>
                                            <input type="text" name="direccion" class="form-control">
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Correo</label>
                                            <input type="text" name="correo" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-floating">
                                            <label for="contenido">Telefono</label>
                                            <input type="text" name="telefono" class="form-control">
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
