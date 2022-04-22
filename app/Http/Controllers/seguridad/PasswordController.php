<?php

namespace App\Http\Controllers\catalogo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $usuario = auth()->user();
            return view('catalogo.usuario.password', ['usuario' => $usuario]);
        }
    }


    public function update(Request $request, $id)
    {

        if ($request->get('Password') == $request->get('Password2')) {
            $users = User::findOrFail($id);
            $users->password = Hash::make($request->Password);
            $users->update();
            alert()->info('La contraseña ha sido modificada correctamente');
            $usuario = auth()->user();
            return view('catalogo.usuario.password', ['usuario' => $usuario]);
        } else {
            alert()->error('Las contraseñas no coinciden');
            $usuario = auth()->user();
            return view('catalogo.usuario.password', ['usuario' => $usuario]);
        }
    }
}
