@extends ('layouts.menu')
@section ('contenido')
<script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>

<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="x_title">
            <h2>Modificación de roles</h2>

            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">


            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {!!Form::model($role,['method'=>'PATCH','route'=>['role.update',$role->id]])!!}
            {{Form::token()}}
            <br />


            <div class="form-group">
                <label class="col-sm-3 control-label">Nombre</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" name="name" class="form-control" value="{{$role->name}}">
                </div>
            </div>

            <div class="form-group" align="center">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <a href="{{url('seguridad/role')}}"><button type="button" class="btn btn-danger">Cancelar</button></a>
            </div>

            {!!Form::close()!!}




        </div>
    </div>
</div>


<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="x_title">
            <h2>Permisos</h2>

            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <form method="POST" action="{{ url('seguridad/role/addPermisos') }}">
            {{Form::token()}}

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
                <input type="hidden" name="Role" id="rol" value="{{$role->id}}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Permiso</label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <select name="Permiso" class="form-control select2">
                            @foreach ($permisos as $obj)
                            <option value="{{$obj->id}}">{{$obj->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <button class="btn btn-success" type="submit">Agregar</button>
                    </div>
                </div>

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th><i class="fa fa-trash"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permisos_actuales as $obj)
                        <tr>
                            <td align="center">{{ $obj->id}}</td>
                            <td>{{ $obj->name}}</td>
                            <td align="center">
                                <i class="fa fa-trash" onclick="modal(<?php echo $obj->id; ?>);"></i>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>








        <!-- Modal eliminar permiso -->
        <div class="modal fade" id="modal_borrar_permiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-tipo="1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="../deletePermisos" method="POST">
                        {{Form::token()}}
                        <div class="modal-header">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <input type="hidden" id="role" name="Role">
                        <input type="hidden" id="permiso" name="Permiso">

                        <div class="modal-body">
                            <div class="box-body">

                                ¿Desea eliminar el archivo?
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>









    </div>
    @include('sweet::alert')

    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>

    <script type="text/javascript">
        function modal(id) {
            document.getElementById('permiso').value = id;
            document.getElementById('role').value = document.getElementById('rol').value;

            $('#modal_borrar_permiso').modal('show');

        }
    </script>
</div>

@endsection
