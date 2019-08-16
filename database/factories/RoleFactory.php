<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use College\Model;
use Faker\Generator as Faker;

$factory->define(\College\Role::class, function (Faker $faker) {
    return [

        'name' => $faker->name

        //
    ];
});
