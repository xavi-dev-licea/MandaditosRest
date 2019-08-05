<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use APIMandaditos\User;
use APIMandaditos\Pedido;
use APIMandaditos\Cliente;
use Illuminate\Support\Str;
use APIMandaditos\Movimiento;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'verified' => $verificado = $faker->randomElement([User::USUARIO_VERIFICADO, User::USUARIO_NO_VERIFICADO]),
        'verification_token' => $verificado == User::USUARIO_VERIFICADO ? null : User::generateVerificationToken(),
    ];
});

$factory->define(Pedido::class, function (Faker $faker) {

    return [
        'description' => $faker->paragraph(1),
        'date' => $faker->dateTime(),
        'status' => $faker->randomElement([Pedido::PEDIDO_PENDIENTE, Pedido::PEDIDO_ACEPTADO,
            Pedido::PEDIDO_RECHAZADO, Pedido::PEDIDO_FINALIZADO]),
        // 'seller_id' => User::inRandomOrder()->first()->id,
        'cliente_id' => User::all()->random()->id,
    ];
});


$factory->define(Movimiento::class, function (Faker $faker) {

    $cliente = Cliente::has('pedidos')->get()->random();
    $mandadero = User::all()->except($cliente->id)->random();

    return [
        'date' => $faker->dateTime(),
        'mandadero_id' => $mandadero->id,
        'pedido_id' => $cliente->pedidos->random()->id,
    ];
});
