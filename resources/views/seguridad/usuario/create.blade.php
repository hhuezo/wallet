@extends ('layouts.menu')
@section('contenido')
    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>
    <div class="x_panel">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">

                <div class="x_title">
                    <h2>Nuevo usuario <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="x_content">
                    <br />
                    {!! Form::open(['url' => 'seguridad/usuario', 'method' => 'POST', 'autocomplete' => 'off']) !!}
                    {{ Form::token() }}

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Nombre</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="name" class="form-control" onblur="value=value.toUpperCase()"
                                autofocus="true">
                        </div>
                        <label class="col-sm-3 control-label">&nbsp;</label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Usuario</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="user" class="form-control">
                        </div>
                        <label class="col-sm-3 control-label">&nbsp;</label>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Clave</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="password" value="12345" class="form-control">
                        </div>
                        <label class="col-sm-3 control-label">&nbsp;</label>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Correo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" name="email" class="form-control" required="true"
                                onblur="this.value = this.value.toLowerCase();">
                        </div>
                        <label class="col-sm-3 control-label">&nbsp;</label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Rol</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="rol" class="form-control">
                                @foreach ($roles as $obj)
                                    @if ($obj->id == 2)
                                        <option value="{{ $obj->name }}"
                                            {{ old('rol') == $obj->id ? 'selected' : '' }} selected>{{ $obj->name }}</option>
                                    @else
                                        <option value="{{ $obj->name }}"
                                            {{ old('rol') == $obj->id ? 'selected' : '' }}>{{ $obj->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Dui</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="Dui" data-inputmask="'mask': ['99999999-9']" class="form-control">
                        </div>
                        <label class="col-sm-3 control-label">&nbsp;</label>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Banco</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="Banco" class="form-control">
                                <option value="">NO APLICA</option>
                                @foreach ($bancos as $obj)
                                    <option value="{{ $obj->Id }}" {{ old('Banco') == $obj->Id ? 'selected' : '' }}>
                                        {{ $obj->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Numero cuenta</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="Cuenta" class="form-control">
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

            </div>
            @include('sweet::alert')
        </div>
    </div>
@endsection
