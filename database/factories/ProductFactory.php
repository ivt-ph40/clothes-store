<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'price' => '200000',
        'description' => $faker->realText($maxNbChars = 100, $indexSize = 2),
        'detail' => $faker->realText($maxNbChars = 500, $indexSize = 2),
        'category_id' => Category::all()->random()->id,
    ];
});
