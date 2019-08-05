<?php

namespace APIMandaditos;

use APIMandaditos\User;
use APIMandaditos\Movimiento;

class Mandadero extends User
{
    public function movimientos()
    {
    	return $this->hasMany(Movimiento::class);
    }
}
