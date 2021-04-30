<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
    		'id' => '1',
        'name'=>'Professional Outsorcing Services',
				'phone'=>'5714818',
				'address'=>'Cra 31 a No 25b70',
				'state'=>'1',
    ];
});
