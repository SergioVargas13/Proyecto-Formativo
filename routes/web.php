<?php

use Illuminate\Support\Facades\Auth;
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
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/cambiarClave', function() {
    return view('auth.passwords.reset');
});
//Route::get('/panaderia','PanaderiaController@index');
//Route::get('/panaderia/create','PanaderiaController@create');

Route::resource('panaderia','PanaderiaController')->middleware('auth');

Route::middleware('auth')->resource('user', 'UserController');

Route::middleware('auth')->resource('role', 'RoleController');
Route::middleware('auth')->post('user/cambiarRole', 'UserController@cambiarRole');
Route::middleware('auth')->post('user/guardarRole', 'UserController@guardarRole');

Route::middleware('auth')->resource('materia_prima', 'materia_primaController');
Route::middleware('auth')->get('addmateria_prima/{materia_prima}','materia_primaController@addmateria_prima')->name('materia_prima.addmateria_prima');

Route::middleware('auth')->resource('cifs', 'CifsController');
Route::middleware('auth')->get('addcifs/{cifs}','CifsController@addcifs')->name('cifs.addcifs');


Route::middleware('auth')->resource('gestion_usuario', 'Gestion_usuarioController');
Route::resource('mano_de_obra','ManoDeObraController')->middleware('auth');

Route::middleware('auth')->resource('producto_terminado', 'ProductoTerminadoController');

Route::middleware('auth')->resource('ficha_tecnica', 'FichaTecnicaController');
Route::middleware('auth')->get('addficha_tecnica/{ficha_tecnica}','FichaTecnicaController@addficha_tecnica')->name('ficha_tecnica.addficha_tecnica');

Route::middleware('auth')->get('addMateriaPrima/{ficha_tecnica_id}','FichaTecnicaController@addMateriaPrima')->name('ficha_tecnica.addMateriaPrima');
Route::middleware('auth')->post('saveMateriaPrima','FichaTecnicaController@saveMateriaPrima');
Route::middleware('auth')->delete('deleteMateriaPrima/{ficha_tecnica_id}/{materia_prima_id}','FichaTecnicaController@deleteMateriaPrima')->name('ficha_tecnica.deleteMateriaPrima');

Route::middleware('auth')->get('addManoObra/{ficha_tecnica_id}','FichaTecnicaController@addManoObra')->name('ficha_tecnica.addManoObra');
Route::middleware('auth')->post('saveManoObra','FichaTecnicaController@saveManoObra');
Route::middleware('auth')->delete('deleteManoObra/{ficha_tecnica_id}/{mano_de_obra_id}','FichaTecnicaController@deleteManoObra')->name('ficha_tecnica.deleteManoObra');
Route::middleware('auth')->get('calcularCosto/{ficha_tecnica_id}','FichaTecnicaController@calcularCosto')->name('ficha_tecnica.calcularCosto');



Route::middleware('auth')->get('nombre', function(){
	//echo var_dump(Auth::user()->roles()->get());
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
