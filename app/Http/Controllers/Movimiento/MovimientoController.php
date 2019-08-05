<?php

namespace APIMandaditos\Http\Controllers\Movimiento;

use Illuminate\Http\Request;
use APIMandaditos\Movimiento;
use APIMandaditos\Http\Controllers\ApiController;

class MovimientoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::all();

        return $this->showAll($movimientos);
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento)
    {
        return $this->showOne($movimiento);
    }
}
