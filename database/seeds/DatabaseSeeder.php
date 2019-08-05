<?php

use APIMandaditos\User;
use APIMandaditos\Pedido;
use APIMandaditos\Movimiento;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        User::truncate();
        Pedido::truncate();
        Movimiento::truncate();

        $cantidadUsuarios = 100;
        $cantidadPedidos = 50;
        $cantidadMovimientos = 50;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Pedido::class, $cantidadPedidos)->create();
        factory(Movimiento::class, $cantidadMovimientos)->create();
    }
}
