<?php

declare(strict_types=1);

/**
 * @param string $name
 * @return void
 */
function greet(string $name): void
{
    echo 'Hello ' . $name . "<br/>";
}

greet("Hans-Peter");


/**
 * @param int $value1
 * @param int $value2
 * @return int
 */
function add($value1, $value2)
{
    return $value1 + $value2;
}

/**
 * @param int $value1
 * @param int $value2
 * @return int
 */
function addWrong($value1, $value2): string
{
    return $value1 + $value2;
}

//var_dump(addWrong(1,2));

/**
 * @param int $value1
 * @param int $value2
 * @return int
 */
function addCorrect(int $value1, int $value2): int
{
    return $value1 + $value2;
}

var_dump(addCorrect(1, 2));

function numberGenerator():Generator
{
    for ($i = 1; $i <= 3; $i++) {
        yield $i;
        //$i++;
    }
}

foreach(numberGenerator() as $value) {
    var_dump($value);
}


CONST ONLY_VEGETARIAN = false;
CONST ONLY_VEGAN = false;
CONST AVOID_GLUTEN = false;
CONST AVOID_PORK = false;
CONST AVOID_FISH = true;

$dishes = [
    [
        'name' => 'Spaghetti Bolognese',
        'containsMeat' => true,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => true,
        'containsFish' => false
    ],
    [
        'name' => 'Fischbrötchen',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => true
    ],
    [
        'name' => 'Grüner Salat mit Essig/Öl-Dressing',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => false,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => false
    ],
    [
        'name' => 'Cheeseburger',
        'containsMeat' => true,
        'containsMilk' => true,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => true,
        'containsFish' => false
    ],
    [
        'name' => 'Soja-Burger',
        'containsMeat' => false,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => true,
        'containsPork' => false,
        'containsBeef' => false,
        'containsFish' => false
    ],
    [
        'name' => 'Currywurst',
        'containsMeat' => true,
        'containsMilk' => false,
        'containsEggs' => false,
        'containsWheat' => false,
        'containsPork' => true,
        'containsBeef' => false,
        'containsFish' => false
    ],
];

// implement function to filter suitable dishes, return array of suitable dishes

// implement function to determine if a dish is suitable

