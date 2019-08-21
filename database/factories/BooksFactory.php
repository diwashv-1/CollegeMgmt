<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use College\Book;
use Faker\Generator as Faker;

$factory->define(\College\Books::class, function (Faker $faker) {
    return [

        'bookName'=> $faker->name,
        'authorName'=> $faker->name,
        'facultyId'=>$faker->numberBetween(1,3),
        'publisher'=>$faker->domainName,
        'price'=>$faker->creditCardNumber,
        'entryDate'=>$faker->date(),
        'bookCode'=>$faker->numberBetween(120, 140),
        'bookType'=>$faker->paragraphs

        //
    ];
});