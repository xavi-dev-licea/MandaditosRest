<?php

namespace APIMandaditos\Http\Controllers\Pedido;

use APIMandaditos\Pedido;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class PedidoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return $this->showAll($pedidos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return $this->showOne($pedido);
    }
}
