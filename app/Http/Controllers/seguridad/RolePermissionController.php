<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function agregarPermisos(Request $request)
    {


        $permiso = Permission::findOrFail($request->get('Permiso'));
        $role = Role::findOrFail($request->get('Role'));

        $role->givePermissionTo($permiso->name);
        return redirect('seguridad/role/' . $request->get('Role') . '/edit');
    }

    public function eliminarPermisos(Request $request)
    {
        $permiso = Permission::findOrFail($request->get('Permiso'));
        $role = Role::findOrFail($request->get('Role'));
        $role->revokePermissionTo($permiso->name);

        return redirect('seguridad/role/' . $request->get('Role') . '/edit');
    }
}
