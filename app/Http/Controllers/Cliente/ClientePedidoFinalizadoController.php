<?php

namespace APIMandaditos\Http\Controllers\Cliente;

use APIMandaditos\Pedido;
use APIMandaditos\Cliente;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\Controller;
use APIMandaditos\Http\Controllers\ApiController;

class ClientePedidoFinalizadoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $pedidos = $cliente->pedidos()
                ->where('status', '=', Pedido::PEDIDO_FINALIZADO)
                ->get();


        return $this->showAll($pedidos);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
