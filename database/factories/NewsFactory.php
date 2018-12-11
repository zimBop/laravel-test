<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->text(30),
        'text' => $faker->paragraph,
        'published' => intval($faker->boolean),
        'created_at' => $faker->numberBetween(1200000000, 1544515964),
        'updated_at' => $faker->numberBetween(1200000000, 1544515964),
        'meta_description' => $faker->text(30),
        'meta_keywords' => $faker->word . ',' . $faker->word,
    ];
});
