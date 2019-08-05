<?php

namespace APIMandaditos\Http\Controllers\Mandadero;

use APIMandaditos\Mandadero;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class MandaderoPedidoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mandadero $mandadero)
    {
        $pedidos = $mandadero->movimientos()->with('pedido')
                ->get()
                ->pluck('pedido');


        return $this->showAll($pedidos);
    }
}
