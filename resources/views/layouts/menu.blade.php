<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Operaciones</title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

    <!--filtro por columna-->
    <script src="{{ asset('vendors/datatables.net/js/jquery-35.js') }}"></script>


</head>


@cannot('es vigilante')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">


                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('img/usuario.jpg') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{ auth()->user()->user }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->


                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Operaciones</h3>
                            <ul class="nav side-menu">
                                @can('read users')
                                <li><a><i class="fa fa-users"></i> Seguridad <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('seguridad/usuario/') }}">Usuario</a></li>
                                        <li><a href="{{ url('seguridad/persona/') }}">Persona</a></li>
                                        <li><a href="{{ url('seguridad/role/') }}">Roles</a></li>
                                        <li><a href="{{ url('seguridad/permission/') }}">Permisos</a></li>
                                    </ul>
                                </li>


                                <li>
                                    <a><i class="fa fa-folder"></i> Catalogos<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('catalogo/banco/') }}">Banco</a></li>
                                        <li><a href="{{ url('catalogo/wallet/') }}">Wallet</a></li>
                                        <li><a href="{{ url('catalogo/vehiculo/') }}">Vehiculo</a></li>
                                        <li><a href="{{ url('catalogo/mecanico/') }}">Mecanico</a></li>
                                        <li><a href="{{ url('catalogo/modelo/') }}">Modelo</a></li>
                                        <li><a href="{{ url('catalogo/reporte_falla/') }}">Reporte falla</a></li>

                                    </ul>

                                </li>


                                <li>
                                    <a><i class="fa fa-folder"></i> Catalogos almacén<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">

                                        <li><a href="{{ url('catalogo/articulo/') }}">Articulo</a></li>
                                        <li><a href="{{ url('catalogo/orden_compra/') }}">Orden de compra</a></li>
                                        <li><a href="{{ url('catalogo/cuenta/') }}">Cuenta</a></li>
                                        <li><a href="{{ url('catalogo/medida/') }}">Medida</a></li>
                                        <li><a href="{{ url('catalogo/proveedor/') }}">Proveedor</a></li>
                                        <li><a href="{{ url('catalogo/cargo/') }}">Cargo</a></li>
                                    </ul>

                                </li>

                                @endcan


                                <li>
                                    <a><i class="fa fa-folder"></i>Almacén<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">


                                        @can('read solicitud')
                                        <li><a href="{{ url('almacen/solicitud/') }}">Solicitud</a></li>
                                        @endcan

                                        @can('read almacen')
                                        <li><a href="{{ url('almacen/entrada/create/') }}">Entrada</a></li>
                                        <li><a href="{{ url('almacen/salida/create/') }}">Salida</a></li>
                                        <li><a href="{{ url('almacen/acta/create/') }}">Acta de recepción</a></li>
                                        <li><a href="{{ url('almacen/historico/') }}">Historico</a></li>
                                        @endcan
                                    </ul>

                                </li>

                                <li>
                                    <a><i class="fa fa-folder"></i>Reportes Almacen<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('almacen/reporte/liquidacion') }}">Liquidación</a></li>
                                        <li><a href="{{ url('taller/salida_vehiculo') }}">Salida de vehículo</a></li>
                                    </ul>

                                </li>
                                @can('read taller')

                                <li>
                                    <a><i class="fa fa-folder"></i>Taller<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('taller/solicitud') }}">Solititud de taller</a></li>
                                        <li><a href="{{ url('taller/salida_vehiculo') }}">Salida de vehículo</a></li>
                                    </ul>

                                </li>


                                @endcan


                                @can('read empleados')
                                <li>
                                    <a><i class="fa fa-user"></i> Empleados<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('catalogo/empleado/') }}">Empleado</a></li>
                                        <li><a href="{{ url('index_foto') }}">Empleado con Foto</a></li>
                                        @can('read empleados')
                                        <li><a href="{{ url('empleado/prestacion') }}">Prestación</a></li>
                                        @endcan
                                        <li><a>Catalogos<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @can('read cargo_funcional')
                                                <li><a href="{{ url('catalogo/cargo_funcional/') }}">Cargo funcional
                                                        mp</a></li>
                                                @endcan
                                                @can('read cargo_funcional')
                                                <li><a href="{{ url('catalogo/cargo_nominal_hacienda/') }}">Cargo
                                                        nominal hacienda</a></li>
                                                @endcan
                                                @can('read nivel_academico')
                                                <li><a href="{{ url('catalogo/nivel_academico/') }}">Nivel
                                                        academico</a></li>
                                                @endcan
                                                @can('catalogos empleados')
                                                <li><a href="{{ url('catalogo/banco/') }}">Banco</a></li>
                                                @can('read motivo_retiro')
                                                <li><a href="{{ url('catalogo/motivo_retiro/') }}">Motivo de
                                                        retiro</a>
                                                </li>
                                                @endcan
                                                @can('read oficina')
                                                <li><a href="{{ url('catalogo/oficina/') }}">Oficina</a></li>
                                                @endcan

                                                @can('read prevision')
                                                <li><a href="{{ url('catalogo/prevision/') }}">Prevision</a></li>
                                                @endcan

                                                @can('read profesion')
                                                <li><a href="{{ url('catalogo/profesion/') }}">Profesion</a></li>
                                                @endcan

                                                @can('read tipo_oficina')
                                                <li><a href="{{ url('catalogo/tipo_oficina/') }}">Tipo oficina</a>
                                                </li>
                                                @endcan

                                                @can('read tipo_plaza')
                                                <li><a href="{{ url('catalogo/tipo_plaza/') }}">Tipo plaza</a></li>
                                                @endcan

                                                @can('read tipo_plaza')
                                                <li><a href="{{ url('catalogo/sede/') }}">Sedes</a></li>
                                                @endcan
                                                @endcan

                                            </ul>
                                        </li>
                                        <li><a>Reportes<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{ url('reportes/reporte_general') }}"> Maestro de
                                                        personal</a></li>
                                                <li><a href="{{ url('reportes/reporte_prestacion') }}">Reporte de
                                                        Prestaciones</a></li>
                                                <li><a href="{{ url('reportes/reporte_contratos') }}">Imprimir
                                                        Contratos</a></li>
                                                <li><a href="{{ url('reporte/ficha_empleado') }}">Ficha Empleado</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>@endcan
                                @can('read marcaciones')
                                <li><a><i class="fa fa-check-square-o"></i> Marcaciones<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('marcaciones/index_usuarios/') }}">Usuarios</a></li>
                                        @can('create permiso')
                                        <li><a href="{{ url('marcaciones/ingreso_permiso/') }}">Ingreso de
                                                permisos</a></li>
                                        @endcan
                                        @can('importar marcaciones')
                                        <li><a href="{{ url('marcaciones/trama/') }}">Importar marcaciones</a></li>
                                        @endcan
                                        @can('read horas extras')
                                        <li><a href="{{ url('marcaciones/horas_extras/') }}">Horas extras</a></li>
                                        @endcan
                                        @can('read calendario')
                                        <li><a href="{{ url('marcaciones/calendario/') }}">Calendario</a></li>
                                        <li><a href="{{ url('marcaciones/configuracion/') }}">Configuracion</a></li>
                                        @endcan

                                        @can('read incapacidades')
                                        <li class="sub_menu"><a href="{{ url('marcaciones/incapacidad/') }}">
                                                Incapacidades</a></li>
                                        @endcan

                                        @can('read users')
                                        <!--permiso temporal-->
                                        <li class="sub_menu"><a href="{{ url('marcaciones/marcaciones/') }}">
                                                Marcaciones</a></li>
                                        @endcan
                                        @can('create userss')
                                        <li><a href="{{ url('marcaciones/configuracion/') }}">Configuracion anual</a>
                                        </li>
                                        <li><a href="{{ url('marcaciones/tipo_permiso/') }}">Tipo permiso</a></li>
                                        <li><a href="{{ url('marcaciones/permiso/') }}">Permisos</a></li>
                                        @endcan

                                        <li><a>Consultas<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @can('reporte horas extras')
                                                <li class="sub_menu"><a href="{{ url('marcaciones/consulta_permiso/') }}">
                                                        Permisos</a></li>
                                                @endcan

                                                @can('reporte horas extras')
                                                <li class="sub_menu"><a href="{{ url('marcaciones/consulta_marcaciones/') }}">
                                                        Marcaciones</a></li>
                                                @endcan

                                            </ul>
                                        </li>
                                        <li><a>Reportes<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @can('reporte horas extras')
                                                <li class="sub_menu"><a href="{{ url('reportes/fipl25/') }}">
                                                        Impresion de FIPL 25</a></li>
                                                <li class="sub_menu"><a href="{{ url('reportes/reporte_horas_extras/') }}"> Horas
                                                        extras</a></li>
                                                <li class="sub_menu"><a href="{{ url('reportes/reporte_descuento/') }}">
                                                        Descuentos</a></li>

                                                <li class="sub_menu"><a href="{{ url('reportes/reporte_marcacion/') }}">
                                                        Marcaciones</a></li>

                                                @can('read users')
                                                <li class="sub_menu"><a href="{{ url('reportes/reporte_intermedias/') }}">
                                                        Marcaciones
                                                        Intermedias
                                                    </a></li>
                                                @endcan
                                                <li class="sub_menu"><a href="{{ url('reportes/reporte_consolidado_permisos/') }}">
                                                        Permisos por tipo y género</a></li>
                                                @endcan
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                @endcan
                                @can('ingreso permiso')
                                <li><a href="{{ url('marcaciones/ingreso_permiso_publico/') }}"><i class="fa fa-plus"></i> Ingreso de permisos</a>
                                <li><a href="{{ url('reportes/reporte_emision') }}"><i class="fa fa-file-text"></i>Reporte de permisos</a></li>
                                @endcan
                                @can('conf evaluador')
                                <li><a><i class="fa fa-file-text"></i>Evaluación Desempeño<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a>Evaluacion<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{ url('evaluacion/evaluacion_laboral') }}">Evaluacion</a>
                                                </li>
                                                @can('read users')
                                                <li class="sub_menu"><a href="{{ url('evaluacion/personal_condicion/') }}">
                                                        Evaluacion con Condicion</a></li>
                                                @endcan
                                                <li class="sub_menu"><a href="{{ url('evaluacion/detalle_evaluacion/') }}">
                                                        Evaluación Detalle</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/accion_mejora/') }}">
                                                        Accion Mejora</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/actitud_trabajo/') }}">
                                                        Actitud Trabajo</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/evaluacion_capacitacion/') }}">
                                                        Capacitacion</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/temas_capacitacion/') }}">
                                                        Temas de Capacitación</a></li>
                                            </ul>
                                        </li>
                                        <li><a>Seguridad<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{ url('evaluacion/asignacion') }}">Asignación</a></li>
                                                <li><a href="{{ url('evaluacion/asignacion_empleado') }}">Empleado
                                                        por
                                                        Oficina</a></li>
                                            </ul>
                                        </li>
                                        @can('read users')
                                        <li><a>Catalogo<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li class="sub_menu"><a href="{{ url('evaluacion/tipo_evaluacion') }}">Tipo
                                                        Evaluacion</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/factor_valorizacion/') }}">
                                                        Factor Valorizacion</a></li>
                                                <li class="sub_menu"><a href="{{ url('evaluacion/punto_evaluacion/') }}">
                                                        Punto Evaluacion</a></li>

                                                <li class="sub_menu"><a href="{{ url('evaluacion/axo/') }}">
                                                        Año</a></li>

                                            </ul>
                                        </li>
                                        @endcan

                                        <li><a>Reportes<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="{{ url('evaluacion/reportes') }}">Reportes</a></li>
                                                <li><a href="{{ url('evaluacion/reporte_evaluacion') }}">Reporte
                                                        Evaluacion</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                @endcan

                                @can('read capacitacion')
                                <li><a><i class="fa fa-edit"></i> Capacitaciones<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('capacitaciones/capacitacion/') }}">Capacitacion</a></li>
                                        <li><a href="{{ url('capacitaciones/reportes/') }}">Reportes</a></li>
                                    </ul>
                                </li>
                                @endcan

                                @can('read empleados')
                                <li>
                                    <a><i class="fa fa-file-text-o"></i> Planillas<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('consultas/planilla/') }}">Consulta</a></li>
                                    </ul>
                                </li>
                                @endcan
                                @can('read consultas')
                                <li><a><i class="fa fa-search"></i> Consultas<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ url('consultas/busqueda/') }}">Consulta de empleados</a></li>
                                        <li><a href="{{ url('consultas/reporte/') }}">Reporte</a></li>
                                    </ul>
                                </li>
                                @endcan
                                @can('ex empleados')
                                <li><a href="{{ url('consultas/exempleados/') }}"><i class="fa fa-user-times"></i> Ex
                                        Empleados</a>

                                </li>
                                @endcan

                            </ul>
                        </div>
                        <!-- sidebar menu -->
                    </div>


                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('img/usuario.jpg') }}" alt="">{{ auth()->user()->user }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">


                                    <li> <a class="dropdown-item" href="{{ url('user/cambiar_contrasena') }}">
                                            {{ __('Cambiar Contraseña') }} <i style="padding-left: 33%;" class="fa fa-exchange"></i>
                                        </a>
                                    </li>
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Salir') }} <i style="padding-left: 81%;" class="fa fa-sign-out"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">

                @yield('contenido') <div class="x_content"></div>

            </div>
            <!-- /page content -->


        </div>
    </div>
</body>
@else

<body class="nav-md" style="background-color: #fff;">
    <div class="container body">


        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('img/usuario.jpg') }}" alt="">{{ auth()->user()->user }}
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">



                                <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }} <i style="padding-left: 81%;" class="fa fa-sign-out"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="x_panel" role="main">

            @yield('contenido') <div class="x_content"></div>

        </div>
        <!-- /page content -->


    </div>
    @endcannot

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>

    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>

    <!-- mascara de entrada -->
    <script src="{{ asset('vendors/input-mask/jquery.inputmask.js') }}"></script>





</body>
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Dui
        $('[data-mask]').inputmask()
    });
</script>

</html>
