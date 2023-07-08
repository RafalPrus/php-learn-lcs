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

// codewars
function remove(string $s, int $n): string {
    $counter = 0;
    if (str_contains($s, '!') && $counter <= $n) {
        $s = str_replace('!', '', $s, $n);
        ++$counter;
    }

    return $s;
}

function calc($s) {
    $result = '';
    foreach (str_split($s) as $char) {
        $result .= ord($char);
    }
    $result_2 = str_replace('7', '1', $result);
    $sum1 = 0;
    $sum2 = 0;
    foreach (str_split($result) as $num) {
        $sum1 += $num;
    }

    foreach (str_split($result_2) as $num) {
        $sum2 += $num;
    }

    return $sum1 - $sum2;
}

function getChar($c)
{
    return chr($c);
}
