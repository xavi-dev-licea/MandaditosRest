<?php

namespace APIMandaditos\Http\Controllers\Cliente;

use APIMandaditos\Cliente;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class ClienteMovimientoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
         $movimientos = $cliente->pedidos()
            ->whereHas('movimientos')
            ->with('movimientos')
            ->get()
            ->pluck('movimientos')
            ->collapse();

        return $this->showAll($movimientos);
    }
}
