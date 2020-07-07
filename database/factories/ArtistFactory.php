<?php

use Faker\Generator as Faker;
use App\Artist;

$factory->define(Artist::class, function (Faker $faker) {
    return [
        //
        'name' => ucfirst($faker->word),
        'Ap' => ucfirst($faker->word),
        'Am' => ucfirst($faker->word),
        'nameArt' => ucfirst($faker->word),
        'imagen' => $faker->imageUrl($width = 400, $height = 400),
        'imagenAlu' => $faker->imageUrl($width = 900, $height = 500),
        'urlFa' => ucfirst($faker->word),
        'descripcion' => $faker->text($maxNbChars = 50)
    ];
});
