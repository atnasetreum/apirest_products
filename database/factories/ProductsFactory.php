<?php

use Faker\Generator as Faker;

$factory->define(App\Products::class, function (Faker $faker) {
    return [
            'name'  => $faker->text(50),
            'sku'   => $faker->numberBetween(5489,5498763541),
            'price' => rand (1*10, 100*10) / 10,
            'stock' => $faker->numberBetween(1,500),
    ];
});
