<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Role;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\seguridad\RoleFormRequest;
use App\Permission;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {

      /*  $a = Permission::get();
        $string = "[";
        foreach($a as $obj)
        {
            $string = $string."'". $obj->name."',";
        }
        $string = substr($string,0,-1)."]";
        echo $string;*/

        if ($request) {
            $roles = Role::get();
            return view('seguridad.role.index', ["roles" => $roles]);
        }
    }
    public function create()
    {
        return view("seguridad.role.create");
    }
    public function store(RoleFormRequest $request)
    {
        $role = new Role;
        $role->name = $request->get('name');
        $role->guard_name = "web";
        $role->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('seguridad/role/create');
    }
    public function show($id)
    {
        return view("seguridad.role.show", ["role" => Role::findOrFail($id)]);
    }
    public function edit($id)
    {
        $rol =  Role::findOrFail($id);
        $permisos = Permission::get();
        $permisos_actuales = $rol->rolePermissions;
        //  dd($permisos_actuales)  ;
        return view("seguridad.role.edit", ["role" => Role::findOrFail($id), "permisos" => $permisos, "permisos_actuales" => $permisos_actuales]);
    }
    public function update(RoleFormRequest $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('seguridad/role/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('seguridad/role');
    }
}
