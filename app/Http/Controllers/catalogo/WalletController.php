<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\Wallet;
use Illuminate\Support\Facades\Redirect;

class WalletController extends Controller
{
    public function __construct()
    {
    }


    public function index(Request $request)
    {
        if ($request) {
            $wallets = Wallet::where('Activo', '=', '1')->get();
            return view('catalogo.wallet.index', ['wallets' => $wallets]);
        }
    }

    public function create()
    {
        return view('catalogo.wallet.create');
    }

    public function store(Request $request)
    {
        $wallet = new Wallet;
        $wallet->Nombre = $request->get('Nombre');
        $wallet->Activo = '1';
        $wallet->save();
        alert()->success('El registro ha sido agregado correctamente');
        return Redirect::to('catalogo/wallet/create');
    }

    public function show($id)
    {
        return view('catalogo.wallet.show', ['wallet' => Wallet::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('catalogo.wallet.edit', ['wallet' => Wallet::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->Nombre = $request->get('Nombre');
        $wallet->update();
        alert()->info('El registro ha sido modificado correctamente');
        return redirect('catalogo/wallet/' . $id . '/edit');
    }

    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->Activo = '0';
        $wallet->update();
        alert()->error('El registro ha sido eliminado correctamente');
        return Redirect::to('catalogo/wallet');
    }
}
