<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

// Use the factory object to define the properties of the Bookmark class
// An instance of the Faker\Generator class is created and then assigned the name $faker
$factory->define(App\Bookmark::class, function(Faker\Generator $faker) {
    return [
        // A single example piece of data if you were to do this manually would look like:
        // 'link' => 'www.stuff.com'

        'link' => $faker->url
    ];
});


$factory->define(App\Tag::class, function(Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});