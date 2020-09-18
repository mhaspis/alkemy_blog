<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'user_id' => App\User::all()->random()->id,
        'category_id' => App\Category::all()->random()->id,
        'image_path' => $faker->image('storage/app/images'),
        'title' => $faker->name,
        'content' => $faker->lastname,       
    ];
});
