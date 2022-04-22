<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\catalogo\Banco;
use Illuminate\Support\Facades\Redirect;

class BancoController extends Controller
{
    public function __construct()
    {
    }


    public function index(Request $request)
    {
        if ($request) {
            $bancos = Banco::where('Activo', '=', '1')->get();
            return view('catalogo.banco.index', ['bancos' => $bancos]);
        }
    }

    public function create()
    {
        return view('catalogo.banco.create');
    }

    public function store(Request $request)
    {
        $banco = new Banco;
        $banco->Nombre = $request->get('Nombre');
        $banco->Activo = '1';
        $banco->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/banco/create');
    }

    public function show($id)
    {
        return view('catalogo.banco.show', ['banco' => Banco::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('catalogo.banco.edit', ['banco' => Banco::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $banco = Banco::findOrFail($id);
        $banco->Nombre = $request->get('Nombre');
        $banco->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/banco/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $banco = Banco::findOrFail($id);
        $banco->Activo = '0';
        $banco->update();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/banco');
    }
}
