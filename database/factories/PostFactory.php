<?php

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
$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = $faker->sentence(mt_rand(2, 7), true);
    $txt = $faker->realText(mt_rand(1000, 3000));
    $isPublished = mt_rand(1, 5) > 1;

    $createdAt = $faker->dateTimeBetween('-4 months', '-2 months');

    $data = [
        'category_id' => mt_rand(1, 11),
        'user_id' => (mt_rand(1, 5) == 5) ? 1 : 2,
        'title' => $title,
        'alias' => str_slug($title),
        'excerpt' => $faker->text(mt_rand(30, 100)),
        'content_html' => $txt,
        'content_raw' => $txt,
        'is_published' => $isPublished,
        'published_at' => $isPublished ? $faker->dateTimeBetween('-2 months', '-1 days') : null,
        'updated_at' => $createdAt,
        'created_at' => $createdAt,
    ];
    return $data;

});
