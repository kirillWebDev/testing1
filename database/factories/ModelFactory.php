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

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Article::class, function (Faker\Generator $faker) {
    $html_content = join("\n\n", $faker->paragraphs(mt_rand(7, 20)));

//    'content' => $html_content,
//    'html_content' => $html_content,
    return [
        'title' => $faker->sentence(mt_rand(5, 10)),
        'path' => $faker->slug(),
        'published_at' => $faker->dateTime,
        'description' => $faker->sentence(mt_rand(5, 15)),
        'status' => 1,
    ];
});

$factory->define(Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});

$factory->define(Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->word,
    ];
});