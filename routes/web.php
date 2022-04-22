<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});

Route::resource('seguridad/medida', 'seguridad\MedidaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//seguridad
Route::resource('seguridad/usuario', 'seguridad\UsersController');
Route::resource('seguridad/password', 'seguridad\PasswordController');
Route::resource('seguridad/role', 'seguridad\RoleController');
Route::post('seguridad/role/deletePermisos', 'seguridad\RolePermissionController@eliminarPermisos');
Route::post('seguridad/role/addPermisos', 'seguridad\RolePermissionController@agregarPermisos');
Route::resource('seguridad/permission', 'seguridad\PermissionController');
Route::resource('seguridad/persona', 'catalogo\PersonaController');


//catalogos
Route::resource('catalogo/banco', 'catalogo\BancoController');
Route::resource('catalogo/wallet', 'catalogo\WalletController');


