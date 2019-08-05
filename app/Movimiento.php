<?php

namespace APIMandaditos;

use APIMandaditos\Pedido;
use APIMandaditos\Mandadero;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model
{
    use SoftDeletes;

    protected $dates =[
        'deleted_at'
    ]; 

    protected $fillable = [
    	'date',
    	'mandadero_id',
    	'pedido_id',
    ];


    public function mandadero()
    {
    	return $this->belongsTo(Mandadero::class);
    }

    public function pedido()
    {
    	return $this->belongsTo(Pedido::class);
    }
}
