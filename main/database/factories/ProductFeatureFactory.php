<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\ProductFeatures;
use Faker\Generator as Faker;

$factory->define(ProductFeatures::class, function (Faker $faker) {
    return [
        'feature_name' => $faker->randomElement(['Quam adipiscing vitae proin','Nec feugiat nisl pretium','Nulla at volutpat diam uteera','Pharetra massa massa ultricies','Massa ultricies mi quis hendrerit']),
        'isBasic'=>'true',
        'business'=>'true',
        'developer'=>'true',
    ];
});
