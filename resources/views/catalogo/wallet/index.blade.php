@extends ('layouts.menu')
@section('contenido')

<div class="x_panel">
    <div class="clearfix"></div>

    <script src="{{ asset('vendors/sweetalert/sweetalert.min.js') }}"></script>

    <div class="x_title">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h2>Listado de wallets </h2>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12" align="right">
            <a href="{{ url('catalogo/wallet/create') }}"><button class="btn btn-info float-right"> <i class="fa fa-plus"></i> Nuevo</button></a>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="clearfix"></div>



    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @if ($wallets->count() > 0)
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $obj)
                    <tr>
                        <td align="center">{{ $obj->Id }}</td>
                        <td>{{ $obj->Nombre }}</td>
                        <td align="center">
                            <a href="{{ URL::action('catalogo\WalletController@edit', $obj->Id) }}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                            &nbsp;&nbsp;
                            <a href="" data-target="#modal-delete-{{ $obj->Id }}" data-toggle="modal"><i class="fa fa-trash"></i></a>

                        </td>
                    </tr>
                    @include('catalogo.wallet.modal')
                    @endforeach
                </tbody>
            </table>

            <div class="clearfix"></div>
            @endif
        </div>

        @include('sweet::alert')

    </div>
</div>

@endsection
