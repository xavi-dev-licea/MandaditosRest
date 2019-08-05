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
Route::resource('clientes.movimientos', 'Cliente\ClienteMovimientoController', ['only' => ['index']]);
Route::resource('clientes.mandaderos', 'Cliente\ClienteMandaderoController', ['only' => ['index']]);
Route::resource('clientes.pedidos', 'Cliente\ClientePedidoController', ['except' => ['create', 'show', 'edit']]);
/*
Rutas para los madaderos
*/
Route::resource('mandaderos', 'Mandadero\MandaderoController', ['only' => ['index', 'show']]);
Route::resource('mandaderos.movimientos', 'Mandadero\MandaderoMovimientoController', ['only' => ['index']]);
Route::resource('mandaderos.pedidos', 'Mandadero\MandaderoPedidoController', ['only' => ['index']]);
Route::resource('mandaderos.clientes', 'Mandadero\MandaderoClienteController', ['only' => ['index']]);
/*
Rutas para los pedidos
*/
Route::resource('pedidos', 'Pedido\PedidoController', ['only' => ['index', 'show']]);
Route::resource('pedidos.movimientos', 'Pedido\PedidoMovimientoController', ['only' => ['index', 'show']]);
Route::resource('pedidos.mandaderos', 'Pedido\PedidoMandaderoController', ['only' => ['index', 'show']]);
Route::resource('pedidos.mandaderos.movimientos', 'Pedido\PedidoMandaderoMovimientoController', ['only' => ['store']]);
/*
Rutas para los movimientos
*/
Route::resource('movimientos', 'Movimiento\MovimientoController', ['only' => ['index', 'show']]);
Route::resource('movimientos.clientes', 'Movimiento\MovimientoClienteController', ['only' => ['index']]);
/*
Rutas para los usuarios
*/
Route::resource('usuarios', 'User\UserController', ['except' => ['create', 'edit']]);
Route::name('verify')->get('users/verify/{token}', 'User\UserController@verify');
Route::name('resend')->get('users/{users}/resend', 'User\UserController@resend');