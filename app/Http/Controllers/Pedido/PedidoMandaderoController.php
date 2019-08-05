<?php

namespace APIMandaditos\Http\Controllers\Pedido;

use APIMandaditos\Pedido;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class PedidoMandaderoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pedido $pedido)
    {
        $mandaderos = $pedido->movimientos()
            ->with('mandadero')
            ->get()
            ->pluck('mandadero')
            ->unique('id')
            ->values();

        return $this->showAll($mandaderos);
    }

    
    public function show($id)
    {
        //
    }
}
