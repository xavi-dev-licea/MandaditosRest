<?php

namespace APIMandaditos\Http\Controllers\Pedido;

use APIMandaditos\User;
use APIMandaditos\Pedido;
use APIMandaditos\Mandadero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use APIMandaditos\Http\Controllers\ApiController;

class PedidoMandaderoMovimientoController extends ApiController
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido, User $mandadero)
    {
        $rules = [
            'date' => 'required',
        ];

        $this->validate($request, $rules);

        if ($mandadero->id == $pedido->cliente_id) {
            return $this->errorResponse('El mandadero debe ser diferente al vendedor', 409);
        }

        if (!$mandadero->esVerificado()) {
            return $this->errorResponse('El comprador debe ser un usuario verificado', 409);
        }

        if (!$pedido->cliente->esVerificado()) {
            return $this->errorResponse('El vendedor debe ser un usuario verificado', 409);
        }


        return DB::transaction(function() use ($request, $pedido, $mandadero) {
            $pedido->save();

            $movimiento = Transaction::create([
                'date' => $request->date,
                'mandadero_id' => $mandadero->id,
                'pedido_id' => $pedido->id,
            ]);

            return $this->showOne($movimiento, 201);
        });
    }
}
