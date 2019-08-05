<?php

namespace APIMandaditos\Http\Controllers\Mandadero;

use APIMandaditos\Mandadero;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class MandaderoClienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mandadero $mandadero)
    {
        $clientes = $mandadero->movimientos()->with('pedido.cliente')
            ->get()
            ->pluck('pedido.cliente')
            ->unique('id')
            ->values();

        return $this->showAll($clientes);
    }
}
