<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Products::class , function (Faker $faker){
    return [
        'name'=>$faker->word,
        'id_categories'=>rand(1,10),
        'description'=>$faker->sentence(5),
        'image'=>"https://via.placeholder.com/150x100",
        'unit_price'=>rand(100000,10000000),
        'promotion_price'=>rand(1000,10000),
        'quantity'=>rand(50,100),
        'view'=>0
    ];
});