<?php

namespace APIMandaditos\Http\Controllers\Movimiento;

use Illuminate\Http\Request;
use APIMandaditos\Movimiento;
use APIMandaditos\Http\Controllers\ApiController;

class MovimientoClienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Movimiento $movimiento)
    {
        $cliente = $movimiento->pedido->cliente;

        return $this->showOne($cliente);
    }
}
