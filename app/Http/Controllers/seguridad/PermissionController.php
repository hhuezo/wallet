<?php

namespace App\Http\Controllers\seguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\seguridad\PermissionFormRequest;
use DB;

use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' );
    }
    public function index(Request $request)
    {

        if ($request) {
            $permissions = Permission::get();
            return view('seguridad.permission.index', ["permissions" => $permissions]);
        }
    }
    public function create()
    {

        return view("seguridad.permission.create");
    }
    public function store(PermissionFormRequest $request)
    {
        $fecha = Carbon::parse('2021-01-01');
        $permission = Permission::create(['name' => $request->get('name'),'created_at' => $fecha,'updated_at' => $fecha]);
       /* $permission = new Permission;
        $permission->name = $request->get('name');
        $permission->guard_name = "web";
        $permission->save();*/
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('seguridad/permission/create');
    }
    public function show($id)
    {
        return view("seguridad.permission.show", ["permission" => Permission::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("seguridad.permission.edit", ["permission" => Permission::findOrFail($id)]);
    }
    public function update(PermissionFormRequest $request, $id)
    {
        $fecha = Carbon::createFromFormat('Y-d-m', '2021-01-01');

       // dd($fecha->format('Y-d-m H:i:s'));
        $permission = Permission::findOrFail($id);
        $permission->name = $request->get('name');
        $permission->updated_at =  $fecha;
        $permission->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('seguridad/permission/' . $id . '/edit');
    }
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('seguridad/permission');
    }
}
