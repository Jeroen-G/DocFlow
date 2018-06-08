<?php

use Faker\Generator as Faker;

$factory->define(JeroenG\DocFlow\Document::class, function (Faker $faker) {
    return [
        'doc_id' => random_int(0,10),
        'user_id' => 1,
        'is_reviewed' => false,
    ];
});
