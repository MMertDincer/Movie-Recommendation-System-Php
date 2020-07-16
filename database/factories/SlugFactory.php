<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Movies::class, function (Faker $faker) {
    return [
        'movie_slug' => $faker->text
    ];
});
