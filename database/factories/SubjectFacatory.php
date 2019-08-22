<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use College\Model;
use Faker\Generator as Faker;

$factory->define(\College\Subject::class, function (Faker $faker) {
    return [
        'subjectName' => $faker->name,
        'course_id' => $faker->numberBetween(1, 5),
        'isRegular' => $faker->boolean,
        'semester' => $faker->numberBetween(1, 8),
        'year' => $faker->numberBetween(1, 4),
        //
    ];
});
