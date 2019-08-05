<?php

namespace APIMandaditos\Http\Controllers\Cliente;

use APIMandaditos\Cliente;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class ClienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::has('pedidos')->get();

        return $this->showAll($clientes);
    }

    public function show(Cliente $cliente)
    {
        return $this->showOne($cliente);
    }
}
