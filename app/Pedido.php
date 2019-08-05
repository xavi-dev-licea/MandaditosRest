<?php

namespace APIMandaditos;

use APIMandaditos\Cliente;
use APIMandaditos\Movimiento;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

	const PEDIDO_PENDIENTE = 'pendiente';
	const PEDIDO_ACEPTADO = 'aceptado';
	const PEDIDO_RECHAZADO ='rechazado';
	const PEDIDO_FINALIZADO = 'finalizado';

    protected $dates =[
        'deleted_at'
    ]; 
    protected $fillable = [
    	'description',
    	'ubication_origin',
    	'ubication_destiny',
    	'status',
    	'date',
    	'cliente_id'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }
}
