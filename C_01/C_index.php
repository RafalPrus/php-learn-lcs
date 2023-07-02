<?php


$name = "Dark Matter";
$read = true;
if ($read) {
    $message = "You have read $name";
} else {
    $message = "You have'nt read $name";
}

$books = [
    "Do Androids Dream of Electric Sheep",
    "The Langoliers",
    "Hail Mary"
];
$books2 = [
    [
        'name' => 'Do Androids Dream of Electric Sheep',
        'author' => 'Philip K. Dick',
        'purchaseUrl' => 'http://www.buyit.com',
        'release' => 1968
    ],
    [
        'name' => 'Project Hail Mary',
        'author' => 'Andy Weir',
        'purchaseUrl' => 'http://www.buyitnow.com',
        'release' => 2021
    ],
    [
        'name' => 'The Martian',
        'author' => 'Andy Weir',
        'purchaseUrl' => 'http://www.buyitnow.com',
        'release' => 2011
    ],
];
function filter($items, $fn) {
    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    }

    return $filteredItems;
}
$filteredBooks = filter($books2, function ($book) {
    return $book['release'] >= 2000 && $book['release'] < 2020;
});

require "C_index.view.php";