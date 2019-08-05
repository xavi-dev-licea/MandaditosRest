<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Rutas para los clientes
*/
Route::resource('clientes', 'Cliente\ClienteController', ['only' => ['index', 'show']]);
/*
Rutas para los madaderos
*/
Route::resource('mandaderos', 'Mandadero\MandaderoController', ['only' => ['index', 'show']]);
/*
Rutas para los pedidos
*/
Route::resource('pedidos', 'Pedido\PedidoController', ['only' => ['index', 'show']]);
/*
Rutas para los movimientos
*/
Route::resource('movimientos', 'Movimiento\MovimientoController', ['only' => ['index', 'show']]);
/*
Rutas para los usuarios
*/
Route::resource('usuarios', 'User\UserController', ['except' => ['create', 'edit']]);