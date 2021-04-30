<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\service;
use Faker\Generator as Faker;

$factory->define(service::class, function (Faker $faker) {
    return [
			'name' => $faker->sentence(1),
			'description' => $faker->text(200),
			'price' => $faker->buildingNumber,
    ];
});
