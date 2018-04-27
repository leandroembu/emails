<?php

use Faker\Generator as Faker;

$factory->define(App\Livro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence,
        'autor' => $faker->name,
        'edicao' => $faker->numberBetween(1, 10),
        'isbn' => $faker->unique()->randomNumber(8),
    ];
});

