<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    product::query()->truncate();

    $productName = $faker->randomElement(['shirt', 'pant', 'tie']) . $faker->numberBetween(1,50);
    return [
        'category_id' => $faker->randomDigitNotNull, // Todo: fetch from database 
        'brand_id' => $faker->randomDigitNotNull,
        'tag_id' =>  $faker->randomDigitNotNull,
        'name' =>  $productName,
        'price' => $faker->numberBetween(1000, 2500),
        'stock' => $faker->numberBetween(10, 50) 
    ];
});
