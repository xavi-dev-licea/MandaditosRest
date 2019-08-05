<?php

namespace APIMandaditos\Http\Controllers\Mandadero;

use APIMandaditos\Mandadero;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class MandaderoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mandaderos = Mandadero::has('movimientos')->get();

        return $this->showAll($mandaderos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mandadero $mandadero)
    {

        return $this->showOne($mandadero);
    }
}
