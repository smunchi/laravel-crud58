<?php

use App\Book;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'isbn_no' => $faker->isbn10,
        'description' => $faker->text,
        'price' => $faker->numberBetween(10, 20),
        'user_id' => null
    ];
});
