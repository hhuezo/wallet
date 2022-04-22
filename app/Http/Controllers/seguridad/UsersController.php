<?php

namespace App\Http\Controllers\seguridad;

use App\catalogo\UnidadAdministrativa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Role;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\seguridad\UsersFormRequest;
use App\taller\TallerUserUnidad;
use App\almacen\AlmacenUserUnidad;
use App\catalogo\Banco;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (auth()->user()->can('read users')) {
            if ($request) {

                $usuarios = User::get();

                return view('seguridad.usuario.index', ['usuarios' => $usuarios]);
            }
        } else {
            abort(403);
        }
    }

    public function create()
    {
        if (auth()->user()->can('create users')) {
            $roles = Role::get();
            $bancos = Banco::where('Activo','=',1)->get();
            return view('seguridad.usuario.create', ['roles' => $roles,'bancos' => $bancos]);
        } else {
            abort(403);
        }
    }

    public function store(UsersFormRequest $request)
    {
        $fecha = Carbon::parse('2021-01-01');
        $usuario = new User;
        $usuario->name = $request->get('name');
        $usuario->user = $request->get('user');
        $usuario->email = $request->get('email');
        $usuario->password = Hash::make($request->password);
        $usuario->created_at =   $fecha;
        $usuario->updated_at = $fecha;
        $usuario->assignRole($request->get('rol'));
        if($request->get('Banco') != null)
        {
            $usuario->Banco = $request->get('Banco');
        }

        $usuario->Dui = $request->get('Dui');
        $usuario->Cuenta = $request->get('Cuenta');
        $usuario->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('seguridad/usuario/create');
    }

    public function show($id)
    {
        return view('seguridad.usuario.show', ['users' => User::findOrFail($id)]);
    }

    public function edit($id)
    {
        if (auth()->user()->can('edit users')) {
            $roles = Role::get();
            $bancos = Banco::where('Activo','=',1)->get();

            $usuario =  User::findOrFail($id);
            $rol = $usuario->usersRoles()->first();
            $rol_actual = $rol->id;



            return view('seguridad.usuario.edit', [
                'usuario' => User::findOrFail($id), 'roles' => $roles, 'rol_actual' => $rol_actual, 'bancos' => $bancos
            ]);
        } else {
            abort(403);
        }
    }

    public function update(UsersFormRequest $request, $id)
    {
        $fecha = Carbon::parse('2021-01-01');
        $users = User::findOrFail($id);
        if ($request->get('password') == '') {

            $users->name = $request->get('name');
            $users->user = $request->get('user');
            $users->email = $request->get('email');
            if($request->get('Banco') != null)
            {
                $users->Banco = $request->get('Banco');
            }

            $users->Dui = $request->get('Dui');
            $users->Cuenta = $request->get('Cuenta');
        } else {

            $users->name = $request->get('name');
            $users->user = $request->get('user');
            $users->email = $request->get('email');
            $users->password = Hash::make($request->get('password'));
            $users->updated_at = $fecha;
            if($request->get('Banco') != null)
            {
                $users->Banco = $request->get('Banco');
            }

            $users->Dui = $request->get('Dui');
            $users->Cuenta = $request->get('Cuenta');

        }
        //$users->updated_at = Carbon::now();
        $rol = $users->usersRoles()->first();
        $rol_actual = $rol->name;
        $users->removeRole($rol_actual);

        $users->assignRole($request->get('rol'));

        $users->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('seguridad/usuario/' . $id . '/edit');
    }

    public function destroy($id)
    {
        if (auth()->user()->can('delete users')) {

            $usuario =  User::findOrFail($id);
            $rol =  $usuario->usersRoles()->first();
            $rol_actual = $rol->id;

            $usuario->removeRole($rol_actual);

            $usuario->delete();
            alert()->error('El registro ha sido eliminado correctamente');
            return Redirect::to('seguridad/usuario');
        } else {
            alert()->error('No tiene permisos para realizar esta accion');
            return Redirect::to('seguridad/usuario');
        }
    }


    public function agregarUnidadTaller(Request $request)
    {
        $usuario_taller = new TallerUserUnidad;
        $usuario_taller->Usuario = $request->get('Usuario');
        $usuario_taller->UnidadAdministrativa = $request->get('UnidadAdministrativa');
        $usuario_taller->save();
        alert()->success('El registro ha sido agregado correctamente');
        return redirect('seguridad/usuario/' . $request->get('Usuario') . '/edit');
    }

    public function agregarUnidadAlmacen(Request $request)
    {
        $usuario_taller = new AlmacenUserUnidad;
        $usuario_taller->Usuario = $request->get('Usuario');
        $usuario_taller->UnidadAdministrativa = $request->get('UnidadAdministrativa');
        $usuario_taller->save();
        alert()->success('El registro ha sido agregado correctamente');
        return redirect('seguridad/usuario/' . $request->get('Usuario') . '/edit');
    }

    public function eliminarUnidadTaller(Request $request)
    {
        $unidad = TallerUserUnidad::findOrFail($request->get('Id'));
        $unidad->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return redirect('seguridad/usuario/' . $unidad->Usuario . '/edit');
    }


    public function eliminarUnidadAlmacen(Request $request)
    {
        $unidad = AlmacenUserUnidad::findOrFail($request->get('Id'));
        $unidad->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return redirect('seguridad/usuario/' . $unidad->Usuario . '/edit');
    }


}
