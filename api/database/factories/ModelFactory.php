<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Address;
use App\Models\Company;
use App\Models\Album;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Todo;
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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->email,
//     ];
// });

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEMail,
        'phone' => $faker->phoneNumber,
        'website' => $faker->url,
    ];
});

$factory->define(Address::class, function (Faker $faker) {
    return [
        'street' => $faker->streetAddress,
        'suite' => $faker->secondaryAddress,
        'city' => $faker->city,
        'zipcode' => $faker->areaCode,
        'geo' => [
            'longitude' => $faker->longitude,
            'latitude' => $faker->latitude,
        ]
    ];
});

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'catchPhrase' => $faker->catchPhrase,
        'bs' => $faker->bs,
    ];
});

$factory->define(Album::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
    ];
});

$factory->define(Photo::class, function (Faker $faker) {
    $imageWidth = 1024;
    $imageHeight = 768;

    return [
        'title' => $faker->name,
        'url' => $faker->imageUrl($imageWidth, $imageHeight, 'cats', true, 'Faker', true),
        'thumbnailUrl' => $faker->imageUrl(60, 60, 'cats', true, 'Faker', true),
    ];
});

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(10, 20)),
        'body' => $faker->paragraph(20),
    ];
});

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->realText(rand(10,50)),
    ];
});

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(10, 15)),
        'completed' => $faker->boolean(50),
    ];
});
