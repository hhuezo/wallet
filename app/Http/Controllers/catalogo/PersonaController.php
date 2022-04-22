<?php

namespace App\Http\Controllers\catalogo;

use App\catalogo\Banco;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catalogo\Persona;
use Illuminate\Support\Facades\Redirect;

use App\User;
use App\Role;

class PersonaController extends Controller
{
    public function __construct()
    {
    }


    public function index(Request $request)
    {
        if ($request) {
            $personas = Persona::get();
            return view('seguridad.persona.index', ['personas' => $personas]);
        }
    }

    public function create()
    {
        $roles = Role::where('id','=',2)->get();
        $bancos = Banco::where('Activo','=',1)->get();
        return view('seguridad.persona.create', [ 'roles' => $roles, 'bancos' => $bancos]);
    }

    public function store(Request $request)
    {
        $persona = new Persona;
        $persona->Nombre = $request->get('Nombre');
        $persona->Activo = '1';
        $persona->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/persona/create');
    }

    public function show($id)
    {
        return view('seguridad.persona.show', ['persona' => Persona::findOrFail($id)]);
    }

    public function edit($id)
    {
        $roles = Role::where('id','=',2)->get();
        return view('seguridad.persona.edit', ['persona' => Persona::findOrFail($id), 'roles' => $roles]);
    }

    public function update(Request $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->Nombre = $request->get('Nombre');
        $persona->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/persona/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->Activo = '0';
        $persona->update();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/persona');
    }
}
