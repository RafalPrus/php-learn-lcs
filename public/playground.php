<?php


use Illuminate\Support\Collection;

require __DIR__ . "/../vendor/autoload.php";

$nums = new Collection([
    1, 2, 3
    ]
);

$filtered = $nums->filter(function ($num) {
    return $num >= 2;
});

var_dump($filtered);
