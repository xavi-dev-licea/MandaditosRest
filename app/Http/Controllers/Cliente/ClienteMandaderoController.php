<?php

namespace APIMandaditos\Http\Controllers\Cliente;

use APIMandaditos\Cliente;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class ClienteMandaderoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $mandadero = $cliente->pedidos()
            ->whereHas('movimientos')
            ->with('movimientos.mandadero')
            ->get()
            ->pluck('movimientos')
            ->collapse()
            ->pluck('mandadero')
            ->unique()
            ->values();

        return $this->showAll($mandadero);
    }
}
