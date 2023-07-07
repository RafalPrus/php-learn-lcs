<?php

function filterByAuthor($items, $fn) {
    $filtered = [];
    foreach ($items as $item) :
        if ($fn($item)) :
            $filtered[] = $item;
        endif;
    endforeach;

    return $filtered;
}

function ($book) {
    return $book['releaseYear'] === 1968;
};

// classes properties

class Class_name {

    public const VAR2 = 'text';

    public static function show() {
        echo 'show: ' . static::VAR2;
    }

}


echo Class_name::VAR2;
Class_name::show();

class SimpleClass
{
    // property declaration
    public $var = 'a default value';

    // method declaration
    public function displayVar() {
        echo $this->var;
    }


}

(new SimpleClass)->displayVar();