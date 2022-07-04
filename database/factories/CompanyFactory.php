<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
    		'id' => '1',
        'name'=>'Servicios Integrales en Riesgo Corporativo S.A.S',
				'phone'=>'3212840845',
				'address'=>'Bogotà',
				'state'=>'1',
    ];
});
