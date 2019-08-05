<?php

namespace APIMandaditos\Http\Controllers\Cliente;

use APIMandaditos\User;
use APIMandaditos\Pedido;
use APIMandaditos\Cliente;
use Illuminate\Http\Request;
use APIMandaditos\Http\Controllers\ApiController;

class ClientePedidoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $pedidos = $cliente->pedidos;

        return $this->showAll($pedidos);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $cliente)
    {
        $rules = [
            'description' => 'required', 
            'date' => 'required',
            'ubication_origin' => 'required',
            'ubication_destiny' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();    

        $data['status'] = Pedido::PEDIDO_PENDIENTE;
        $data['date'] = $request->date;
        $data['cliente_id'] = $cliente->id;

        $pedido = Pedido::create($data);

        return $this->showOne($pedido, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente, Pedido $pedido)
    {
        $rules = [
            'description' => 'required',
            'status' => 'in: ' . Pedido::PEDIDO_PENDIENTE . ',' . Pedido::PEDIDO_ACEPTADO . ',' . Pedido::PEDIDO_FINALIZADO . ',' . Pedido::PEDIDO_RECHAZADO,
        ];

        $this->validate($request, $rules);

        $this->verificarVendedor($cliente, $pedido);

        $pedido->fill($request->only([
            'description',
            'date',
            'ubication_origin',
            'ubication_destiny',
        ]));

        if ($request->has('status')) {
            $pedido->status = $request->status;
        }


        if ($pedido->isClean()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        $pedido->save();

        return $this->showOne($pedido);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente, Pedido $pedido)
    {
        $this->verificarVendedor($cliente, $pedido);

        $pedido->delete();

        return $this->showOne($pedido);
    }

    //Función que verifica si es el vendedor del producto actual
    protected function verificarVendedor(Cliente $cliente, Pedido $pedido)
    {
        if ($cliente->id != $pedido->cliente_id) {
            throw new HttpException(422, 'El pedido no pertenece al cliente especificado');
        }
    }
}
