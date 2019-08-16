<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use College\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [

        'studentName'=> $faker->name,
        'address'=>$faker->address,
        'gender'=>$faker->firstNameMale,
        'phoneNumber'=> $faker->phoneNumber
        //
    ];
});
