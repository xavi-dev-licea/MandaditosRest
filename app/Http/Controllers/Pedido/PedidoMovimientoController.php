<?php

namespace APIMandaditos\Http\Controllers\Pedido;

use APIMandaditos\Pedido;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class PedidoMovimientoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pedido $pedido)
    {
        $movimientos = $pedido->movimientos;

        return $this->showAll($movimientos);
    }
}
