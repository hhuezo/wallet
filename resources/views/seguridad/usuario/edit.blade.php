@extends ('layouts.menu')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_panel">
        <div class="row">
            <div class="x_title">
                <h2>Modificación de usuarios</h2>

                <ul class="nav navbar-right panel_toolbox">

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($usuario, ['method' => 'PATCH', 'route' => ['usuario.update', $usuario->id]]) !!}
                {{ Form::token() }}
                <br />

                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="name" value="{{ $usuario->name }}" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Usuario</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="user" class="form-control" value="{{ $usuario->user }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Clave</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="password" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Correo</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="email" value="{{ $usuario->email }}" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>



                <div class="form-group">
                    <label class="col-sm-3 control-label">Rol</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="rol" class="form-control">
                            @foreach ($roles as $obj)
                                @if ($obj->id == $rol_actual)
                                    <option value="{{ $obj->name }}" selected
                                        {{ old('rol') == $obj->id ? 'selected' : '' }}>{{ $obj->name }}</option>
                                @else
                                    <option value="{{ $obj->name }}" {{ old('rol') == $obj->id ?: '' }}>
                                        {{ $obj->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="form-group">
                    <label class="col-sm-3 control-label">Dui</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Dui" data-inputmask="'mask': ['99999999-9']" value="{{ $usuario->Dui }}" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Banco</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="Banco" class="form-control">
                            <option value="">NO APLICA</option>
                            @foreach ($bancos as $obj)
                                @if ($obj->Id = $usuario->Banco)
                                <option value="{{ $obj->Id }}" selected>
                                    {{ $obj->Nombre }}</option>
                                @else
                                <option value="{{ $obj->Id }}">
                                    {{ $obj->Nombre }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Numero cuenta</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Cuenta" value="{{ $usuario->Cuenta }}" class="form-control">
                    </div>
                    <label class="col-sm-3 control-label">&nbsp;</label>
                </div>


                <div class="form-group" align="center">
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="{{ url('seguridad/usuario/') }}"><button class="btn btn-primary"
                            type="button">Cancelar</button></a>
                </div>








                {!! Form::close() !!}


            </div>
            @include('sweet::alert')
        </div>



    </div>




    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript">


        function eliminarTallerUnidad(Id) {

            document.getElementById('IdTallerUnidad').value = Id;

            $('#modal_borrar_taller_unidad').modal('show');


        }

        function eliminarAlmacenUnidad(Id) {

            document.getElementById('IdAlmancenUnidad').value = Id;

            $('#modal_borrar_almacen_unidad').modal('show');


        }
    </script>






@endsection
