<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence,
        'content' => $faker->paragraphs(rand(1,4), true),
        'user_id' => factory(\App\User::class)
    ];
});
