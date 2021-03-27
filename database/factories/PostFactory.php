<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use EditorialWeb\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'contenido' => $faker->text,
        'estado' => 1,
        'id_autor' => EditorialWeb\User::All()->random()
    ];
});
