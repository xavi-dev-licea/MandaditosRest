<?php

namespace APIMandaditos;

use APIMandaditos\Pedido;


class Cliente extends User
{
    public function pedidos()
    {
    	return $this->hasMany(Pedido::class);
    }

}
