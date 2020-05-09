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
$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Models\User::class, 'admin', function (Faker $faker) {
    return [
        'name'           => 'admin',
        'email'          => $faker->unique()->safeEmail,
        'password'       => bcrypt('123'),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\Models\Role::class, 'admin', function (Faker $faker) {
    return [
        'name'        => 'Администратор',
        'alias'       => 'admin',
        'description' => 'Полные права',
        'group'       => 'администраторы',
    ];
});


$factory->defineAs(App\Models\UserAdditional::class, 'admin', function (Faker $faker) {
    $faker = \Faker\Factory::create('ru_RU');
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
    ];
});

