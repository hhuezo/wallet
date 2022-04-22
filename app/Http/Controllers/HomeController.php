<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usurio = auth()->user();
        $validar = $usurio->can('es vigilante');

        if($validar==false){
            return view('home');
        }
        else{
            return Redirect::to('taller/salida_vehiculo/');
           // return view('taller.salida_vehiculo');
        }

    }
}
