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
*/

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::resource('almacen/categoria','CategoriaController');
Route::resource('almacen/producto','ProductoController');
Route::resource('mantenimiento/nivel','NivelController');
Route::resource('mantenimiento/tipo_habitacion','TipoHabitacionController');
Route::resource('mantenimiento/habitacion','HabitacionController');
Route::resource('almacen/TipoCliente','TipoClienteController');
Route::resource('reserva/clientes','ClienteController');
Route::resource('d/d','Cliente2Controller');//ruta alterna
Route::get('reserva/registro/{id}/create', 'ReservaController@CrearReserva');
Route::resource('reserva/registro','ReservaController');
// Controlador Extra
Route::resource('salidas/verificacion','SalidaController');
Route::resource('ventas/consumo','ConsumoController');
// para el reporte de los Listados de la Reserva
Route::get('reserva/listar-registro/{id}/report', 'LReservaController@report');
Route::resource('reserva/listar-registro','LReservaController');
Route::resource('ventas/listar-consumo','LConsumoController');
Route::resource('reporte/ingresos','ReporteController');
Route::resource('acceso/usuario','UsuarioController');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


