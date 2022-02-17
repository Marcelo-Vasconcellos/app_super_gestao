<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SiteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'mensagem' => $faker->text(200),
        'motivo_contatos_id' => $faker->numberBetween(1,3),
    ];
});
