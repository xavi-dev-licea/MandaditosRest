<?php

namespace APIMandaditos\Http\Controllers\Mandadero;

use APIMandaditos\Mandadero;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class MandaderoMovimientoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Mandadero $mandadero)
    {
        $movimientos = $mandadero->movimientos;

        return $this->showAll($movimientos);
    }
}
